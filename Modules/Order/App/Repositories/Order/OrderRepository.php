<?php

namespace Modules\Order\App\Repositories\Order;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Modules\Order\App\Models\Order;

/**
 * Class OrderRepository
 *
 * @package App\Repositories
 */
class OrderRepository implements OrderRepositoryInterface
{
    /**
     * Get all orders with associated products, Order details, vendors, and drivers for pagination.
     *
     * @return \Illuminate\Pagination\Paginator
     */
    public function all(int $per_page = 50)
    {
        return Order::with(["client", "user", "tenant"])->paginate($per_page);
    }


    /**
     * Get orders as pagination.
     *
     * @param array $data
     * @return Paginator
     */
    public function getOrderPaginate(?array $data): Paginator
    {
        $orders = Order::query()
            ->select(["amount", "users.name as userName", "tenants.name as tenantUser","clients.name as clientName", DB::raw("DATE_FORMAT(orders.created_at, '%Y-%m-%d') AS created")])
            ->leftJoin('clients', 'orders.client_id', '=', 'clients.id')
            ->leftJoin('users', 'orders.user_id', '=', 'users.id')
            ->leftJoin('tenants', 'orders.tenant_id', '=', 'tenants.id');
        if (isset($data["keyword"])) {
            $orders->where(function ($q) use ($data) {
                $q->where("id", $data['keyword'])
                    ->orWhere("amount", "like", "%" . $data['keyword'] . "%")
                    ->orWhere("users.name", "like", "%" . $data['keyword'] . "%")
                    ->orWhere("tenants.name", "like", "%" . $data['keyword'] . "%");
            });
        }
        if (isset($data["orderBy"])) {
            $orders = $orders->orderBy($data["orderByColumn"], $data["orderBy"]);
        }
        return $orders->paginate($data['perPage']);
    }


    /**
     * Find an Order by ID.
     *
     * @param int $id
     * @return Order|null
     */
    public function find(int $id)
    {
        return Order::with(["Delivery"])->find($id);
    }

    /**
     * Find an Order by Randomly.
     *
     * @return Order|null
     */
    public function findRandomly()
    {
        return Order::with(["Delivery"])->inRandomOrder()->first();
    }

    /**
     * Create a new Order.
     *
     * @param array $data
     * @return Order
     */
    public function create(array $data)
    {
        return Order::create($data);
    }

    /**
     * Update an Order by ID.
     *
     * @param int $id
     * @param array $data
     * @return bool Returns true if the Order has been processed successfully, false otherwise.
     */
    public function update(int $id, array $data)
    {
        $order = Order::where("id", $id)->update($data);
        if ($order) {
            return true;
        }
        return false;
    }


    /**
     * Delete an Order by ID.
     *
     * @param int $id
     * @return bool
     */
    public function delete(int $id)
    {
        $order = Order::where("id", $id)->delete();
        if ($order) {
            return true;
        }
        return false;
    }
}
