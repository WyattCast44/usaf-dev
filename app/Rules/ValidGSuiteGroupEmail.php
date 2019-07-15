<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidGSuiteGroupEmail implements Rule
{
    protected $allowedDomains = [
        'usaf.cloud'
    ];

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $domain = substr(strrchr($value, "@"), 1);
        
        if (in_array($domain, $this->allowedDomains)) {
            return true;
        }

        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The email must be a valid email ending in @usaf.cloud';
    }
}
