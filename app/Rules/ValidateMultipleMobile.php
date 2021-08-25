<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidateMultipleMobile implements Rule
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
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $mobiles = str_replace("+", "", $value);
        $mobiles = explode(',', $mobiles);

        foreach ($mobiles as $mobile) {
            $mobile = trim($mobile);

            if (!is_numeric($mobile) || !(strlen($mobile) > 10 && strlen($mobile) < 16)) {
                return false;
            }
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Mobile Number/s is not well formed';
    }
}
