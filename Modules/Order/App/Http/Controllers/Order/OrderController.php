<?php

namespace Modules\Order\App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Order\App\Services\Order\OrderService;

class OrderController extends Controller
{
    private $orderService;

    /**
     * OrderController constructor.
     *
     * @param OrderService $orderService
     */
    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    /**
     * Create a new Order.
     *
     * @param CreateOrderRequest $request
     * @return mixed
     */
    public function createOrder(CreateOrderRequest $request)
    {
        return $this->orderService->create($request->all());
    }

    /**
     * Create a new Order.
     *
     * @param CreateOrderRequest $request
     * @return mixed
     */
    public function findRandomly()
    {
        return $this->orderService->findRandomly();
    }

    /**
     * Find an Order by ID.
     *
     * @return mixed
     */
    public function finById($id)
    {
        return $this->orderService->findById($id);
    }
}
