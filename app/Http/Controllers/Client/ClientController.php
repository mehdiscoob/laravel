<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
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
     * Get clients as pagination.
     *
     * @param int $perPage
     * @return JsonResponse
     */
    public function getClientPaginate(Request $request): JsonResponse
    {
        $clients=$this->clientService->getClientPaginate();
        return response()->json($clients);
    }

    /**
     * Get a client by their ID.
     *
     * @param int $clientId
     * @return JsonResponse\|null
     */
    public function getClientById(int $clientId): ?JsonResponse
    {
        $clients=$this->clientService->findById($clientId);
        return response()->json($clients);
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
     * Find a client by Mobile.
     *
     * @param Request $request
     * @return mixed
     */
    public function findByMobile(Request $request): mixed
    {
        $client = $this->clientService->getClientByMobile($request->mobile);
        return $client;
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
