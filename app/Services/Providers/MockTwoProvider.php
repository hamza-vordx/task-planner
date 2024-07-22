<?php

namespace App\Services\Providers;

use App\Services\RandomTaskGenerator;
use Illuminate\Support\Facades\Http;


class MockTwoProvider implements ProviderInterface {

    public function fetchTasks()
    {
        $response = Http::get('http://127.0.0.1:8000/api/mock-two');
        if ($response->successful()) {
            $taskDetails = [];
            $mockOneData = $response->json();
            foreach ($mockOneData as $item) {
                $taskDetails[] = [
                    'name' => null,
                    'difficulty' => $item['zorluk'],
                    'duration' => $item['sure'],
                    'provider' => 'mock-two',
                ];
            }

            return $taskDetails;
        }
    }
}
