<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Maravel\Http\Controllers\APIController;

/**
 * @group ExchangeRate
 *
 * EndPoints pour gérer les ExchangeRate
 */
class ExchangeRateController extends APIController
{
	protected string $modelClass = "\App\Models\ExchangeRate";

	/**
	 * Affiche les ExchangeRate
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
	 * Affiche un ExchangeRate
	 *
	 * @urlParam	id											integer				Le ExchangeRate.																Example: 1.
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
	 * Créer un nouveau ExchangeRate
	 *
	 * @bodyParam 	attribute									string				L'attribut.																	Example: value
	 *
	 * @response 200
	 */
	public function store(Request $request)
	{
		$connectedUser = $request->user();
		$this->storeValidationArray = [
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
	 * Met à jour un ExchangeRate
	 *
	 * @urlParam	id											integer				Le ExchangeRate.																Example: 1.
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
	 * Supprime un ExchangeRate
	 *
	 * @urlParam	id											integer				Le ExchangeRate.																Example: 1.
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
