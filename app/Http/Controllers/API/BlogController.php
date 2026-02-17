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
        $this->indexAbilityName = null;
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
        $this->showAbilityName = null;
        return parent::show($request, $id);
    }

    /**
     * Créer un nouveau Blog
     *
     * @bodyParam 	    user_id									integer				    Example: 1
     * @bodyParam        title       							string				    Example: Mon premier blog
     * @bodyParam      content       							string					Example: Contenu de mon premier blog
     * @bodyParam       summary       							string					Example: Résumé de mon premier blog
     * @bodyParam        is_phublised       					boolean					Example: 1
     * @bodyParam        published_at       					string				    Example: 2026-01-20 12:00:00
     *
     * @response 200
     */
    public function store(Request $request)
    {
        $connectedUser = $request->user();
        $this->storeValidationArray = [
            'title' => 'required|string',
            'content' => 'required|string',
            'summary' => 'required|string|max:500',
            'coverImage' => 'required|string',
            'status' => 'required|string'
        ];
        $this->storeManualValidationsFunction = function ($requestData) use ($connectedUser) {
            return null;
        };
        $this->storeBeforeCreateFunction = function ($requestData) use ($connectedUser) {
            $requestData['user_id'] = $connectedUser->id;

            if (!empty($requestData['coverImage']) && str_starts_with($requestData['coverImage'], 'data:')) {
                $path = $this->saveBase64File($requestData['coverImage'], 'blogs');
                if ($path) {
                    $requestData['coverImage'] = $path;
                }
            }

            // Convertir les images base64 du contenu HTML en fichiers stockés
            if (!empty($requestData['content'])) {
                $requestData['content'] = preg_replace_callback(
                    '/src="(data:image\/[^;]+;base64,[^"]+)"/',
                    function ($matches) {
                        $path = $this->saveBase64File($matches[1], 'blogs/content');
                        if ($path) {
                            return 'src="/storage/' . $path . '"';
                        }
                        return $matches[0];
                    },
                    $requestData['content']
                );
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
            if (!empty($requestData['coverImage']) && str_starts_with($requestData['coverImage'], 'data:')) {
                $path = $this->saveBase64File($requestData['coverImage'], 'blogs');
                if ($path) {
                    $requestData['coverImage'] = $path;
                }
            }

            if (!empty($requestData['content'])) {
                $requestData['content'] = preg_replace_callback(
                    '/src="(data:image\/[^;]+;base64,[^"]+)"/',
                    function ($matches) {
                        $path = $this->saveBase64File($matches[1], 'blogs/content');
                        if ($path) {
                            return 'src="/storage/' . $path . '"';
                        }
                        return $matches[0];
                    },
                    $requestData['content']
                );
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
