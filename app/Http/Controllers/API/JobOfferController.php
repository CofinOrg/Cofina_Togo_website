<?php

namespace App\Http\Controllers\API;

use App\Models\JobOffer;
use Illuminate\Http\Request;
use Maravel\Http\Controllers\APIController;

/**
 * @group JobOffer
 *
 * EndPoints pour gérer les JobOffer
 */
class JobOfferController extends APIController
{
    protected string $modelClass = "\App\Models\JobOffer";

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
        $this->indexSearchFieldList = [
        ];
        $this->indexManualFilter = function ($list, $connectedUser, $requestData) {
            return $list;
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
            'user_id' => 'required|integer|exists:users,id',
            'title' => 'required|string',
            'content' => 'required|string|max:5000',
            'summary' => 'required|string|max:500',
            'deadline' => 'required|date',
        ];
        $this->storeManualValidationsFunction = function ($requestData) use ($connectedUser) {
            return null;
        };
        $this->storeBeforeCreateFunction = function ($requestData) use ($connectedUser) {
            return $requestData;
        };
        $this->storeAfterCreateFunction = function ($model, $requestData, $data) use ($connectedUser) {
            return $model;
        };
        $this->storeBeforeCommitFunction = function ($model, $requestData, $data) use ($connectedUser) {
            return $model;
        };
        $this->storeAfterCommitFunction = function ($model, $requestData, $data) use ($connectedUser) {
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
}
