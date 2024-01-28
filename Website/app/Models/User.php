<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    public function student(): HasOne
    {
        return $this->hasOne(Student::class, 'user_id', 'id');
    }

    public function employee(): HasOne
    {
        return $this->hasOne(Employee::class, 'user_id', 'id');
    }
    public function dentist(): HasOne
    {
        return $this->hasOne(Dentist::class, 'user_id', 'id');
    }
    public function assistant(): HasOne
    {
        return $this->hasOne(Assistant::class, 'user_id', 'id');
    }
    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class, 'user_id', 'id');
    }

    public function notifications()
    {
        return $this->morphMany(DatabaseNotification::class, 'notifiable')
            ->orderBy('created_at', 'desc');
    }

    protected $fillable = [
        'name',
        'user_type',
        'email',
        'email_verified_at',
        'password',
        'made_appointment'
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
        'password' => 'hashed',
    ];
}
