<?php

namespace App\Models;

use Laravel\Passport\Client as Clients;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Order\App\Models\Order;


class Client extends Model
{
    use HasApiTokens,SoftDeletes,HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['tenant_id', 'name',"email","mobile","password"];


    /**
     * Get the Order included in the client.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function order()
    {
        return $this->hasMany(Order::class);
    }

    public function generate_token()
    {
        $client = Clients::where('password_client', true)->first();
        $token = $this->createToken('UserToken', ['*'])->accessToken;
        $this->access_token=$token;
        return $this;
    }
}
