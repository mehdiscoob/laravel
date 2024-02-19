<?php

namespace Modules\Delivery\App\Services\Delivery;


use App\Models\Location;
use Modules\Order\App\Models\Order;

class DeliveryService
{
    /**
     * The strategy for delivering.
     *
     * @var DeliveryInsertStrategy
     */
    protected $deliveryStrategy;

    /**
     * DeliveryService constructor.
     *
     * @param DeliveryInsertStrategy $deliveryStrategy
     */
    public function __construct(DeliveryInsertStrategy $deliveryStrategy)
    {
        $this->deliveryStrategy = $deliveryStrategy;
    }

    /**
     * Deliver to a location using the selected strategy.
     *
     * @param int $locationId
     * @param int $orderId
     * @return array
     */
    public function deliverToLocation(int $orderId,int $locationId): array
    {
        return $this->deliveryStrategy->deliver($orderId,$locationId);
    }
}
