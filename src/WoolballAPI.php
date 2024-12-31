<?php

namespace WoolballLibrary;

use Exception;
use CURLFile;

class WoolballAPI
{
    private $apiBaseUrl = "https://api.woolball.xyz";
    private $apiKey;

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    private function sendRequest($endpoint, $method = 'GET', $headers = [], $body = null)
    {
        $url = $this->apiBaseUrl . $endpoint;
        $ch = curl_init($url);

        $defaultHeaders = ["Authorization: Bearer " . $this->apiKey];
        $headers = array_merge($defaultHeaders, $headers);

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        if ($method === 'POST') {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
        }

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            throw new Exception('CURL Error: ' . curl_error($ch));
        }

        curl_close($ch);
        return json_decode($response, true);
    }

    public function textToSpeech($text, $language)
    {
        $endpoint = "/v1/text-to-speech/" . $language . "?text=" . urlencode($text);
        $response = $this->sendRequest($endpoint);
        return base64_decode($response['data']);
    }

    public function speechToText($audioFilePath)
    {
        $endpoint = "/v1/speech-to-text";
        $body = ['audio' => new CURLFile($audioFilePath, 'audio/wav', basename($audioFilePath))];
        $response = $this->sendRequest($endpoint, 'POST', [], $body);
        return $response['data'];
    }

    public function generateText($text)
    {
        $endpoint = "/v1/completions?text=" . urlencode($text);
        $response = $this->sendRequest($endpoint);
        return $response['data'];
    }

    public function translateText($text, $srcLang, $tgtLang)
    {
        $endpoint = "/v1/translation";
        $payload = json_encode(["Text" => $text, "SrcLang" => $srcLang, "TgtLang" => $tgtLang]);
        $headers = ["Content-Type: application/json"];
        $response = $this->sendRequest($endpoint, 'POST', $headers, $payload);
        return $response['data'];
    }

    public function zeroShotClassification($text, $labels)
    {
        $endpoint = "/v1/zero-shot-classification";
        $payload = json_encode(["Text" => $text, "CandidateLabels" => $labels]);
        $headers = ["Content-Type: application/json"];
        $response = $this->sendRequest($endpoint, 'POST', $headers, $payload);
        return $response['data'];
    }

    public function detectFacialEmotions($imagePath)
    {
        $endpoint = "/v1/image-facial-emotions";
        $body = ['image' => new CURLFile($imagePath, 'image/png', basename($imagePath))];
        $response = $this->sendRequest($endpoint, 'POST', [], $body);
        return $response['data'];
    }

    public function analyzeImageContent($imagePath, $prompt)
    {
        $endpoint = "/v1/vision";
        $body = ['image' => new CURLFile($imagePath, 'image/png', basename($imagePath)), 'prompt' => $prompt];
        $response = $this->sendRequest($endpoint, 'POST', [], $body);
        return $response['data'];
    }

    public function classifyImages($imagePaths)
    {
        $endpoint = "/v1/image-classification";
        $body = [];
        foreach ($imagePaths as $imagePath) {
            $body['images[]'] = new CURLFile($imagePath, 'image/png', basename($imagePath));
        }
        $response = $this->sendRequest($endpoint, 'POST', [], $body);
        return $response['data'];
    }

    public function zeroShotImageClassification($imagePath, $labels)
    {
        $endpoint = "/v1/image-zero-shot";
        $body = [
            'image' => new CURLFile($imagePath, 'image/png', basename($imagePath)),
            'labels' => json_encode($labels)
        ];
        $response = $this->sendRequest($endpoint, 'POST', [], $body);
        return $response['data'];
    }

    public function summarizeText($text)
    {
        $endpoint = "/v1/summarization";
        $payload = json_encode(["text" => $text]);
        $headers = ["Content-Type: application/json"];
        $response = $this->sendRequest($endpoint, 'POST', $headers, $payload);
        return $response['data'];
    }

    public function generateCharacterImage($character)
    {
        $endpoint = "/v1/char-to-image?character=" . urlencode($character);
        $response = $this->sendRequest($endpoint);
        return $response['data'];
    }
}
