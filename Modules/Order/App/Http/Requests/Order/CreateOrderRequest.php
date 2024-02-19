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
            'tenant_id' => 'required|numeric',
            'client_id_or_user_id' => ['required', new ClientOrUserIdRequired],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(Request $request)
    {
        $roles=["expert","admin"];
        return $this->user()->id === $request->input('client_id') || $this->user()->hasRoleArray($roles);
    }
}
