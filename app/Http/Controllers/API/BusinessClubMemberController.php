<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Maravel\Http\Controllers\APIController;

/**
 * @group BusinessClubMember
 *
 * EndPoints pour gérer les BusinessClubMember
 */
class BusinessClubMemberController extends APIController
{
    protected string $modelClass = "\App\Models\BusinessClubMember";

    /**
     * Affiche les BusinessClubMember
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
     * Affiche un BusinessClubMember
     *
     * @urlParam	id											integer				Le BusinessClubMember.																Example: 1.
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
     * Créer un nouveau BusinessClubMember
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
            'email' => 'required|string|email|max:255|unique:business_club_members',
            'phone' => 'nullable|string|max:20',
            'job' => 'nullable|string|max:255',
            'account_number' => 'required|unique:business_club_members',
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
     * Met à jour un BusinessClubMember
     *
     * @urlParam	id											integer				Le BusinessClubMember.																Example: 1.
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
     * Supprime un BusinessClubMember
     *
     * @urlParam	id											integer				Le BusinessClubMember.																Example: 1.
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
