<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
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
        'firstname',
        'lastname'.
        'image',
        'bio',
        'phone',
        'workshop',
        'city',
        'street',
        'streetnumber',
        'zip',
        'date_of_birth',
        'email',
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


    public function channels() {
        return $this->hasMany(UserChannel::class);
    }

    public function messages(){
        return $this->hasMany(Message::class);
    }
    public function evaluations(){
        return $this->hasMany(ProgressEvaluation::class)->with('scores');
    }

}
