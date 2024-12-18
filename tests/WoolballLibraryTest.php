<?php
require_once './vendor/autoload.php';// Exemplo de uso
$apiKey = "SUA CHAVE DA API";
$api = new WoolballLibrary\WoolballAPI($apiKey);

try {
    $audioData = $api->textToSpeech("Olá mundo", "en");
    file_put_contents("output.mp3", $audioData);

 $text = $api->speechToText("audio.wav");
   echo "Texto Transcrito: $text\n";

    $generatedText = $api->generateText("Olá mundo");
    echo "Texto Gerado: $generatedText\n";

    $translatedText = $api->translateText("Olá, mundo!", "por_Latn", "eng_Latn");
    echo "Texto Traduzido: $translatedText\n";

    $classification = $api->zeroShotClassification("Which city is not in South America?", ["hungry", "travel", "question", "doubt"]);
    print_r($classification);

    $emotions = $api->detectFacialEmotions("img.png");
    print_r($emotions);

    $summary = $api->summarizeText("Artificial intelligence is intelligence demonstrated by machines.");
    echo "Resumo: $summary\n";
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage() . "\n";
}
