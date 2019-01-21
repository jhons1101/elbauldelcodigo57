<?php

namespace elbauldelcodigo;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use elbauldelcodigo\ParametroGral;
use elbauldelcodigo\Notifications\ResetPasswordNotification;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Me establece la relacion de muchos a muchos con la tabla de RolUsers.
     *
     * @var array
     */
    public function roles () {
        return $this->belongsToMany('elbauldelcodigo\RolUser');
    }

    /**
     * valida si el usuario tiene el rol que le llega por parámetro
     *
     * @var array
     */
    public function hasRole ($rol) {
        
        if ($this->roles()->where('rol_nombre', $rol)->first()){
            return true;
        }
        return false;
    }

    /**
     * valida si el usuario tiene alguno de estos rol.
     * Le puede llegar en el parámetro un array de rol o un rol en especifico
     *
     * @var array
     */
    public function hasAnyRole ($roles) {
        
        if (is_array($roles)){
            foreach($roles as $rol) {
                if ($this->hasRole($rol)){
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)){
                return true;
            }
        }
        return false;
    }

    /**
     * valida si el usuario está autorizado para ejecutar la petición
     *
     * @var array
     */
    public function authorizeRole ($roles) {
        
        if ($this->hasAnyRole($roles)){
            return true;
        }
        return false;
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }
}
