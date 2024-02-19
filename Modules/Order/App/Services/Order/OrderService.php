<?php

namespace Modules\Order\App\Services\Order;

use App\Repositories\Tenant\TenantRepositoryInterface;
use App\Services\Location\LocationService;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
     * @var TenantRepositoryInterface
     */
    protected $tenantRepository;

    /**
     * @var LocationService
     */
    protected $locationService;

    /**
     * OrderService constructor.
     *
     * @param OrderRepositoryInterface $orderRepository
     *
     * @param TenantRepositoryInterface $tenantRepository
     *
     * @param LocationService $locationService The location service instance.
     *
     */
    public function __construct(LocationService $locationService, OrderRepositoryInterface $orderRepository, TenantRepositoryInterface $tenantRepository)
    {
        $this->tenantRepository = $tenantRepository;
        $this->orderRepository = $orderRepository;
        $this->locationService = $locationService;
    }


    /**
     * Get orders as pagination.
     *
     * @param array $data
     * @return Paginator
     */
    public function getOrderPaginate(?array $data): Paginator
    {
        if (!isset($data['perPage'])) {
            $data['perPage'] = 20;
        }
        return $this->orderRepository->getOrderPaginate($data);
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
        $tenant = $this->tenantRepository->getTenantByClient($data["client_id"]);
        DB::beginTransaction();
        try {
            if ($data["type"]=="user"){
                $data["user_id"]=Auth::id();
            }
            $location = $this->locationService->create(["address" => $data['address'], "tenant_id" => $tenant->id, "client_id" => $data['client_id']]);
            $data["tenant_id"] = $tenant->id;
            $deliveryService = new DeliveryService(new TruckDeliveryStrategy());
            $order = $this->orderRepository->create($data);
            $truckService = (new TruckDeliveryStrategy())->deliver($order->id);
            $deliveryStatus = $deliveryService->deliverToLocation(["tenant_id"=>$tenant->id,"order_id"=>$order->id,"truck_id"=>$truckService["id"],"delivery_date"=>date("Y-m-d",strtotime("+2 days"))]);
            DB::commit();
            return $order;
        } catch (\Exception $exception) {
            DB::rollBack();
            return throw $exception;
        }
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
