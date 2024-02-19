<?php

namespace App\Services\Location;


use App\Models\Location;
use App\Repositories\Location\LocationRepositoryInterface;

class LocationService implements LocationServiceInterface
{
    /**
     * @var LocationServiceInterface
     */
    protected $locationRepository;

    /**
     * LocationService constructor.
     *
     * @param LocationServiceInterface $locationRepository
     */
    public function __construct(LocationRepositoryInterface  $locationRepository)
    {
        $this->locationRepository = $locationRepository;
    }

    /**
     * Create a new location.
     *
     * @param array $data
     * @return Location
     */
    public function create(array $data): Location
    {
        return $this->locationRepository->create($data);
    }

    /**
     * Find a location by its ID.
     *
     * @param int $locationId
     * @return Location|null
     */
    public function findById(int $locationId): ?Location
    {
        return $this->locationRepository->findById($locationId);
    }

    /**
     * Get locations by client ID.
     *
     * @param int $clientId
     * @return array
     */
    public function getLocationsByClientId(int $clientId): array
    {
        return $this->locationRepository->getLocationsByClientId($clientId);
    }

}
