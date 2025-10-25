<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'number',
        'email_verified_at',
        'remember_token',
        'password_reset_otp',
        'password_reset_expires_at',
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
            'password_reset_expires_at' => 'datetime',
        ];
    }

    /**
     * Set the password attribute (mutator)
     */
    public function setPasswordAttribute($value)
    {
        // Hash the password if it's not empty and not already hashed
        if (!empty($value) && !str_starts_with($value, '$2y$')) {
            $this->attributes['password'] = bcrypt($value);
        } else {
            $this->attributes['password'] = $value;
        }
    }

    /**
     * Check if user is admin
     */
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    /**
     * Check if user is staff
     */
    public function isStaff(): bool
    {
        return $this->role === 'staff';
    }

    /**
     * Generate password reset OTP
     */
    public function generatePasswordResetOTP(): string
    {
        $otp = str_pad(random_int(100000, 999999), 6, '0', STR_PAD_LEFT);

        $this->update([
            'password_reset_otp' => $otp,
            'password_reset_expires_at' => now()->addMinutes(10) // OTP expires in 10 minutes
        ]);

        return $otp;
    }

    /**
     * Verify password reset OTP
     */
    public function verifyPasswordResetOTP(string $otp): bool
    {
        return $this->password_reset_otp === $otp &&
               $this->password_reset_expires_at &&
               $this->password_reset_expires_at->isFuture();
    }

    /**
     * Clear password reset OTP
     */
    public function clearPasswordResetOTP(): void
    {
        $this->update([
            'password_reset_otp' => null,
            'password_reset_expires_at' => null
        ]);
    }

    /**
     * Check if password reset OTP is expired
     */
    public function isPasswordResetOTPExpired(): bool
    {
        return !$this->password_reset_expires_at || $this->password_reset_expires_at->isPast();
    }
}
