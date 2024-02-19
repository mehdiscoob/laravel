<?php

namespace Modules\Delivery\App\Models;

use App\Models\Tenant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Delivery\Database\Factories\DeliveryFactory;
use Modules\Order\App\Models\Order;

class Delivery extends Model
{
    use SoftDeletes,HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['tenant_id', 'order_id', 'truck_id', 'delivery_date'];


    protected static function newFactory()
    {
        return DeliveryFactory::new();
    }

    /**
     * Get the Delivery associated with the order.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }


    /**
     * Get the Delivery associated with the tenant.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }


    /**
     * Get the Delivery associated with the truck.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function truck()
    {
        return $this->belongsTo(Truck::class);
    }


}
