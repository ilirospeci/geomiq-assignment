<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ParseStringCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parse:string {input}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse the string and display the result';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $input = $this->argument('input');

        // Your existing parsing logic
        $parsedData = $this->parseString($input);

        // Display the parsed data or perform any other desired actions
        $this->info(json_encode(['data' => $parsedData]));
    }

    private function parseString($input)
    {
        // Replace inconsistent delimiters with a single type of delimiter
        $input = str_replace(['-', '//', '%'], '=', $input);

        // Split the string by commas
        $parts = explode(',', $input);

        $data = [
            'features' => [],
            'feature_count' => 0,
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
                $id = (strpos($key, '-') !== false) ? explode('-', $key)[1] : 'default';

                // Find the feature with the given ID, or create a new one if it doesn't exist
                $feature = collect($data['features'])->firstWhere('id', $id);
                if (!$feature) {
                    $feature = ['id' => $id];
                    $data['features'][] = &$feature;
                }

                if (strpos($key, 'radius') !== false) {
                    $feature['radius'] = intval($value);
                } elseif (strpos($key, 'direction') !== false) {
                    $feature['direction'] = floatval($value);
                } elseif (strpos($key, 'position') !== false) {
                    $feature['position'][] = intval($value);
                }
            }
        }

        // Count the number of features
        $data['feature_count'] = count($data['features']);

        // Convert the data array to a JSON string
        $json = json_encode(['data' => $data]);

        // Return the JSON string as the response
        return response($json);
    }
}
