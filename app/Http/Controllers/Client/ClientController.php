<?php

namespace App\Http\Controllers;

use App\Services\Client\ClientService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * @var ClientService
     */
    protected $clientService;

    /**
     * ClientController constructor.
     *
     * @param ClientService $clientService
     */
    public function __construct(ClientService $clientService)
    {
        $this->clientService = $clientService;
    }

    /**
     * Find a client randomly based on the specified role.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function findRandomly(Request $request): JsonResponse
    {
        $client = $this->clientService->findRandomly($request->role);

        if ($client) {
            return response()->json($client, 200);
        }

        return response()->json(['message' => 'Client not found'], 404);
    }

    /**
     * Find a client by ID.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function findById(int $id): JsonResponse
    {
        $client = $this->clientService->findById($id);

        if ($client) {
            return response()->json($client, 200);
        }

        return response()->json(['message' => 'Client not found'], 404);
    }

    /**
     * Create a client by information.
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function register(Request $request): JsonResponse
    {
        return response()->json($this->clientService->createClient($request->all()), 200);
    }
}
