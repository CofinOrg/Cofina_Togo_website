<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Maravel\Http\Controllers\APIController;

/**
 * @group Utilisateurs
 *
 * EndPoints pour gérer les utilisateurs
 */
class UserController extends APIController
{
    protected string $modelClass = User::class;

    protected array $indexSearchFieldList = ['name', 'email'];

    protected array $storeRelationArray = [];

    protected array $updateRelationArray = [];

    public function __construct()
    {
        parent::__construct();

        $this->storeValidationArray = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'activated' => 'sometimes|boolean',
            'password_change_required' => 'sometimes|boolean',
        ];

        $this->updateGetValidationArrayFunction = function (int $id) {
            return [
                'name' => 'sometimes|string|max:255',
                'email' => 'sometimes|string|email|max:255|unique:users,email,' . $id,
                'password' => 'sometimes|string|min:8',
                'activated' => 'sometimes|boolean',
                'password_change_required' => 'sometimes|boolean',
            ];
        };

        $this->storeBeforeCreateFunction = function (array $requestData) {
            if (isset($requestData['password'])) {
                $requestData['password'] = Hash::make($requestData['password']);
            }
            return $requestData;
        };

        $this->updateBeforeUpdateFunction = function ($model, array $requestData) {
            if (isset($requestData['password'])) {
                $requestData['password'] = Hash::make($requestData['password']);
            }
            return $requestData;
        };
    }

    /**
     * Mettre à jour le mot de passe de l'utilisateur connecté
     *
     * @bodyParam current_password  string  required Le mot de passe actuel.     Example: oldpassword
     * @bodyParam new_password      string  required Le nouveau mot de passe.    Example: newpassword
     * @bodyParam new_password_confirmation string required La confirmation du nouveau mot de passe. Example: newpassword
     *
     * @response 200
     */
    public function updatePassword(Request $request)
    {
        // Vérifier l'autorisation
        $user = $request->user();
        $this->authorize('updatePassword', $user);

        $validator = Validator::make($request->all(), [
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8|confirmed',
        ], [
            'current_password.required' => 'Le mot de passe actuel est requis',
            'new_password.required' => 'Le nouveau mot de passe est requis',
            'new_password.min' => 'Le nouveau mot de passe doit contenir au moins 8 caractères',
            'new_password.confirmed' => 'La confirmation du mot de passe ne correspond pas',
        ]);

        if ($validator->fails()) {
            return $this->responseError($validator->errors()->toArray(), 400);
        }

        if (!Hash::check($request->current_password, $user->password)) {
            return $this->responseError([
                'current_password' => ['Le mot de passe actuel est incorrect']
            ], 400);
        }

        $user->password = Hash::make($request->new_password);
        $user->password_change_required = false;
        $user->save();

        return $this->responseOk([
            'message' => 'Mot de passe modifié avec succès',
            'user' => $user
        ]);
    }

    /**
     * Liste les uilisateurs
     *
     * @queryParam 	name				   		string	required	Le nom de l'utilisateur.								        		No-example
     * @queryParam 	email						string	required	L'email de l'utilisateur.									        	No-example
     * @queryParam 	password					string	required	Le mot de passe de l'utilisateur.										No-example
     * @queryParam 	profile						string	required	Le profile de l'utilisateur.								       		No-example
     * @queryParam 	activated					string	required	L'activation de l'utilisateur.										    No-example
     *
     * @response 200
     *
     */
    public function index(Request $request)
    {
        return parent::index($request);
    }


    /**
     * Affiche un uilisateur
     *
     * @urlParam 	id							integer	required	L'id de l'utilisateur.										            No-example
     *
     * @response 200
     *
     */
    public function show(Request $request, $id)
    {
        return parent::show($request, $id);
    }

    /**
     * Ajouter un uilisateur
     *
     * @bodyParam 	name				   		string	required	Le nom de l'utilisateur.								        		No-example
     * @bodyParam 	email						string	required	L'email de l'utilisateur.									        	No-example
     * @bodyParam 	password					string	required	Le mot de passe de l'utilisateur.										No-example
     * @bodyParam 	profile						string	required	Le profile de l'utilisateur.								       		No-example
     * @bodyParam 	activated					string	required	L'activation de l'utilisateur.										    No-example
     *
     * @response 200
     *
     */
    public function store(Request $request)
    {
        return parent::store($request);
    }


    /**
     * Uploader parties d'un fichier
     *
     * @urlParam	file										string				La partie du fichier.														Example: ...
     * @urlParam	index										integer				L'id de la partie du fichier.												Example: 1
     * @urlParam	filename									string				Le nom du fichier.															Example: test
     *
     * @response 200
     */
    public function uploadchunk(Request $request)
    {
        return parent::uploadChunk($request);
    }


    /**
     * Fusionner les partie d'un fichier uploadé
     *
     * @urlParam	filename									string				Le nom du fichier.															Example: test
     *
     * @response 200
     */
    public function mergeChunks(Request $request)
    {
        return parent::mergeChunks($request);
    }

    /**
     * Mettre à jour un utilisateur
     *
     * @urlParam 	id							integer	required	L'id de l'utilisateur.										            No-example
     *
     * @bodyParam 	name				   		string	required	Le nom de l'utilisateur.								        		No-example
     * @bodyParam 	email						string	required	L'email de l'utilisateur.									        	No-example
     * @bodyParam 	password					string	required	Le mot de passe de l'utilisateur.										No-example
     * @bodyParam 	profile						string	required	Le profile de l'utilisateur.								       		No-example
     * @bodyParam 	activated					string	required	L'activation de l'utilisateur.										    No-example
     *
     * @response 200
     *
     */
    public function update(Request $request, int $id)
    {
        return parent::update($request, $id);
    }

    /**
     * Surppimer l'utilisateur
     *
     * @urlParam 	id							integer	required	L'id de l'utilisateur.										            No-example
     *
     * @response 200
     *
     */
    public function destroy(Request $request, $id)
    {
        return parent::destroy($request, $id);
    }
}    
