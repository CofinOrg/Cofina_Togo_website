<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Maravel\Http\Controllers\APIController;
use Illuminate\Http\UploadedFile;
use App\Models\JobOffer;
use App\Models\Application;
use App\Jobs\ScoreSpontaneousApplication;
/**
 * @group Cv
 *
 * EndPoints pour gérer les Cv
 */
class CvController extends APIController
{
    protected string $modelClass = "\App\Models\Cv";

    /**
     * Affiche les Cv
     *
     * @queryParam  attribute									string				Description de l'attribut.													 No-example
     *
     * @queryParam  with_relation								string				Afficher la relation.														Example: false
     *
     * @queryParam  paginate									string				Utiliser la pagination.														Example: false
     *
     * @response 200
     */
    public function index(Request $request)
    {
        $this->indexSearchFieldList = [
        ];
        $this->indexManualFilter = function ($list, $connectedUser, $requestData) {
            if (!empty($requestData['source'])) {
                $list = $list->where('source', $requestData['source']);
            }
            return $list->orderBy('created_at', 'desc');
        };
        return parent::index($request);
    }

    /**
     * Affiche un Cv
     *
     * @urlParam	id											integer				Le Cv.																Example: 1.
     *
     * @queryParam  with_relation								string				Afficher la relation.														Example: false
     *
     * @response 200
     */
    public function show(Request $request, $id)
    {
        return parent::show($request, $id);
    }

    /**
     * Créer un nouveau Cv
     *
     * @bodyParam 	attribute									string				L'attribut.																	Example: value
     *
     * @response 200
     */
    public function store(Request $request)
    {
        $connectedUser = $request->user();
        $this->storeAuthName = null;
        $this->storeValidationArray = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'cv_path' => 'required|file|mimes:pdf|max:5120',
            'motivation_message' => 'nullable|string',
            'source' => 'required|in:offer,spontaneous',
            'desired_position' => 'nullable|string|max:255',
            'job_offer_id' => 'nullable|exists:job_offers,id'
        ];

        $this->storeManualValidationsFunction = function ($requestData) use ($connectedUser) {
            return null;
        };

        $this->storeBeforeCreateFunction = function ($requestData) use ($connectedUser) {
            // Stocker le fichier CV AVANT la création du modèle
            if (isset($requestData['cv_path']) && $requestData['cv_path'] instanceof UploadedFile) {
                $folder = match ($requestData['source'] ?? null) {
                    'spontaneous' => 'spontaneous_applications/cv',
                    'offer' => 'offer_applications/cv',
                    default => null,
                };

                if ($folder) {
                    $requestData['cv_path'] = $requestData['cv_path']->store($folder, 'public');
                    \Log::info("Fichier CV stocké: {$requestData['cv_path']}");
                }
            }

            return $requestData;
        };

        $this->storeAfterCreateFunction = function ($model, $requestData, $data) use ($connectedUser) {
            return $model;
        };

        $this->storeBeforeCommitFunction = function ($model, $requestData, $data) use ($connectedUser) {
            return $model;
        };

        $this->storeAfterCommitFunction = function ($model, $requestData, $data) use ($connectedUser) {
            try {
                $source = $requestData['source'] ?? 'spontaneous';

                if ($source === 'offer' && isset($requestData['job_offer_id'])) {
                    $this->handleJobApplicationScoring($model, (int) $requestData['job_offer_id']);
                } elseif ($source === 'spontaneous') {
                    // Dispatcher la tâche de scoring en arrière-plan (asynchrone)
                    ScoreSpontaneousApplication::dispatch($model);
                }
            } catch (\Exception $e) {
                \Log::error("Erreur dans storeAfterCommitFunction: {$e->getMessage()}");
            }

            return $model;
        };

        $this->storeRelationArray = [];
        return parent::store($request);
    }

    /**
     * Cas 1: Gérer le scoring pour une candidature à une offre spécifique
     * Note: Les candidatures spontanées sont scorées en arrière-plan via ScoreSpontaneousApplication::dispatch()
     */
    private function handleJobApplicationScoring($cv, int $jobOfferId): void
    {
        try {
            $jobOffer = JobOffer::find($jobOfferId);
            if (!$jobOffer) {
                \Log::warning("JobOffer non trouvé: {$jobOfferId}");
                return;
            }

            $scoringService = app(\App\Services\ScoringService::class);
            $scoreResult = $scoringService->scoreCV($cv, $jobOffer);

            if ($scoreResult) {
                Application::create([
                    'cv_id' => $cv->id,
                    'job_offer_id' => $jobOfferId,
                    'score' => (int) ($scoreResult['score'] ?? 0),
                    'details' => $scoreResult['details'] ?? null,
                    'raison' => $scoreResult['raison'] ?? null,
                    'status' => 'pending'
                ]);
            }
        } catch (\Exception $e) {
            \Log::error("Erreur scoreCV: {$e->getMessage()}");
        }
    }

    /**
     * Met à jour un Cv
     *
     * @urlParam	id											integer				Le Cv.																Example: 1.
     *
     * @bodyParam 	attribute									string				L'attribut.																	Example: value
     *
     * @response 200
     */
    public function update(Request $request, $id)
    {
        $connectedUser = $request->user();
        $this->updateGetValidationArrayFunction = function ($id) {
            return [];
        };
        $this->updateManualValidationsFunction = function ($requestData, $model) use ($connectedUser) {
            return null;
        };
        $this->updateBeforeUpdateFunction = function ($model, $requestData, $data) use ($connectedUser) {
            return $requestData;
        };
        $this->updateAfterUpdateFunction = function ($model, $requestData, $data) use ($connectedUser) {
            return $model;
        };
        $this->updateBeforeCommitFunction = function ($model, $requestData, $data) use ($connectedUser) {
            return $model;
        };
        $this->updateAfterCommitFunction = function ($model, $requestData, $data) use ($connectedUser) {
            return $model;
        };
        $this->updateRelationArray = [
        ];
        return parent::update($request, $id);
    }

    /**
     * Supprime un Cv
     *
     * @urlParam	id											integer				Le Cv.																Example: 1.
     *
     * @response 200
     */
    public function destroy(Request $request, $id)
    {
        $connectedUser = $request->user();
        $this->deleteBeforeDeleteFunction = function ($model) use ($connectedUser) {
            return $model;
        };
        $this->deleteAfterDeleteFunction = function ($model) use ($connectedUser) {
            return $model;
        };
        $this->updateRelationArray = [
        ];
        return parent::destroy($request, $id);
    }
}
