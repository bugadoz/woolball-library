<?php

use PHPUnit\Framework\TestCase;
use WoolballLibrary\WoolballAPI;

class WoolballLibraryTest extends TestCase
{
    private $api;

    protected function setUp(): void
    {
        $this->api = new WoolballAPI("SUA_API_KEY");
    }

    public function testTextToSpeech(): void
    {
        $response = $this->api->textToSpeech("Olá mundo", "en");
        $this->assertNotEmpty($response, "A resposta para text-to-speech deve conter dados.");
    }

    public function testSpeechToText(): void
    {
        $response = $this->api->speechToText("caminho/para/audio.wav");
        $this->assertNotEmpty($response, "A resposta para speech-to-text deve conter texto.");
    }

    public function testTranslate(): void
    {
        $response = $this->api->translate("Olá mundo", "por_Latn", "eng_Latn");
        $this->assertNotEmpty($response, "A tradução deve retornar texto.");
    }

    public function testSummarize(): void
    {
        $response = $this->api->summarize("Texto longo para ser resumido.");
        $this->assertNotEmpty($response, "O resumo deve retornar texto.");
    }

    public function testClassifyText(): void
    {
        $response = $this->api->classifyText("Qual cidade não está na América do Sul?", ["travel", "question", "doubt"]);
        $this->assertNotEmpty($response, "A classificação deve retornar uma categoria.");
    }

    public function testClassifyImage(): void
    {
        $response = $this->api->classifyImage(["caminho/para/imagem1.png", "caminho/para/imagem2.png"]);
        $this->assertIsArray($response, "A classificação de imagem deve retornar uma lista.");
    }

    public function testAnalyzeEmotions(): void
    {
        $response = $this->api->analyzeEmotions("caminho/para/imagem.png");
        $this->assertNotEmpty($response, "A análise de emoções deve retornar dados.");
    }

    public function testGenerateText(): void
    {
        $response = $this->api->generateText("Texto inicial para completar.");
        $this->assertNotEmpty($response, "A geração de texto deve retornar texto.");
    }

    public function testDescribeImage(): void
    {
        $response = $this->api->describeImage("caminho/para/imagem.png", "Descreva o conteúdo da imagem.");
        $this->assertNotEmpty($response, "A descrição da imagem deve retornar texto.");
    }

    public function testImageZeroShot(): void
    {
        $response = $this->api->imageZeroShot("caminho/para/imagem.png", ["cat", "dog", "tree", "human"]);
        $this->assertNotEmpty($response, "A classificação zero-shot deve retornar dados.");
    }

    public function testCharToImage(): void
    {
        $response = $this->api->charToImage("A");
        $this->assertNotEmpty($response, "A geração de imagem a partir de caracteres deve retornar base64.");
    }
}
