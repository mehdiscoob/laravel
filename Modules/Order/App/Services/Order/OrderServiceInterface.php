<?php

namespace  Modules\Order\App\Services\Order;



use Modules\Order\App\Models\Order;

interface OrderServiceInterface
{
    /**
     * Create a new Order with the provided data.
     *
     * @param array $data The data for the new Order.
     *
     * @return Order The created Order instance.
     *
     * @throws \Exception If there is an error while creating the Order.
     */
    public function create(array $data): Order;


    /**
     * Find an Order by its ID.
     *
     * @param int $id The ID of the Order to find.
     *
     * @return Order|null The found Order instance or null if not found.
     */
    public function findById(int $id): ?Order;

    /**
     * Find an Order by Randomly.
     *
     * @return Order|null
     */
    public function findRandomly(): ?Order;


    /**
     * Update an existing Order with new data.
     *
     * @param int $id The ID of the Order to update.
     * @param array $data The updated data for the Order.
     * @return bool True if the update is successful, false otherwise.
     */
    public function update(int $id, array $data): bool;
}
