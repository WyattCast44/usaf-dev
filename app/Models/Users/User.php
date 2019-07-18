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
use App\Models\Passport\Token;
use App\Models\GSuite\GSuiteAccount;
use Illuminate\Support\Facades\Validator;

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
        'last_login' => 'datetime'
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

    public function linkGSuiteAccount($email)
    {
        if (!$this->gsuite_accounts->pluck('email')->contains($email)) {
            $this->gsuite_accounts()->create([
                'email' => $email,
                'creator_id' => (auth()->check()) ? auth()->user()->id : null,
            ]);
        }

        return $this;
    }

    /**
     * Updates a users primary email address
     * @param $email
     * @return bool
     */
    public function updateEmail($email)
    {
        if ($this->validate('email', $email)) {
            return false;
        }

        return $this->update([
            'email' => $email,
            'email_verified_at' => null
        ]);
    }

    /**
     * Relations
     */
    public function apps()
    {
        return $this->hasMany(Token::class)->where('revoked', false);
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function gsuite_accounts()
    {
        return $this->morphMany(GSuiteAccount::class, 'gsuiteable');
    }

    /**
     * Accessors/Mutators
     */
    public function getDisplayNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = strtolower($value);
    }

    /**
     * Validation
     */
    public function validate($field, $value)
    {
        return (Validator::make([$field => $value], $this->rules($field)))->fails();
    }

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
