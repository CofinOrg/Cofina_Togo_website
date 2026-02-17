<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Maravel\Http\Controllers\APIController;

/**
 * @group Notification
 *
 * EndPoints pour gérer les Notification
 */
class NotificationController extends APIController
{
	protected string $modelClass = "\App\Models\Notification";

	/**
	 * Affiche les Notification
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
			// Filtrer les notifications pour l'utilisateur connecté
			if ($connectedUser) {
				$list = $list->where('user_id', $connectedUser->id);
			}
			return $list->orderBy('created_at', 'desc');
		};
		return parent::index($request);
    }

	/**
	 * Récupère le nombre de notifications non lues
	 *
	 * @response 200
	 */
	public function unreadCount(Request $request)
	{
		$connectedUser = $request->user();
		$count = \App\Models\Notification::where('user_id', $connectedUser->id)
			->where('is_read', false)
			->count();

		return response()->json(['count' => $count]);
	}

	/**
	 * Marque une notification comme lue
	 *
	 * @urlParam id integer Le Notification. Example: 1.
	 *
	 * @response 200
	 */
	public function markAsRead(Request $request, $id)
	{
		$connectedUser = $request->user();
		$notification = \App\Models\Notification::where('id', $id)
			->where('user_id', $connectedUser->id)
			->firstOrFail();

		$notification->update(['is_read' => true]);

		return response()->json(['message' => 'Notification marquée comme lue']);
	}

	/**
	 * Marque toutes les notifications comme lues
	 *
	 * @response 200
	 */
	public function markAllAsRead(Request $request)
	{
		$connectedUser = $request->user();
		\App\Models\Notification::where('user_id', $connectedUser->id)
			->where('is_read', false)
			->update(['is_read' => true]);

		return response()->json(['message' => 'Toutes les notifications ont été marquées comme lues']);
	}

	/**
	 * Affiche un Notification
	 *
	 * @urlParam	id											integer				Le Notification.																Example: 1.
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
	 * Créer un nouveau Notification
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
	 * Met à jour un Notification
	 *
	 * @urlParam	id											integer				Le Notification.																Example: 1.
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
	 * Supprime un Notification
	 *
	 * @urlParam	id											integer				Le Notification.																Example: 1.
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
