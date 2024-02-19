<?php

namespace Modules\Order\App\Models;

use App\Models\Client;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Delivery\App\Models\Delivery;
use Modules\Order\Database\Factories\OrderFactory;

class Order extends Model
{
    use SoftDeletes,HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['tenant_id', 'client_id','user_id', 'amount'];


    protected static function newFactory()
    {
        return OrderFactory::new();
    }


    /**
     * Get the Order associated with the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the Order associated with the client.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * Get the Order associated with the delivery.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function delivery()
    {
        return $this->belongsTo(Delivery::class);
    }


    /**
     * Get the Order associated with the tenant.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }


}
