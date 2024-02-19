<?php

namespace App\Repositories\Location;

use App\Models\Location;


class LocationRepository implements LocationRepositoryInterface
{
    /**
     * Create a new location.
     *
     * @param array $data
     * @return Location
     */
    public function create(array $data): Location
    {
        return Location::create($data);
    }


    /**
     * Get locations by client ID.
     *
     * @param int $clientId
     * @return array
     */
    public function getLocationsByClientId(int $clientId): array
    {
        return Location::where('client_id', $clientId)->get()->toArray();
    }

    /**
     * Find a location by its ID.
     *
     * @param int $locationId
     * @return Location|null
     */
    public function findById(int $locationId): ?Location
    {
        return Location::find($locationId);
    }

}
