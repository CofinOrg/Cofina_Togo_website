<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Maravel\Http\Controllers\APIController;

/**
 * @group SpontaneousApplication
 *
 * EndPoints pour gérer les SpontaneousApplication
 */
class SpontaneousApplicationController extends APIController
{
    protected string $modelClass = "\App\Models\SpontaneousApplication";

    /**
     * Affiche les SpontaneousApplication
     *
     * @queryParam  name									string				Description de l'attribut.													 No-example
     * @queryParam  email									string				Description de l'attribut.													 No-example
     * @queryParam  desired_position						string				Description de l'attribut.													 No-example
     * @queryParam  motivation_message						string				Description de l'attribut.													 No-example
     * @queryParam  cv_path									string				Description de l'attribut.													 No-example
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
     * Affiche un SpontaneousApplication
     *
     * @urlParam	id											integer				Le SpontaneousApplication.																Example: 1.
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
     * Créer un nouveau SpontaneousApplication
     *
     * @bodyParam 	name									string				L'attribut.																	Example: value
     * @bodyParam 	email									string				L'attribut.																	Example: value
     * @bodyParam 	desired_position						string				L'attribut.																	Example: value
     * @bodyParam 	motivation_message						string				L'attribut.																	Example: value
     * @bodyParam 	cv_path									string				L'attribut.																	Example: value
     *
     * @response 200
     */
    public function store(Request $request)
    {
        $connectedUser = $request->user();
        $this->storeAuthName = null;
        $this->storeValidationArray = [
            'name' => 'required|string',
            'email' => 'required|email',
            'desired_position' => 'required|string',
            'motivation_message' => 'required|string',
            'cv_path' => 'required|file|mimes:pdf|max:5120'
        ];
        $this->storeManualValidationsFunction = function ($requestData) use ($connectedUser) {
            return null;
        };
        $this->storeBeforeCreateFunction = function ($requestData) use ($connectedUser) {
            if (isset($requestData['cv_path']) && $requestData['cv_path'] instanceof \Illuminate\Http\UploadedFile) {
                $requestData['cv_path'] = $requestData['cv_path']->store('spontaneous_applications/cv', 'public');
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
            return $model;
        };
        $this->storeRelationArray = [
        ];
        return parent::store($request);
    }

    /**
     * Met à jour un SpontaneousApplication
     *
     * @urlParam	id											integer				Le SpontaneousApplication.																Example: 1.
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
     * Supprime un SpontaneousApplication
     *
     * @urlParam	id											integer				Le SpontaneousApplication.																Example: 1.
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
