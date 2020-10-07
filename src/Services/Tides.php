<?php

namespace JonLynch\TideTile\Services;

use Illuminate\Support\Facades\Http;

class Tides
{
  public static function getTides(string $stationId, string $apiKey): array
  {
    $endpoint = "https://admiraltyapi.azure-api.net/uktidalapi/api/V1/Stations/{$stationId}/TidalEvents";

    $headers = ["Ocp-Apim-Subscription-Key" => $apiKey];

    $response = Http::withHeaders($headers)
      ->get($endpoint)
      ->json();

    return collect($response)
      ->map(function (array $tide) {
        return [
          'dateTime' => $tide['DateTime'],
          'height' => $tide['Height'],
          'highLow' => $tide['EventType'],
        ];
      })
      ->take(4)
      ->toArray();
  }
}
