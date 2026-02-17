<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Maravel\Http\Controllers\APIController;

/**
 * @group Agence
 *
 * EndPoints pour gérer les Agence
 */
class AgenceController extends APIController
{
    protected string $modelClass = "\App\Models\Agence";

    /**
     * Affiche les Agence
     *
     * @queryParam  name									    string				Description de l'attribut.													Agoe
     * @queryParam  latitude									string				Description de l'attribut.													18526.102
     * @queryParam  longitude									string				Description de l'attribut.													125896.12
     * @queryParam  adress									    string				Description de l'attribut.					                                Agoe
     * @queryParam  type									    string				Description de l'attribut.					                                Agence
     * @queryParam  contact									    string				Description de l'attribut.					                                22315680
     *
     * @queryParam  with_user								    integer				Afficher la relation.														Example: false
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
     * Affiche un Agence
     *
     * @urlParam	id											integer				Le Agence.																Example: 1.
     *
     * @queryParam  with_user								    integer				Afficher la relation.														Example: false
     *
     * @response 200
     */
    public function show(Request $request, $id)
    {
        $this->showAbilityName = null;

        return parent::show($request, $id);
    }

    /**
     * Créer un nouveau Agence
     *
     * @bodyParam 	user_id									    integer				L'attribut.																	Example: value
     * @bodyParam 	name    									string				L'attribut.																	Example: Dekon
     * @bodyParam 	latitude									string				L'attribut.																	Example: 12580.3
     * @bodyParam 	longitude									string				L'attribut.																	Example: 1382.56
     * @bodyParam 	adress  									string				L'attribut.																	Example: Dekon
     * @bodyParam 	contact  									string				L'attribut.																	Example: 90132560
     *
     * @response 200
     */
    public function store(Request $request)
    {
        $connectedUser = $request->user();
        $this->storeValidationArray = [
            'name' => 'required|string',
            'latitude' => 'required|decimal:0,8',
            'longitude' => 'required|decimal:0,8',
            'adress' => 'required|string',
            'type' => 'required|in:seat,agency',
            'contact' => 'required|string'
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
     * Met à jour un Agence
     *
     * @urlParam	id											integer				Le Agence.																Example: 1.
     *
     * @bodyParam 	name    									string				L'attribut.																	Agoe
     * @bodyParam 	latitude									string				L'attribut.																	1258.12
     * @bodyParam 	longitude									string				L'attribut.																	1250.12
     * @bodyParam 	adress									    string				L'attribut.																	Lome
     * @bodyParam 	type									    string				L'attribut.																	agence
     * @bodyParam 	contact									    string				L'attribut.																	98123025
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
     * Supprime un Agence
     *
     * @urlParam	id											integer				Le Agence.																Example: 1.
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
