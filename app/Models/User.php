<?php

namespace App\Models;

use ArrayAccess;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Maravel\Models\AuthenticatableBase;
use function PHPUnit\Framework\returnArgument;

class User extends AuthenticatableBase
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile',
        'activated',
        'password_change_required',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    public $appends = [
        'ability_rules',
    ];


    /*
    |--------------------------------------------------------------------------
    | Relations Eloquent
    |--------------------------------------------------------------------------
    |
    | Définissez ici les relations avec d'autres modèles
    |
    */
    public function job_offers()
    {
        return $this->hasMany(JobOffer::class, 'user_id');
    }

    public function blog()
    {
        return $this->hasMany(Blog::class, 'user_id');
    }

    public function announcement()
    {
        return $this->hasMany(Announcement::class);
    }

    public function slider()
    {
        return $this->hasMany(Slider::class);
    }

    public function Service()
    {
        return $this->hasMany(Service::class);
    }

    public function notification()
    {
        return $this->hasMany(Notification::class);
    }

    public function Agence()
    {
        return $this->hasMany(Agence::class);
    }


    public function getAbilityRulesAttribute(): array
    {
        return match ($this->profile) {
            'admin' => [['subject' => ['all'], 'action' => ['manage']]],
            'rh' => [
                [
                    'subject' => ['spontaneousapplication'],
                    'action' => [
                        'menu',
                        'read',
                        'delete'
                    ]
                ],


                [
                    'subject' => ['notification'],
                    'action' => [
                        'menu',
                        'read',
                        'delete'
                    ]
                ],  
                
                [
                    'subject' => ['application'],
                    'action' => [
                        'menu',
                        'read',
                        'delete'
                    ]
                ],  
                
                [
                    'subject' => ['joboffer'],
                    'action' => [
                        'menu',
                        'read',
                        'delete'
                    ]
                ],

                [
                    'subject' => ['cv'],
                    'action' => [
                        'menu',
                        'read',
                        'delete'
                    ]
                ],


            ],

            'marketing' => [
                [
                    'subject' => ['agence'],
                    'action' => [
                        'menu',
                        'read',
                        'delete'
                    ]
                ],
                [
                    'subject' => ['service'],
                    'action' => [
                        'menu',
                        'read',
                        'delete'
                    ]
                ],
                [
                    'subject' => ['serviceproduct'],
                    'action' => [
                        'menu',
                        'read',
                        'delete'
                    ]
                ],
                [
                    'subject' => ['slider'],
                    'action' => [
                        'menu',
                        'read',
                        'delete'
                    ]
                ],
                [
                    'subject' => ['blog'],
                    'action' => [
                        'menu',
                        'read',
                        'delete'
                    ]
                ],
                [
                    'subject' => ['announcement'],
                    'action' => [
                        'menu',
                        'read',
                        'delete'
                    ]
                ],

                [
                    'subject' => ['applications'],
                    'action' => [
                        'menu',
                        'read',
                        'delete'
                    ]
                ],

                [
                    'subject' => ['preregistration'],
                    'action' => [
                        'menu',
                        'read',
                        'delete'
                    ]
                ],
                [
                    'subject' => ['customermessage'],
                    'action' => [
                        'menu',
                        'read',
                        'delete'
                    ]
                ],
                [
                    'subject' => ['businessclubmember'],
                    'action' => [
                        'menu',
                        'read',
                        'delete'
                    ]
                ],
            ],

            'cc' => [
                [
                    'subject' => ['preregistration'],
                    'action' => [
                        'menu',
                        'read',
                        'delete'
                    ]
                ],
                [
                    'subject' => ['customermessage'],
                    'action' => [
                        'menu',
                        'read',
                        'delete'
                    ]
                ],
                [
                    'subject' => ['notification'],
                    'action' => [
                        'menu',
                        'read',
                        'delete'
                    ]
                ],

            ],

            default => []
        };
    }

    /**
     * Casts d'énumération pour le profil
     *
     * @var array
     */
    protected $enumCasts = [
        [
            'colum_name' => 'profile',
            'additional_column_name' => "profile_fr",
            'choices' => [
                'admin' => "Administrateur",
                'rh' => "Ressource Humaine",
                'marketing' => "Marketing",
                'cc' => "Chargé de Clientèle",
            ]
        ],
        [
            'colum_name' => 'activated',
            'additional_column_name' => "activated_fr",
            'choices' => [
                1 => "Oui",
                0 => "Non",
            ]
        ],
        [
            'colum_name' => 'password_change_required',
            'additional_column_name' => "password_change_required_fr",
            'choices' => [
                1 => "Oui",
                0 => "Non",
            ]
        ],

    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'activated' => 'boolean',
            'password_change_required' => 'boolean',
        ];
    }
}
