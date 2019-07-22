<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\User;

class UserNameUniqueRule implements Rule
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
        $companyId = null;
        
        if (isset($this->args['company_id'])) {
            $companyId = $this->args['company_id'];
        }

        $user = User::where('company_id', $companyId)->where('name', $value)->count();

        if ($user > 0) {
            return false;
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
        return 'name already exists!';
    }
}
