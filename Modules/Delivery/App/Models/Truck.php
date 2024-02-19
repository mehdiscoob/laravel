<?php

namespace Modules\Delivery\App\Models;

use App\Models\Tenant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Delivery\Database\Factories\TruckFactory;

class Truck extends Model
{
    use SoftDeletes,HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['tenant_id', 'registration_number',"is_busy"];


    protected static function newFactory()
    {
        return TruckFactory::new();
    }

    /**
     * Get the Truck associated with the tenant.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

}
