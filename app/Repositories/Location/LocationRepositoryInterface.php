<?php

namespace App\Repositories\Location;

use App\Models\Location;

interface LocationRepositoryInterface
{
    /**
     * Create a new location.
     *
     * @param array $data
     * @return Location
     */
    public function create(array $data): Location;


    /**
     * Find a location by its ID.
     *
     * @param int $locationId
     * @return Location|null
     */
    public function findById(int $locationId): ?Location;

    /**
     * Get locations by client ID.
     *
     * @param int $clientId
     * @return array
     */
    public function getLocationsByClientId(int $clientId): array;
}
