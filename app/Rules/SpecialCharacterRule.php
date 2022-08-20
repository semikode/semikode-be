<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class SpecialCharacterRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return !preg_match("/[^a-z0-9 ]/i", $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
		return 'the :attribute not allowed special characther';
    }
}
