<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Maravel\Models\ModelBase;

/**
 * Modèle Service
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */
class Service extends ModelBase
{
    use HasFactory;
    // use SoftDeletes; // Décommenter si vous souhaitez utiliser le soft delete

    /**
     * Le nom de la table associée au modèle
     *
     * @var string
     */
    protected $table = 'services';

    /**
     * Les attributs assignables en masse
     *
     * @var array<int, string>
     */
    protected $fillable = [
        // Ajoutez vos colonnes ici

        'user_id',
        'name',
        'description',
        'type',
    ];

    /**
     * Les attributs qui doivent être cachés pour la sérialisation
     *
     * @var array<int, string>
     */
    protected $hidden = [
        // Exemple: 'password', 'remember_token'
    ];

    /**
     * Les attributs qui doivent être castés
     *
     * @var array<string, string>
     */
    protected $casts = [
        // Exemple: 'email_verified_at' => 'datetime'
    ];

    /**
     * Casts de dates personnalisés (format français)
     * Format: ['column_name' => 'd/m/Y H:i']
     *
     * @var array
     */
    protected $dateCasts = [
        // Exemple: 'published_at' => 'd/m/Y H:i'
    ];

    /**
     * Casts monétaires (affichage avec devise)
     * Les valeurs seront formatées avec virgule et devise XOF
     *
     * @var array
     */
    protected $moneyCasts = [
        // Exemple: 'price', 'cost', 'total'
    ];

    /**
     * Casts booléens (conversion automatique)
     *
     * @var array
     */
    protected $booleanCasts = [
        // Exemple: 'is_active', 'is_published'
    ];

    /**
     * Casts d'énumération (traduction des valeurs)
     * Format: ['column' => ['value1' => 'Label1', 'value2' => 'Label2']]
     *
     * @var array
     */
    protected $enumCasts = [
        // Exemple:
        // 'status' => [
        //     'draft' => 'Brouillon',
        //     'published' => 'Publié',
        //     'archived' => 'Archivé',
        // ],
    ];

    /*
    |--------------------------------------------------------------------------
    | Relations Eloquent
    |--------------------------------------------------------------------------
    |
    | Définissez ici les relations avec d'autres modèles
    |
    */

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function service_product()
    {
        return $this->hasMany(ServiceProduct::class);
    }

    // Exemple de relation BelongsTo:
    // public function user(): BelongsTo
    // {
    //     return $this->belongsTo(User::class);
    // }

    // Exemple de relation HasMany:
    // public function comments(): HasMany
    // {
    //     return $this->hasMany(Comment::class);
    // }

    // Exemple de relation BelongsToMany:
    // public function tags(): BelongsToMany
    // {
    //     return $this->belongsToMany(Tag::class);
    // }

    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    |
    | Définissez ici les query scopes pour filtrer les résultats
    |
    */

    // Exemple de scope:
    // public function scopeActive($query)
    // {
    //     return $query->where('is_active', true);
    // }

    /*
    |--------------------------------------------------------------------------
    | Accesseurs & Mutateurs
    |--------------------------------------------------------------------------
    |
    | Définissez ici les accesseurs et mutateurs personnalisés
    |
    */

    // Exemple d'accesseur:
    // protected function fullName(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn () => "{$this->first_name} {$this->last_name}",
    //     );
    // }

    /*
    |--------------------------------------------------------------------------
    | Méthodes personnalisées
    |--------------------------------------------------------------------------
    */

    // Ajoutez vos méthodes personnalisées ici
}
