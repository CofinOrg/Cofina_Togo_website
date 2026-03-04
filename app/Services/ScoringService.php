<?php

namespace App\Services;

use App\Models\Cv;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Smalot\PdfParser\Parser;

class ScoringService
{
    private const API_URL = 'https://cofbot.mawena.online/docs#/default/score_cvs_score_cvs_post';
    private const SCORING_ENDPOINT = 'https://cofbot.mawena.online/score-cvs';

    /**
     * Calculer le score d'un CV pour une offre d'emploi
     *
     * @param Cv $cv
     * @param mixed $jobOffer
     * @return array|null
     */
    public function scoreCV(Cv $cv, $jobOffer): ?array
    {
        try {
            // Récupérer le texte du CV depuis le fichier
            $cvText = $this->extractCVText($cv->cv_path);
            if (!$cvText) {
                Log::warning("Impossible d'extraire le texte du CV ID: {$cv->id}");
                return null;
            }

            $payload = [
                'offer_text' => $jobOffer->content ?? $jobOffer->summary ?? '',
                'spe_particular' => $jobOffer->spe_particular ?? $jobOffer->title ?? '',
                'cvs' => [
                    [
                        'id' => $cv->id,
                        'text' => $cvText
                    ]
                ]
            ];

            $response = Http::timeout(30)->post(self::SCORING_ENDPOINT, $payload);

            if ($response->successful()) {
                $data = $response->json();
                // Retourner le premier résultat (le seul CV envoyé)
                return $data['results'][0] ?? null;
            } else {
                Log::error("Erreur API Scoring: {$response->status()}", [
                    'cv_id' => $cv->id,
                    'response' => $response->body()
                ]);
                return null;
            }
        } catch (\Exception $e) {
            Log::error("Exception Scoring Service: {$e->getMessage()}", [
                'cv_id' => $cv->id
            ]);
            return null;
        }
    }

    /**
     * Calculer les scores pour plusieurs CVs sur une offre
     *
     * @param array $cvs Array de Cv models
     * @param mixed $jobOffer
     * @return array
     */
    public function scoreCVsForOffer(array $cvs, $jobOffer): array
    {
        try {
            $cvData = [];
            $cvMap = []; // Map pour faire correspondre les IDs

            foreach ($cvs as $cv) {
                $cvText = $this->extractCVText($cv->cv_path);
                if ($cvText) {
                    $cvData[] = [
                        'id' => $cv->id,
                        'text' => $cvText
                    ];
                    $cvMap[$cv->id] = $cv;
                }
            }

            if (empty($cvData)) {
                return [];
            }

            $payload = [
                'offer_text' => $jobOffer->content ?? $jobOffer->summary ?? '',
                'spe_particular' => $jobOffer->spe_particular ?? $jobOffer->title ?? '',
                'cvs' => $cvData
            ];

            $response = Http::timeout(30)->post(self::SCORING_ENDPOINT, $payload);

            if ($response->successful()) {
                return $response->json()['results'] ?? [];
            } else {
                Log::error("Erreur API Scoring (batch): {$response->status()}", [
                    'response' => $response->body()
                ]);
                return [];
            }
        } catch (\Exception $e) {
            Log::error("Exception Scoring Service (batch): {$e->getMessage()}");
            return [];
        }
    }

    /**
     * Extraire le texte du CV depuis le fichier PDF
     * Utilise le service CvExtractorService
     *
     * @param string $cvPath
     * @return string|null
     */
    private function extractCVText(string $cvPath): ?string
    {
        try {
            $fullPath = storage_path('app/public/' . $cvPath);

            if (!file_exists($fullPath)) {
                Log::warning("Fichier CV non trouvé: {$fullPath}");
                return null;
            }

            $extractor = app(CvExtractorService::class);
            $parser = new Parser();
            $pdf = $parser->parseFile($fullPath);
            return trim($pdf->getText());
        } catch (\Exception $e) {
            Log::error("Erreur extraction CV: {$e->getMessage()}");
            return null;
        }
    }
}
