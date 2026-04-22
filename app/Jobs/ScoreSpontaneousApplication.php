<?php

namespace App\Jobs;

use App\Models\Cv;
use App\Models\JobOffer;
use App\Models\Application;
use App\Services\ScoringService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

/**
 * Job pour scorer une candidature spontanée contre toutes les offres actives
 * S'exécute en arrière-plan pour ne pas bloquer la réponse HTTP
 */
class ScoreSpontaneousApplication implements ShouldQueue
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

    protected Cv $cv;

    /**
     * Create a new job instance.
     */
    public function __construct(Cv $cv)
    {
        $this->cv = $cv;
    }

    /**
     * Execute the job.
     */
    public function handle(ScoringService $scoringService): void
    {
        \Log::info("🚀 Démarrage du scoring pour la candidature spontanée ID: {$this->cv->id} ({$this->cv->name})");

        try {
            // Récupérer toutes les offres actives
            $jobOffers = JobOffer::where('status', 'active')->get();

            if ($jobOffers->isEmpty()) {
                \Log::info("✅ Aucune offre active disponible pour scorer la candidature {$this->cv->id}");
                return;
            }

            \Log::info("📊 Scoring de la candidature {$this->cv->id} contre {$jobOffers->count()} offres actives");

            $createdCount = 0;

            foreach ($jobOffers as $jobOffer) {
                try {
                    $scoreResult = $scoringService->scoreCV($this->cv, $jobOffer);

                    if ($scoreResult) {
                        Application::create([
                            'cv_id' => $this->cv->id,
                            'job_offer_id' => $jobOffer->id,
                            'score' => (int) ($scoreResult['score'] ?? 0),
                            'details' => $scoreResult['details'] ?? null,
                            'raison' => $scoreResult['raison'] ?? null,
                            'status' => 'pending'
                        ]);
                        $createdCount++;
                    }
                } catch (\Exception $e) {
                    \Log::warning("⚠️ Erreur lors du scoring de la candidature {$this->cv->id} pour l'offre {$jobOffer->id}: {$e->getMessage()}");
                    // Continuer avec la prochaine offre
                }
            }

            \Log::info("✅ Scoring terminé pour la candidature {$this->cv->id} - {$createdCount} applications créées");

        } catch (\Exception $e) {
            \Log::error("❌ ERREUR CRITIQUE ScoreSpontaneousApplication pour le CV {$this->cv->id}: {$e->getMessage()}", [
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
        \Log::error("🔴 Le job de scoring pour la candidature {$this->cv->id} a échoué définitivement après {$this->tries} tentatives", [
            'error' => $exception->getMessage()
        ]);
    }
}
