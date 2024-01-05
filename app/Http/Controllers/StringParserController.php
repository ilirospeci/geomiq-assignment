<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StringParserController extends Controller
{
    public function parse(Request $request)
    {
        $input = $request->input('input_string');

        // Replace inconsistent delimiters with a single type of delimiter
        $input = str_replace(['//', '%'], '=', $input);

        // Split the string by commas
        $parts = explode(',', $input);

        $data = [
            'features' => [],
        ];

        foreach ($parts as $part) {
            // Split each part by the equals sign
            $subparts = explode('=', $part);

            // The key is everything before the equals sign
            $key = trim($subparts[0]);

            // The value is everything after the equals sign
            $value = isset($subparts[1]) ? trim($subparts[1]) : null;

            // Handle the different keys
            if (strpos($key, 'elapsed_time') !== false) {
                $data['elapsed_time'] = round(floatval($value), 6);
            } elseif (strpos($key, 'type') !== false) {
                $data['type'] = strtolower($value);
            } elseif (strpos($key, 'radius') !== false || strpos($key, 'direction') !== false || strpos($key, 'position') !== false) {
                // Extract the id from the key
                $id = (strpos($key, '-') !== false) ? explode('-', $key)[1] : 'default';

                // Find the feature with the given ID, or create a new one if it doesn't exist
                if (!isset($data['features'][$id])) {
                    $data['features'][$id] = ['id' => $id];
                }

                if (strpos($key, 'radius') !== false) {
                    $data['features'][$id]['radius'] = intval($value);
                } elseif (strpos($key, 'direction') !== false) {
                    $data['features'][$id]['direction'] = floatval($value);
                } elseif (strpos($key, 'position') !== false) {
                    $data['features'][$id]['position'][] = intval($value);
                }
            }
        }

        // Re-index the features array to be 0-indexed
        $data['features'] = array_values($data['features']);

        // Count the number of features
        $data['feature_count'] = count($data['features']);

        // Convert the data array to a JSON string
        $json = json_encode(['data' => $data]);

        // Return the JSON string as the response
        return response($json);
    }
}
