<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'phone',
        'image',
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

    // cek apakah super admin
    public function isSuperAdmin() {
        return $this->hasRole('super-admin');
    
    }
    // ambil role user
    public function getRole() {
        return $this->getRoleNames()->first();
    }

    // merubah value attribute image
    public function getImageAttribute($value) {
        return $value ? Storage::url($value) : null;
    }

    // mengambil inisial user
    public function getInitial() {
        $name_split = explode(' ', $this->name);
        $first_name_split = str_split($name_split[0]);

        if (count($name_split) >= 2) {
            $second_name_split = str_split($name_split[1]);
            $initial = strtoupper($first_name_split[0]) . strtoupper($second_name_split[0]);

        } else {
            $initial = strtoupper($first_name_split[0]);
        }

        return $initial;
    }

    // mengambil 2 nama awal user
    public function getUsername() {
        $name_split = explode(' ', $this->name);

        if (count($name_split) >= 2) {
            $username = $name_split[0] . ' ' . $name_split[1];
        } else {
            $username = $name_split[0];
        }

        return $username;
    }
}
