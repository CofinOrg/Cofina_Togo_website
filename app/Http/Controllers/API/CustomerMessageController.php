<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Maravel\Http\Controllers\APIController;

/**
 * @group CustomerMessage
 *
 * EndPoints pour gérer les CustomerMessage
 */
class CustomerMessageController extends APIController
{
    protected string $modelClass = "\App\Models\CustomerMessage";

    /**
     * Affiche les CustomerMessage
     *
     * @queryParam  customer_name									string				Description de l'attribut.													 No-example
     * @queryParam  customer_email									string				Description de l'attribut.													 No-example
     * @queryParam  customer_contact								string				Description de l'attribut.													 No-example
     * @queryParam  message_object									string				Description de l'attribut.													 No-example
     * @queryParam  message							            	string				Description de l'attribut.													 No-example
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
     * Affiche un CustomerMessage
     *
     * @urlParam	id											integer				Le CustomerMessage.																Example: 1.
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
     * Créer un nouveau CustomerMessage
     *
     * @bodyParam 	customer_name									string				L'attribut.																	Example: value
     * @bodyParam 	customer_email									string				L'attribut.																	Example: value
     * @bodyParam 	customer_contact								string				L'attribut.																	Example: value
     * @bodyParam 	message_object									string				L'attribut.																	Example: valueattribute
     * @bodyParam 	message_object									string				L'attribut.																	Example: value
     *
     * @response 200
     */
    public function store(Request $request)
    {
        $connectedUser = $request->user();
        $this->storeAuthName = null;
        $this->storeValidationArray = [
            'customer_name' => 'required|string',
            'customer_email' => 'required|string',
            'customer_contact' => 'required|string',
            'message_object' => 'required|string',
            'message' => 'required|string'
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
     * Met à jour un CustomerMessage
     *
     * @urlParam	id											integer				Le CustomerMessage.																Example: 1.
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
     * Supprime un CustomerMessage
     *
     * @urlParam	id											integer				Le CustomerMessage.																Example: 1.
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
