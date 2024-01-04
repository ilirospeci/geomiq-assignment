<?php

namespace Tests\Unit;

use App\Http\Controllers\StringParserController;
use Illuminate\Http\Request;
use Tests\TestCase;

class StringParserControllerTest extends TestCase
{
    public function testParse()
    {
        // Arrange
        $controller = new StringParserController();
        $request = new Request();
        $request->replace(['input_string' => 'elapsed_time=0.0022132396697998047, type-CNC,radius-1-15,position-1=0.000000000000014,position-1//90,position-2=0%direction-1=-2.0816681711721685e-16']);

        // Act
        $response = $controller->parse($request);

        // Assert
        $this->assertEquals(200, $response->getStatusCode());
        $data = json_decode($response->getContent(), true);
        $this->assertArrayHasKey('data', $data);
        $this->assertArrayHasKey('features', $data['data']);
        $this->assertArrayHasKey('feature_count', $data['data']);
    }
}
