<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Services\Tenant\TenantService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    protected $tenantService;

    /**
     * Constructor
     *
     * @param TenantService $tenantService
     */
    public function __construct(TenantService $tenantService)
    {
        $this->tenantService = $tenantService;
    }

    /**
     * Get a tenant by Client.
     *
     * @param int $clientId
     * @return JsonResponse
     */
    public function getTenantByClient(int $clientId): JsonResponse
    {
        $tenants=$this->tenantService->getTenantByClient($clientId);
        return response()->json($tenants);
    }
}
