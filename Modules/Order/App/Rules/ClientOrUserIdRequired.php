<?php

namespace Modules\Order\App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ClientOrUserIdRequired implements Rule
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
        return !empty(request()->client_id) || !empty(request()->user_id);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Either client ID or user ID must be filled.';
    }
}
