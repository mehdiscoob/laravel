<?php

namespace Modules\Delivery\App\Services\Truck;

use Modules\Delivery\App\Models\Truck;
use Modules\Delivery\App\Services\Delivery\DeliveryInsertStrategy;

class TruckDeliveryStrategy implements DeliveryInsertStrategy
{
    private $deliveryService;

    public function __construct()
    {
    }


    /**
     * Deliver to a location by truck.
     *
     * @param int $location
     * @return array
     */
    public function deliver($orderId, $locationId): array
    {
        Truck::query()->where("is_busy", 0)->update(["is_busy" => 1]);

        $truck = Truck::query()->where("is_busy", 0)->first();

        return ["id" => $truck->id, "location_id" => $locationId, "order_id" => $orderId];
    }
}
