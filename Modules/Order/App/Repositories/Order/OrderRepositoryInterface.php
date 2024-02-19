<?php

namespace  Modules\Order\App\Repositories\Order;


use Illuminate\Contracts\Pagination\Paginator;
use Modules\Order\App\Models\Order;

interface OrderRepositoryInterface
{
    /**
     * Get all orders.
     *
     * @return \Illuminate\Database\Eloquent\Collection|Order[]
     */
    public function all();

    /**
     * Get orders as pagination.
     *
     * @param array $data
     * @return Paginator
     */
    public function getOrderPaginate(?array $data): Paginator;

    /**
     * Find an Order by ID.
     *
     * @param int $id
     * @return Order|null
     */
    public function find(int $id);

    /**
     * Find an Order by Randomly.
     *
     * @return Order|null
     */
    public function findRandomly();

    /**
     * Create a new Order.
     *
     * @param array $data
     * @return Order
     */
    public function create(array $data);

    /**
     * Update an Order by ID.
     *
     * @param int $id
     * @param array $data
     * @return Order|null
     */
    public function update(int $id, array $data);


    /**
     * Delete an Order by ID.
     *
     * @param int $id
     * @return bool
     */
    public function delete(int $id);
}
