<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Maravel\Http\Controllers\APIController;

/**
 * @group Announcement
 *
 * EndPoints pour gérer les Announcement
 */
class AnnouncementController extends APIController
{
    protected string $modelClass = "\App\Models\Announcement";

    /**
     * Affiche les Announcement
     * @authenticated
     * @queryParam  content								    	string				Description de l'attribut.													 Je suis
     * @queryParam  is_published								string				Description de l'attribut.													 true
     *
     * @queryParam  with_user   								integer				Afficher la relation.														Example: false
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
     * Affiche un Announcement
     *
     * @urlParam	id											integer				Le Announcement.																Example: 1.
     *
     * @queryParam  with_user   								integer 				Afficher la relation.														Example: false
     *
     * @response 200
     */
    public function show(Request $request, $id)
    {
        $this->showAbilityName = null;
        return parent::show($request, $id);
    }

    /**
     * Créer un nouveau Announcement
     *
     * @bodyParam 	user_id 									integer				L'attribut.																	Example: 1
     * @bodyParam 	content 									string				L'attribut.																	Example: value
     * @bodyParam 	is_published  								boolean				L'attribut.																	Example: false
     *
     * @response 200
     */
    public function store(Request $request)
    {
        $connectedUser = $request->user();
        $this->storeValidationArray = [
            'content' => 'required|string',
            'is_published' => 'required|boolean'
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
     * Met à jour un Announcement
     *
     * @urlParam	id											integer				Le Announcement.																Example: 1.
     *
     * @bodyParam 	content 									string				L'attribut.																	Example: value
     * @bodyParam 	is_published								boolean				L'attribut.																	Example: value
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
     * Supprime un Announcement
     *
     * @urlParam	id											integer				Le Announcement.																Example: 1.
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
