<?php

namespace Modules\Order\App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Modules\Order\App\Rules\ClientOrUserIdRequired;

class CreateOrderRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules()
    {
        return [
            'client_id' => 'nullable',
            'user_id' => 'nullable',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(Request $request)
    {
        return true;
        $roles=["expert","admin"];
        return $this->user()!=null && $this->user()->id === $request->input('client_id') || $this->user()->hasRoleArray($roles);
    }
}
