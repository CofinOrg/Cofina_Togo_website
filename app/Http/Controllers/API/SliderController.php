<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Maravel\Http\Controllers\APIController;

/**
 * @group Slider
 *
 * EndPoints pour gérer les Slider
 */
class SliderController extends APIController
{
    protected string $modelClass = "\App\Models\Slider";

    /**
     * Affiche les Slider
     *
     * @queryParam  slide_path									string				Description de l'attribut.													 Example: /storage
     * @queryParam  is_published								boolean				Description de l'attribut.													 Example: false
     *
     * @queryParam  with_user       							string				Afficher la relation.														Example: false
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
     * Affiche un Slider
     *
     * @urlParam	id											integer				Le Slider.																Example: 1.
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
     * Créer un nouveau Slider
     *
     * @bodyParam 	user_id									    integer				L'attribut.																	Example: 1
     * @bodyParam 	slide_path									string				L'attribut.																	Example: /local
     * @bodyParam 	is_published								boolean				L'attribut.																	Example: false
     *
     * @response 200
     */
    public function store(Request $request)
    {
        $connectedUser = $request->user();
        $this->storeValidationArray = [
            'slide_path' => 'required|image|max:20240',
            'text' => 'nullable|string',
            'is_published' => 'required|boolean'
        ];
        $this->storeManualValidationsFunction = function ($requestData) use ($connectedUser) {

            return null;
        };
        $this->storeBeforeCreateFunction = function ($requestData) use ($connectedUser, $request) {
            $requestData['user_id'] = $connectedUser->id;

            if ($request->hasFile('slide_path')) {
                $path = $request->file('slide_path')->store('sliders', 'public');
                $requestData['slide_path'] = '/storage/' . $path;
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
     * Met à jour un Slider
     *
     * @urlParam	id											integer				Le Slider.																Example: 1.
     *
     * @bodyParam 	slide_path									string				L'attribut.																	Example: /storage
     * @bodyParam 	is_published								boolean				L'attribut.																	Example: true
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
        $this->updateBeforeUpdateFunction = function ($model, $requestData, $data) use ($connectedUser, $request) {
            if ($request->hasFile('slide_path')) {
                $path = $request->file('slide_path')->store('sliders', 'public');
                $requestData['slide_path'] = '/storage/' . $path;
            }

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
     * Supprime un Slider
     *
     * @urlParam	id											integer				Le Slider.																Example: 1.
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
