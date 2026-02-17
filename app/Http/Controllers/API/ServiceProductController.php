<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Maravel\Http\Controllers\APIController;

/**
 * @group ServiceProduct
 *
 * EndPoints pour gérer les ServiceProduct
 */
class ServiceProductController extends APIController
{
    protected string $modelClass = "\App\Models\ServiceProduct";

    /**
     * Affiche les ServiceProduct
     *
     * @queryParam  name									string				Description de l'attribut.													 No-example
     * @queryParam  advantage								string				Description de l'attribut.													 No-example
     * @queryParam  deposit_at_opening						string				Description de l'attribut.													 No-example
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
            if (isset($requestData['service_id'])) {
                $list = $list->where('service_id', $requestData['service_id']);
            }
            if (isset($requestData['section'])) {
                $list = $list->where('section', $requestData['section']);
            }
            return $list;
        };
        return parent::index($request);
    }

    /**
     * Affiche un ServiceProduct
     *
     * @urlParam	id											integer				Le ServiceProduct.																Example: 1.
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
     * Créer un nouveau ServiceProduct
     *
     * @bodyParam 	name    									string				L'attribut.																	Example: woezon
     * @bodyParam 	advantage									string				L'attribut.																	Example: super
     * @bodyParam 	deposit_at_opening							string				L'attribut.																	Example: 500000
     *
     * @response 200
     */
    public function store(Request $request)
    {
        $connectedUser = $request->user();
        $this->storeValidationArray = [
            'name' => 'required|string',
            'credit_access' => 'nullable|string',
            'advantage' => 'required|string',
            'deposit_at_opening' => 'nullable|numeric|min:0',
            'service_id' => 'required|exists:services,id',
            'section' => 'required|in:ordinary,premium',
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
     * Met à jour un ServiceProduct
     *
     * @urlParam	id											integer				Le ServiceProduct.																Example: 1.
     *
     * @bodyParam 	name									    string				L'attribut.																	Example: value
     * @bodyParam 	advantage									string				L'attribut.																	Example: value
     * @bodyParam 	deposit_at_opening							string				L'attribut.																	Example: value
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
     * Supprime un ServiceProduct
     *
     * @urlParam	id											integer				Le ServiceProduct.																Example: 1.
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
