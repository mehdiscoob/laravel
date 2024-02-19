<?php

namespace  Modules\Order\App\Services\Order;

use App\Services\Location\LocationService;
use Modules\Delivery\App\Services\Delivery\DeliveryService;
use Modules\Delivery\App\Services\Truck\TruckDeliveryStrategy;
use Modules\Order\App\Models\Order;
use Modules\Order\App\Repositories\Order\OrderRepositoryInterface;

class OrderService implements OrderServiceInterface
{
    /**
     * @var OrderRepositoryInterface
     */
    protected $orderRepository;

    /**
     * @var LocationService
     */
    protected $locationService;

    /**
     * OrderService constructor.
     *
     * @param OrderRepositoryInterface $orderRepository
     *
     * @param LocationService $locationService The location service instance.
     *
     */
    public function __construct(LocationService $locationService,OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->locationService = $locationService;
    }

    /**
     * Create a new Order with the provided data.
     *
     * @param array $data The data for the new Order.
     *
     * @return Order The created Order instance.
     *
     * @throws \Exception If there is an error while creating the Order.
     */
    public function create(array $data): Order
    {
        $location=null;
        if ($data['location_id'] === null) {
            $location = $this->locationService->create($data['location_data']);
        }else{
            $location= $this->locationService->findById($data['location_id']);
        }

        $deliveryService = new DeliveryService(new TruckDeliveryStrategy());

        $order=$this->orderRepository->create($data);

        $deliveryStatus = $deliveryService->deliverToLocation($order->id,$location->id);

        return $order;
    }

    /**
     * Find an Order by its ID.
     *
     * @param int $id The ID of the Order to find.
     *
     * @return Order|null The found Order instance or null if not found.
     */
    public function findById(int $id): ?Order
    {
        return $this->orderRepository->find($id);
    }

    /**
     * Find an Order by Randomly.
     *
     * @return Order|null
     */
    public function findRandomly(): ?Order
    {
        return $this->orderRepository->findRandomly();
    }


    /**
     * Check if an Order has associated trips.
     *
     * @param int $id The ID of the Order.
     * @return bool True if the Order has trips, false otherwise.
     */
    public function update(int $id, array $data): bool
    {
        return $this->orderRepository->update($id, $data);
    }
}
