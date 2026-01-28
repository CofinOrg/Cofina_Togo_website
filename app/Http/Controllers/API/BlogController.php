<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Maravel\Http\Controllers\APIController;

/**
 * @group Blog
 *
 * EndPoints pour gérer les Blog
 */
class BlogController extends APIController
{
    protected string $modelClass = "\App\Models\Blog";

    /**
     * Affiche les Blog
     *
     * @queryParam  attribute									string				Description de l'attribut.
     * @queryParam  title                                       string          	Une nouvelle ère
     * @queryParam  content                                     string                Aventure...
     * @queryParam  sommary                                     string                Cc
     * @queryParam  is_published                                boolean             1
     * @queryParam  published_at                                string           2026-01-20 12:00:00
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
     * Affiche un Blog
     *
     * @urlParam	id											integer				Le Blog.																Example: 1.
     *
     *
     * @response 200
     */
    public function show(Request $request, $id)
    {
        return parent::show($request, $id);
    }

    /**
     * Créer un nouveau Blog
     *
     * @bodyParam 	    user_id									integer				    Example: 1
     * @bodyParam        title       							string				    Example: Mon premier blog
     * @bodyParam      content       							string					Example: Contenu de mon premier blog
     * @bodyParam       summary       							string					Example: Résumé de mon premier blog
     * @bodyParam        is_published       					boolean					Example: 1
     * @bodyParam        published_at       					string				    Example: 2026-01-20 12:00:00
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
            'coverImage' => 'required|string|max:500',
            'status' => 'required|string'

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
            'user_id' => $connectedUser->id,
        ];
        return parent::store($request);
    }

    /**
     * Met à jour un Blog
     *
     * @urlParam	id											integer				Le Blog.																Example: 1.
     *
     * @bodyParam		title                       				string              Example: Mon blog mis à jour
     * @bodyParam       content       							    string			    Example: Contenu mis à jour de
     * @bodyParam        summary       							    string				Example: Résumé mis à jour
     * @bodyParam       is_published       						    boolean				Example: 0
     * @bodyParam        published_at       						    string			    Example: 2026-02-15 15:30:00
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
     * Supprime un Blog
     *
     * @urlParam	id											integer				Le Blog.																Example: 1.
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
