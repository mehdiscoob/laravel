<?php

namespace Modules\Order\App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\Order\App\Http\Requests\Order\CreateOrderRequest;
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
     * Get orders as pagination.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function getOrderPaginate(Request $request):JsonResponse
    {
        $orders= $this->orderService->getOrderPaginate($request->all());

        return response()->json($orders);
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
