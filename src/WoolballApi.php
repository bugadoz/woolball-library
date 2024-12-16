<?php

class WoolballAPI
{
    private $apiBaseUrl;
    private $apiKey;

    public function __construct($apiKey)
    {
        $this->apiBaseUrl = "https://api.woolball.xyz";
        $this->apiKey = $apiKey;
    }

    private function makeRequest($endpoint, $method, $data = null, $headers = [])
    {
        $curl = curl_init();
        $url = $this->apiBaseUrl . $endpoint;

        $defaultHeaders = [
            'Authorization: Bearer ' . $this->apiKey,
            'Content-Type: application/json'
        ];

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        if ($data) {
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
        }

        curl_setopt($curl, CURLOPT_HTTPHEADER, array_merge($defaultHeaders, $headers));

        $response = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        return ["status" => $httpCode, "response" => json_decode($response, true)];
    }

    public function textToSpeech($text, $targetLanguage)
    {
        $payload = ["Text" => $text, "Lang" => $targetLanguage];
        return $this->makeRequest("/v1/text-to-speech", "POST", $payload);
    }

    public function speechToText($audioFilePath, $srcLang)
    {
        $postFields = ["audio" => new CURLFile($audioFilePath), "SrcLang" => $srcLang];
        return $this->makeRequest("/v1/speech-to-text", "POST", null, $postFields);
    }

    public function translateText($text, $srcLang, $tgtLang)
    {
        $payload = ["Text" => $text, "SrcLang" => $srcLang, "TgtLang" => $tgtLang];
        return $this->makeRequest("/v1/translate", "POST", $payload);
    }

    public function zeroShotClassification($text, $candidateLabels)
    {
        $payload = ["Text" => $text, "CandidateLabels" => $candidateLabels];
        return $this->makeRequest("/v1/zero-shot-classification", "POST", $payload);
    }

    public function detectFacialEmotions($imagePath)
    {
        $postFields = ["image" => new CURLFile($imagePath)];
        return $this->makeRequest("/v1/detect-facial-emotions", "POST", null, $postFields);
    }

    public function analyzeImageContent($imagePath, $prompt)
    {
        $postFields = ["image" => new CURLFile($imagePath), "prompt" => $prompt];
        return $this->makeRequest("/v1/image-to-text", "POST", null, $postFields);
    }

    public function imageClassification($imagePaths)
    {
        $postFields = ["images[]" => array_map(fn($path) => new CURLFile($path), $imagePaths)];
        return $this->makeRequest("/v1/image-classification", "POST", null, $postFields);
    }

    public function imageZeroShotClassification($imagePath, $labels)
    {
        $postFields = ["image" => new CURLFile($imagePath), "labels" => json_encode($labels)];
        return $this->makeRequest("/v1/image-zero-shot-classification", "POST", null, $postFields);
    }

    public function summarizeText($text)
    {
        $payload = ["text" => $text];
        return $this->makeRequest("/v1/summarize", "POST", $payload);
    }

    public function generateCharacterImage($character)
    {
        return $this->makeRequest("/v1/char-to-image?character=" . urlencode($character), "GET");
    }
}

// Exemplo de uso:
$apiKey = "sua_chave_api_aqui";
$woolball = new WoolballAPI($apiKey);

// Converter texto para fala
$response = $woolball->textToSpeech("Olá mundo", "pt");
print_r($response);

?>
