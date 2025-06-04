<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'username',
        'email',
        'password',
        'occupation',
        'phone_number',
        'country',
        'city',
        'currency',
        'signal_strength',
        'status',
        'gender',
        'marital_status',
        'address',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
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
        ];
    }


    public function kycVerification()
    {
        return $this->hasOne(KycVerification::class);
    }

    // User.php model

    // User.php

    public function deposit()
    {
        return $this->hasOne(Deposit::class);
    }

    public function earning()
    {
        return $this->hasOne(Earning::class);
    }

    public function withdrawal()
    {
        return $this->hasOne(Withdrawal::class);
    }
}
