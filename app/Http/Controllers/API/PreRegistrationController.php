<?php

namespace App\Http\Controllers\API;

use App\Mail\PreRegistrationConfirmation;
use App\Models\Notification;
use App\Models\PreRegistration;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Maravel\Http\Controllers\APIController;

/**
 * @group PreRegistration
 *
 * EndPoints pour gérer les PreRegistration
 */
class PreRegistrationController extends APIController
{
    protected string $modelClass = "\App\Models\PreRegistration";

    /**
     * Affiche les PreRegistration
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
     * Affiche un PreRegistration
     *
     * @urlParam	id											integer				Le PreRegistration.																Example: 1.
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
     * Créer un nouveau PreRegistration
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
            'product_id' => 'required|exists:service_products,id',
            'customer_name' => 'required|string',
            'customer_adress' => 'required|string',
            'customer_email' => 'required|email',
            'identity_document' => 'required|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:10240',
            'identity_photo' => 'required|file|mimes:jpg,jpeg,png|max:10240',
            'proof_of_address' => 'required|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:10240',
            'card_cfe' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:10240',
            'receipt_number' => 'nullable|string',
            'phone_number' => 'nullable|string',
            'account_number' => 'nullable|string',
            'business' => 'nullable|string',
        ];
        $this->storeManualValidationsFunction = function ($requestData) use ($connectedUser) {
            return null;
        };
        $this->storeBeforeCreateFunction = function ($requestData) use ($connectedUser) {
            $fileFields = ['identity_document', 'identity_photo', 'proof_of_address', 'card_cfe'];
            foreach ($fileFields as $field) {
                if (isset($requestData[$field]) && $requestData[$field] instanceof \Illuminate\Http\UploadedFile) {
                    $requestData[$field] = $requestData[$field]->store('pre_registrations/' . $field, 'public');
                }
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
            // Recharger le modèle avec la relation product
            $model->load('product');

            // Envoyer l'email de confirmation au client
            try {
                Mail::to($model->customer_email)->send(new PreRegistrationConfirmation($model));
            } catch (\Exception $e) {
                \Log::error('Erreur envoi email pré-inscription: ' . $e->getMessage());
            }

            // Créer une notification pour les admins et chargés de clientèle
            $usersToNotify = User::whereIn('profile', ['admin', 'cc', 'marketing'])->get();
            $productName = $model->product ? $model->product->name : 'Non spécifié';

            foreach ($usersToNotify as $user) {
                Notification::create([
                    'user_id' => $user->id,
                    'title' => 'Nouvelle pré-inscription',
                    'message' => "Nouvelle pré-inscription de {$model->customer_name} pour le produit {$productName}",
                    'type' => 'info',
                    'is_read' => false,
                ]);
            }

            return $model;
        };
        $this->storeRelationArray = [
        ];
        return parent::store($request);
    }

    /**
     * Met à jour un PreRegistration
     *
     * @urlParam	id											integer				Le PreRegistration.																Example: 1.
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
     * Supprime un PreRegistration
     *
     * @urlParam	id											integer				Le PreRegistration.																Example: 1.
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
