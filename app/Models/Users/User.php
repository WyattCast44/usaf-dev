<?php

namespace App\Models\Users;

use App\Traits\UuidId;
use App\Rules\AllowedDomain;
use App\Models\Reference\Gender;
use App\Rules\PasswordMinLength;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, Notifiable, UuidID;

    public $incrementing = false;

    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Abilities/Actions/Behavior
     */
    public function isAdmin()
    {
        return ($this->admin == true) ? true : false;
    }

    public function makeAdmin()
    {
        $this->update(['admin' => true]);

        return $this->refresh();
    }

    public function removeAdmin()
    {
        $this->update(['admin' => false]);

        return $this->refresh();
    }

    /**
     * Relations
     */
    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    /**
     * Accessors/Mutators
     */
    public function getDisplayNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    /**
     * Validation
     */
    public static function rules($rule = null, $includeKey = true)
    {
        $rules = [
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['nullable', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'suffix' => ['nullable', 'string', 'max:255'],
            'nickname' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users', new AllowedDomain],
            'date_of_birth' => ['nullable', 'date'],
            'gender_id' => ['nullable', 'exists:genders,id'],
            'avatar' => ['nullable', 'image'],
            'password' => ['required', 'string', 'confirmed', new PasswordMinLength],
        ];

        if ($rule == null) {
            return $rules;
        }

        return ($includeKey) ? [$rule => $rules[$rule]] : $rules[$rule];
    }
}
