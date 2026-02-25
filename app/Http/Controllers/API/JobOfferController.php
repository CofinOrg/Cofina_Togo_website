<?php

namespace App\Http\Controllers\API;

use App\Models\JobOffer;
use Illuminate\Http\Request;
use Maravel\Http\Controllers\APIController;
use App\Services\ScoringService;
use App\Models\Cv;
use App\Models\Application;

/**
 * @group JobOffer
 *
 * EndPoints pour gérer les JobOffer
 */
class JobOfferController extends APIController
{
    protected string $modelClass = "\App\Models\JobOffer";
    protected ScoringService $scoringService;

    /**
     * Affiche les JobOffer
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
        $this->indexAbilityName = null;


        // Clôturer automatiquement les offres expirées
        JobOffer::where('status', 'active')
            ->where('deadline', '<', now()->toDateString())
            ->update(['status' => 'blocked']);

        $this->indexSearchFieldList = [
        ];
        $this->indexManualFilter = function ($list, $connectedUser, $requestData) {
            return $list->orderBy('created_at', 'desc');
        };
        return parent::index($request);
    }

    /**
     * Affiche un JobOffer
     *
     * @urlParam	id											integer				Le JobOffer.																Example: 1.
     *
     * @queryParam  with_relation								string				Afficher la relation.														Example: false
     *
     * @response 200
     */
    public function show(Request $request, $id)
    {
        $this->showAbilityName = null;

        return parent::show($request, $id);
    }

    /**
     * Créer un nouveau JobOffer
     *
     * @bodyParam   user_id                                 integer                L'attribut                                                                 Example: 1
     * @bodyParam 	title									string				L'attribut.																	  Example: Chargé D'affaire
     * @bodyParam   content                                 string                L'attribut.                                                                 Example: Cofina recrute.....
     * @bodyParam   summary                                 string                L'attribut.                                                                 Example: En résumé....
     * @bodyParam   deadline                                string                L'attribut.                                                                 Example: 2026-10-10
     *
     * @response 200
     */
    public function store(Request $request)
    {
        $connectedUser = $request->user();
        $this->storeValidationArray = [
            'title' => 'required|string',
            'spe_particular' => 'nullable|string',
            'content' => 'required|string|max:5000',
            'summary' => 'required|string|max:500',
            'for' => 'nullable|string|max:500',
            'form_link' => 'required|url',
            'deadline' => 'required|date',
            'type' => 'required|in:stage,cdd,cdi',
            'status' => 'required|in:active,blocked',
        ];
        $this->storeManualValidationsFunction = function ($requestData) use ($connectedUser) {
            return null;
        };
        $this->storeBeforeCreateFunction = function ($requestData) use ($connectedUser) {

            $requestData['user_id'] = $connectedUser->id;

            return $requestData;
        };
        $this->storeAfterCreateFunction = function ($model, $requestData, $data) use ($connectedUser) {
            return $model;
        };
        $this->storeBeforeCommitFunction = function ($model, $requestData, $data) use ($connectedUser) {
            return $model;
        };
        $this->storeAfterCommitFunction = function ($model, $requestData, $data) use ($connectedUser) {
            // Cas 3: Calculer le score pour toutes les candidatures spontanées
            $this->handleNewOfferScoring($model);
            return $model;
        };
        $this->storeRelationArray = [
        ];
        return parent::store($request);
    }

    /**
     * Met à jour un JobOffer
     *
     * @urlParam	id											integer				Le JobOffer.																Example: 1.
     *
     * @bodyParam 	title									    string				L'attribut.																	Example: value
     * @bodyParam   content                                     string                L'attribut.                                                                 Example: value
     * @bodyParam   summary                                     string                L'attribut.                                                                 Example: value
     * @bodyParam   deadline                                    string                L'attribut.                                                                 Example: value
     *
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
     * Supprime un JobOffer
     *
     * @urlParam	id											integer				Le JobOffer.																Example: 1.
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

    /**
     * Cas 3: Gérer le scoring pour une nouvelle offre d'emploi
     * Calculer les scores pour toutes les candidatures spontanées
     */
    private function handleNewOfferScoring($jobOffer): void
    {
        try {
            // Récupérer tous les CVs avec source="spontaneous"
            $spontaneousCVs = Cv::where('source', 'spontaneous')->get();

            if ($spontaneousCVs->isEmpty()) {
                \Log::info("Aucune candidature spontanée disponible");
                return;
            }

            $this->scoringService = app(ScoringService::class);

            foreach ($spontaneousCVs as $cv) {
                $scoreResult = $this->scoringService->scoreCV($cv, $jobOffer);

                if ($scoreResult) {
                    // Vérifier que l'application n'existe pas déjà
                    $existingApplication = Application::where('cv_id', $cv->id)
                        ->where('job_offer_id', $jobOffer->id)
                        ->first();

                    if (!$existingApplication) {
                        Application::create([
                            'cv_id' => $cv->id,
                            'job_offer_id' => $jobOffer->id,
                            'score' => (int) ($scoreResult['score'] ?? 0),
                            'details' => $scoreResult['details'] ?? null,
                            'raison' => $scoreResult['raison'] ?? null,
                            'status' => 'pending'
                        ]);
                    }
                }
            }
        } catch (\Exception $e) {
            \Log::error("Erreur newOfferScoring: {$e->getMessage()}");
        }
    }
}
