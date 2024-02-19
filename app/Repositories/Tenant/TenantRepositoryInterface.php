<?php

namespace App\Repositories\Tenant;

use App\Models\Tenant;

interface TenantRepositoryInterface
{
    /**
     * Get all tenants.
     *
     * @return \Illuminate\Database\Eloquent\Collection|Tenant[]
     */
    public function getAllTenants():Tenant;

    /**
     * Get a tenant by Client.
     *
     * @param int $clientId
     * @return Tenant
     */
    public function getTenantByClient(int $clientId): Tenant;

    /**
     * Get a tenant by ID.
     *
     * @param int $tenantId
     * @return Tenant
     */
    public function getTenantById(int $tenantId): Tenant;
}
