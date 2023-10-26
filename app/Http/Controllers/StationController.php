<?php

namespace App\Http\Controllers;

use App\Models\Station;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

class StationController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/station",
     *     tags={"station"},
     *     summary="Returns a paginated list of all stations",
     *     description="Returns a paginated list of all stations",
     *     operationId="stations",
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent(
     *             @OA\AdditionalProperties(
     *                 type="integer",
     *                 format="int32"
     *             )
     *         )
     *     ),
     *     security={
     *         {"api_key": {}}
     *     }
     * )
     * @return JsonResponse
     */
    public function stations(Request $request): JsonResponse
    {
        $request->validate([
            'distance' => ['required', 'integer'],
            'latitude' => ['required', 'numeric'],
            'longitude' => ['required', 'numeric'],
            'company_id' => ['nullable', 'integer']
        ]);

        // Getting stations
        $stations = Station::query();

        if ($request->input('company_id')) {
            $stations->where('company_id', $request->input('company_id'));
        }
        $stations = $stations->get();

        $stationsWithinDistance = [];
        foreach ($stations as $station) {
            // Calculating the distance between the given point to each station
            $distance = $this->calculateDistance($request->input('latitude'), $request->input('longitude'), $station->latitude, $station->longitude);
            // Checking if the point is within the given distance
            if ($distance <= $request->input('distance')) {
                $station->distance = $distance;
                // Keeping the station
                $stationsWithinDistance[] = $station;
            }
        }

        // Order the stations by distance
        $orderedStations = collect($stationsWithinDistance)->sortBy('distance')->toArray();

        // Grouping the stations by location and closeness
        $locationOrderedStations = [];
        foreach ($orderedStations as $station) {
            $locationOrderedStations[$station['address']][] = $station;
        }

        return response()->json($locationOrderedStations);
    }

    /**
     * @param float $centerLatitude
     * @param float $centerLongitude
     * @param float $stationLatitude
     * @param float $stationLongitude
     * @return float
     */
    private function calculateDistance(float $centerLatitude, float $centerLongitude, float $stationLatitude, float $stationLongitude): float
    {
        $pi180 = M_PI / 180;
        $latCenter = $centerLatitude * $pi180;
        $lngCenter = $centerLongitude * $pi180;
        $latStation = $stationLatitude * $pi180;
        $lngStation = $stationLongitude * $pi180;
        $dlat = $latStation - $latCenter;
        $dlng = $lngStation - $lngCenter;
        $calcA = sin($dlat / 2) * sin($dlat / 2) + cos($latCenter) * cos($latStation) * sin($dlng / 2) * sin($dlng / 2);
        $calcB = 2 * atan2(sqrt($calcA), sqrt(1 - $calcA));
        return 6371.0088 * $calcB; // Earth mean radius 6371.0088 KM https://en.wikipedia.org/wiki/Earth_radius
    }

    /**
     * @OA\Get(
     *     path="/api/station",
     *     tags={"station"},
     *     summary="Returns a paginated list of all stations",
     *     description="Returns a paginated list of all stations",
     *     operationId="stations",
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent(
     *             @OA\AdditionalProperties(
     *                 type="integer",
     *                 format="int32"
     *             )
     *         )
     *     ),
     *     security={
     *         {"api_key": {}}
     *     }
     * )
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json(Station::paginate(15));
    }

    /**
     * @OA\Get(
     *     path="/api/station",
     *     tags={"station"},
     *     summary="Returns a paginated list of all stations",
     *     description="Returns a paginated list of all stations",
     *     operationId="stations",
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent(
     *             @OA\AdditionalProperties(
     *                 type="integer",
     *                 format="int32"
     *             )
     *         )
     *     ),
     *     security={
     *         {"api_key": {}}
     *     }
     * )
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'company_id' => ['required', 'integer', 'exists:App\Models\Company,id'],
            'name' => ['required', 'max:200'],
            'latitude' => ['required', 'numeric'],
            'longitude' => ['required', 'numeric'],
            'address' => ['required', 'max:350'],
        ]);

        $createdStation = Station::create([
            'company_id' => $request->input('company_id'),
            'name' => $request->input('name'),
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
            'address' => $request->input('address'),
        ]);

        return response()->json($createdStation);
    }

    /**
     * Display the specified resource.
     */
    public function show(Station $station): JsonResponse
    {
        if (!$station->id) {
            response()->abort(404);
        }
        return response()->json($station);
    }

    /**
     * Update the whole specified resource in storage.
     */
    public function put(Request $request, Station $station): JsonResponse
    {
        if (!$station->id) {
            response()->abort(404);
        }

        $request->validate([
            'company_id' => ['required', 'integer', 'exists:App\Models\Company,id'],
            'name' => ['required', 'max:200'],
            'latitude' => ['required', 'numeric'],
            'longitude' => ['required', 'numeric'],
            'address' => ['required', 'max:350'],
        ]);

        $updatedStation = $station->update([
            'company_id' => $request->input('company_id'),
            'name' => $request->input('name'),
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
            'address' => $request->input('address'),
        ]);

        return response()->json($updatedStation);
    }

    /**
     * Update the only specified resource's data in storage.
     */
    public function patch(Request $request, Station $station): JsonResponse
    {
        if (!$station->id) {
            response()->abort(404);
        }

        $validated = $request->validate([
            'company_id' => ['nullable', 'integer', 'exists:App\Models\Company,id'],
            'name' => ['nullable', 'max:200'],
            'latitude' => ['nullable', 'numeric'],
            'longitude' => ['nullable', 'numeric'],
            'address' => ['nullable', 'max:350'],
        ]);

        $updatedStation = $station->update($validated);

        return response()->json($updatedStation);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Station $station): JsonResponse
    {
        if (!$station->id) {
            response()->abort(404);
        }
        try {
            $station->delete();
            return response()->json(true);
        } catch (\Throwable $e) {
            return response()->json(false);
        }
    }
}
