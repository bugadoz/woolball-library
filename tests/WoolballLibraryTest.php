<?php

namespace WoolballLibrary\Tests;

use WoolballLibrary\WoolballAPI;

class WoolballLibraryTest extends \PHPUnit\Framework\TestCase 
{

    public WoolballAPI $api;

    public function setUp(): void
    {
        parent::setUp();

        $apiKey = "SUA CHAVE DA API";
        $this->api = new WoolballAPI($apiKey);
    }

    public function testTranslateText()
    {

        $translatedText = $this->api->translateText("Olá, mundo!", "por_Latn", "eng_Latn");
        $this->assertEquals("Hey, world!", $translatedText);
    }

    public function testZeroShotClassification()
    {

        $classification = $this->api->zeroShotClassification("Which city is not in South America?", ["hungry", "travel", "question", "doubt"]);

        $classificationExpected = [ 
            'Labels' => [ 
                0 => 'hungry', 
                1 => 'travel',
                2 => 'question',
                3 => 'doubt'
            ], 
            'Scores' => [
                0 => 0.2592324849002,
                1 => 0.24692250503327,
                2 => 0.24692250503327,
                3 => 0.24692250503327
            ]
        ];
        
        $this->assertIsArray($classification);
        $this->assertArrayHasKey('Labels', $classification);
        $this->assertArrayHasKey('Scores', $classification);

        $this->assertEquals($classificationExpected, $classification);
    }
}
