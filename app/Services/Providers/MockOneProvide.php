<?php

namespace App\Services\Providers;

use App\Services\RandomTaskGenerator;
use Illuminate\Support\Facades\Http;

class MockOneProvide implements ProviderInterface {


    public function fetchTasks()
    {

        $response = Http::get('http://127.0.0.1:8000/api/mock-one');
        if ($response->successful()) {
            $taskDetails = [];
            $mockOneData = $response->json();
            foreach ($mockOneData as $item) {
                $taskDetails[] = [
                    'name' => null,
                    'difficulty' => $item['value'],
                    'duration' => $item['estimated_duration'],
                    'provider' => 'mock-one',
                ];
            }

            return $taskDetails;
        }
    }
}
