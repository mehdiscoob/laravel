<?php

namespace Modules\Delivery\App\Services\Delivery;


use App\Models\Location;
use Modules\Delivery\App\Models\Delivery;
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
     * @param array $data
     * @return array
     */
    public function deliverToLocation(array $data): array
    {
        Delivery::create($data);
        return $this->deliveryStrategy->deliver($data["order_id"]);
    }
}
