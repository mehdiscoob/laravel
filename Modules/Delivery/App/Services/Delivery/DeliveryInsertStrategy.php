<?php

namespace Modules\Delivery\App\Services\Delivery;


use App\Models\Location;
use Modules\Order\App\Models\Order;

interface DeliveryInsertStrategy
{
    /**
     * Deliver to a location.
     *
     * @param int $orderId
     * @return array
     */
    public function deliver(int $orderId): array;
}
