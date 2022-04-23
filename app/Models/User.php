<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'phone',
        'email',
        'password',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function user_role()
    {
        return $this->hasOne(UserRole::class, "user_id", "id");
    }

    public static function find_organization_id():string
    {
        $organisation = UserRole::where([['user_id', Auth::user()->id], ['org_id', '!=', '']])->first();
        return $organisation->org_id;
    }

    public static function is_admin()
    {
        return Auth::user()->user_role->role_id == 1 ? true : false;
    }

    public static function is_student()
    {
        return Auth::user()->user_role->role_id == 3 ? true : false;
    }

    public static function is_organization()
    {
        return Auth::user()->user_role->role_id == 2 ? true : false;
    }
}
