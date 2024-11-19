<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * Tabla asociada al modelo.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * Clave primaria personalizada.
     *
     * @var string
     */
    protected $primaryKey = 'id_user';

    /**
     * Atributos asignables en masa.
     *
     * @var array
     */
    protected $fillable = [
        'nom',
        'ap',
        'am',
        'correo',
        'password',
        'id_tipo',
    ];

    /**
     * Atributos ocultos para arreglos JSON.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Atributos que deben ser convertidos a tipos nativos.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relación con otro modelo (por ejemplo, tipo de usuario).
     */
    public function tipo()
    {
        return $this->belongsTo(Tipo::class, 'id_tipo', 'id'); // Ajusta según el nombre del modelo relacionado
    }
}
