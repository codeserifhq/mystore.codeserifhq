<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class SuperAdminCompanyIdRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    private $args;
    public function __construct($args)
    {
        $this->args = $args;
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
        $user = auth()->guard('api')->user();

        if ($user) {
            if (!$user->company_id && !isset($this->args['company_id'])) {
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
        return 'company id field is required.';
    }
}
