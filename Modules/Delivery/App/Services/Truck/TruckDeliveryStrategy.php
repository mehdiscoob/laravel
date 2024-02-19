<?php

namespace Modules\Delivery\App\Services\Truck;

use Modules\Delivery\App\Models\Truck;
use Modules\Delivery\App\Services\Delivery\DeliveryInsertStrategy;

class TruckDeliveryStrategy implements DeliveryInsertStrategy
{


    /**
     * Deliver to a location by truck.
     *
     * @param int $orderId
     * @return array
     */
    public function deliver($orderId): array
    {
        $truck = Truck::query()->where("is_busy", 0)->first();
        $truck->is_busy=1;
        $truck->save();
        return ["id" => $truck->id, "order_id" => $orderId];
    }
}
