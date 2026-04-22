<?php

namespace App\Jobs;

use App\Models\JobOffer;
use App\Models\Cv;
use App\Models\Application;
use App\Services\ScoringService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\Middleware\RateLimited;

class ProcessNewOfferScoring implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Le nombre de secondes avant que le job expire
     */
    public $timeout = 600; // 10 minutes

    /**
     * Le nombre de tentatives du job
     */
    public $tries = 3;

    /**
     * Le nombre de secondes d'attente avant les retries exponentiels
     */
    public $backoff = [60, 300, 600]; // 1min, 5min, 10min

    protected JobOffer $jobOffer;

    /**
     * Create a new job instance.
     */
    public function __construct(JobOffer $jobOffer)
    {
        $this->jobOffer = $jobOffer;
    }

    /**
     * Execute the job.
     */
    public function handle(ScoringService $scoringService): void
    {
        \Log::info("🚀 Démarrage du scoring pour l'offre: {$this->jobOffer->id} ({$this->jobOffer->title})");

        try {
            // Récupérer tous les CVs spontanés
            $spontaneousCVs = Cv::where('source', 'spontaneous')->get();

            if ($spontaneousCVs->isEmpty()) {
                \Log::info("✅ Aucune candidature spontanée à scorer pour l'offre {$this->jobOffer->id}");
                return;
            }

            \Log::info("📊 Scoring de {$spontaneousCVs->count()} CVs pour l'offre {$this->jobOffer->id}");

            $createdCount = 0;
            $skippedCount = 0;

            foreach ($spontaneousCVs as $cv) {
                try {
                    $scoreResult = $scoringService->scoreCV($cv, $this->jobOffer);

                    if ($scoreResult) {
                        // Vérifier que l'application n'existe pas déjà
                        $existingApplication = Application::where('cv_id', $cv->id)
                            ->where('job_offer_id', $this->jobOffer->id)
                            ->first();

                        if (!$existingApplication) {
                            Application::create([
                                'cv_id' => $cv->id,
                                'job_offer_id' => $this->jobOffer->id,
                                'score' => (int) ($scoreResult['score'] ?? 0),
                                'details' => $scoreResult['details'] ?? null,
                                'raison' => $scoreResult['raison'] ?? null,
                                'status' => 'pending'
                            ]);
                            $createdCount++;
                        } else {
                            $skippedCount++;
                        }
                    }
                } catch (\Exception $e) {
                    \Log::warning("⚠️ Erreur lors du scoring du CV {$cv->id} pour l'offre {$this->jobOffer->id}: {$e->getMessage()}");
                    // Continuer avec le prochain CV plutôt que de tout arrêter
                }
            }

            \Log::info("✅ Scoring terminé pour l'offre {$this->jobOffer->id} - Créé: $createdCount, Skippé: $skippedCount");

        } catch (\Exception $e) {
            \Log::error("❌ ERREUR CRITIQUE ProcessNewOfferScoring pour l'offre {$this->jobOffer->id}: {$e->getMessage()}", [
                'exception' => $e,
                'trace' => $e->getTraceAsString()
            ]);
            // Rejeter l'exception pour que le job soit marqué en erreur et réessayé
            throw $e;
        }
    }

    /**
     * Handler si le job échoue après tous les retries
     */
    public function failed(\Throwable $exception): void
    {
        \Log::error("🔴 Le job de scoring pour l'offre {$this->jobOffer->id} a échoué définitivement après {$this->tries} tentatives", [
            'error' => $exception->getMessage()
        ]);
    }
}

