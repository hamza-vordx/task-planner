<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DataController extends Controller
{

    public function mockOne()
    {
        $filePath = public_path('mock-one');
        // Check if the file exists
        if (!File::exists($filePath)) {
            return response()->json(['error' => 'File not found.'], 404);
        }

        // Get the file contents
        $fileContents = File::get($filePath);

        // Decode the JSON string
        $jsonArray = json_decode($fileContents, true);

        // Check if JSON parsing succeeded
        if (json_last_error() !== JSON_ERROR_NONE) {
            return response()->json(['error' => 'Invalid JSON format.'], 400);
        }

        // Return the JSON data as a response
        return response()->json($jsonArray);
    }
    public function mockTwo()
    {
        $filePath = public_path('mock-two');
        // Check if the file exists
        if (!File::exists($filePath)) {
            return response()->json(['error' => 'File not found.'], 404);
        }

        // Get the file contents
        $fileContents = File::get($filePath);

        // Decode the JSON string
        $jsonArray = json_decode($fileContents, true);

        // Check if JSON parsing succeeded
        if (json_last_error() !== JSON_ERROR_NONE) {
            return response()->json(['error' => 'Invalid JSON format.'], 400);
        }

        // Return the JSON data as a response
        return response()->json($jsonArray);
    }
}
