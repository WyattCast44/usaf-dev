<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PasswordMinLength implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (strlen($value) >= config('settings.min-password-length')) {
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
        return "Your password must be at least " . config('settings.min-password-length') . " characters long.";
    }
}
