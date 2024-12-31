<?php

namespace WoolballLibrary\Tests;

use PHPUnit\Framework\TestCase;
use WoolballLibrary\WoolballAPI;

class WoolballLibraryTest extends TestCase
{
    public WoolballAPI $api;

    public function setUp(): void
    {
        parent::setUp();

        $apiKey = getenv('WOOLBALL_API_KEY');
        $this->api = new WoolballAPI($apiKey);
    }

    public function testTextToSpeech(): void
    {
        $text = "Hello world";
        $audio = $this->api->textToSpeech($text, "en");

        file_put_contents(__DIR__ . "/out/output.mp3", $audio);
        $this->assertNotEmpty($audio);
    }

    public function testSpeechToText(): void
    {
        $audioPath = __DIR__ . "/in/hello-world-en.mp3";

        $text = $this->api->speechToText($audioPath);

        $this->assertNotEmpty($text);
        $this->assertIsString($text);
        $this->assertStringContainsString("world", strtolower($text));
    }

    public function testGenerateText(): void
    {

        $text = "A quick brown fox jumps over the lazy dog.";
        $generatedText = $this->api->generateText($text);

        $this->assertNotEmpty($generatedText);
        $this->assertIsString($generatedText);
        $this->assertGreaterThan(strlen($text), strlen($generatedText));
    }

    public function testTranslateText(): void
    {
        $translatedText = $this->api->translateText("Olá, mundo!", "por_Latn", "eng_Latn");
        $this->assertEquals("Hey, world!", $translatedText);
    }

    public function testZeroShotClassification(): void
    {
        $this->markTestIncomplete('ZeroShotClassification return an null.');

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

    public function testDetectFacialEmotions(): void
    {
        $this->markTestIncomplete('DetectFacialEmotions not implemented.');
    }

    public function testAnalyzeImageContent(): void
    {
        $this->markTestIncomplete('AnalyzeImageContent not implemented.');
    }

    public function testClassifyImages(): void
    {
        $this->markTestIncomplete('ClassifyImages not implemented.');
    }

    public function testZeroShotImageClassification(): void
    {
        $this->markTestIncomplete('ZeroShotImageClassification not implemented.');
    }

    public function testSummarizeText(): void
    {
        $text = "A quick brown fox jumps over the lazy dog.";

        $summary = $this->api->summarizeText($text);

        $this->assertNotEmpty($summary);
        $this->assertIsString($summary);
        $this->assertGreaterThan(strlen($text), strlen($summary));
    }

    public function testGenerateCharacterImage(): void
    {
        $this->markTestIncomplete('GenerateCharacterImage not implemented.');
    }
}
