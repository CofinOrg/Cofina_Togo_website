<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Maravel\Http\Controllers\APIController;

/**
 * @group Service
 *
 * EndPoints pour gérer les Service
 */
class ServiceController extends APIController
{
    protected string $modelClass = "\App\Models\Service";

    /**
     * Affiche les Service
     *
     * @queryParam  name    									string				Description de l'attribut.													 No-example
     * @queryParam  description									string				Description de l'attribut.													 No-example
     * @queryParam  type									string				Description de l'attribut.													 No-example
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
        $this->indexSearchFieldList = [
        ];
        $this->indexManualFilter = function ($list, $connectedUser, $requestData) {
            return $list;
        };
        return parent::index($request);
    }

    /**
     * Affiche un Service
     *
     * @urlParam	id											integer				Le Service.																Example: 1.
     *
     * @queryParam  with_user   								string				Afficher la relation.														Example: false
     *
     * @response 200
     */
    public function show(Request $request, $id)
    {
        $this->showAbilityName = null;
        return parent::show($request, $id);
    }

    /**
     * Créer un nouveau Service
     *
     * @bodyParam 	user_id 									integer				L'attribut.																	Example: 1
     * @bodyParam 	name    									string				L'attribut.																	Example: Pack entreprise
     * @bodyParam 	description									string				L'attribut.																	Example: value
     * @bodyParam 	type    									string				L'attribut.																	Example: pack
     *
     * @response 200
     */
    public function store(Request $request)
    {
        $connectedUser = $request->user();
        $this->storeValidationArray = [
            'name' => 'required|string',
            'description' => 'required|string',
            'type' => 'required|in:pack,financial_solution'
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
            return $model;
        };
        $this->storeRelationArray = [
        ];
        return parent::store($request);
    }

    /**
     * Met à jour un Service
     *
     * @urlParam	id											integer				Le Service.																Example: 1.
     *
     * @bodyParam 	name    									string				L'attribut.																	Example: packs solo
     * @bodyParam 	description									string				L'attribut.																	Example: value
     * @bodyParam 	type    									string				L'attribut.																	Example: financial_solution
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
     * Supprime un Service
     *
     * @urlParam	id											integer				Le Service.																Example: 1.
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
