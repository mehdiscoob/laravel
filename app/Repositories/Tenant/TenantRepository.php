<?php

namespace App\Repositories\Tenant;

use App\Models\Tenant;

class TenantRepository implements TenantRepositoryInterface
{
    /**
     * Get all tenants.
     *
     * @return Tenant
     */
    public function getAllTenants():Tenant
    {
        return Tenant::all();
    }


    /**
     * Get a tenant by Client.
     *
     * @param int $clientId
     * @return Tenant
     */
    public function getTenantByClient(int $clientId): Tenant
    {
        $tenant= Tenant::query()
            ->select(["tenants.*","clients.id as client_id"])
            ->leftJoin("clients","clients.tenant_id","=","tenants.id")
            ->where("clients.id",$clientId)->first();
        return $tenant;
    }

    /**
     * Get a tenant by ID.
     *
     * @param int $tenantId
     * @return Tenant
     */
    public function getTenantById(int $tenantId): Tenant
    {
        return Tenant::findOrFail($tenantId);
    }
}
