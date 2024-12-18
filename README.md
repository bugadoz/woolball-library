# WoolballAPI Library

A biblioteca `WoolballAPI` permite a integração com a API Woolball para realizar diversas tarefas, como conversão de texto em fala, transcrição de áudio, classificação de texto, tradução, detecção de emoções em imagens, análise de visão computacional, e muito mais. Este README explica como instalar, configurar e usar cada método disponível na biblioteca.

---

## Instalação

### Via Composer

Execute o seguinte comando no terminal para instalar a biblioteca usando o Composer:

```bash
composer require bugadoz/woolball-library
```

Depois de instalar, inclua o autoloader no seu projeto:

```php
require_once 'vendor/autoload.php';
```

### Manualmente

1. Baixe o arquivo PHP contendo a classe `WoolballAPI`.
2. Inclua a classe no seu projeto:

```php
require_once 'WoolballAPI.php';
```

---

## Configuração

Antes de usar a biblioteca, você precisa configurar a chave de API:
https://woolball.xyz/

```php
$apiKey = 'SUA_API_KEY';
$woolball = new WoolballAPI($apiKey);
```

---

## Funções Disponíveis

A biblioteca fornece as seguintes funções:

### 1. Conversão de Texto para Fala

Converte um texto em áudio no idioma desejado.

```php
$audioData = $woolball->textToSpeech('Olá mundo', 'pt');
file_put_contents('output.mp3', $audioData);
```

#### Parâmetros:
- `text` (string): O texto que deseja converter.
- `language` (string): O código do idioma (ex: `en`, `pt`, `es`).

#### Retorno:
- String em formato de dados de áudio (MP3).

---

### 2. Transcrição de Áudio

Transcreve o conteúdo de um arquivo de áudio para texto.

```php
$transcription = $woolball->speechToText('audio.wav');
echo $transcription;
```

#### Parâmetros:
- `filePath` (string): Caminho para o arquivo de áudio.

#### Retorno:
- Texto transcrito.

---

### 3. Geração de Texto

Gera um texto baseado em um prompt fornecido.

```php
$generatedText = $woolball->generateText('Qual é a capital da França?');
echo $generatedText;
```

#### Parâmetros:
- `prompt` (string): Texto ou pergunta base para a geração.

#### Retorno:
- Texto gerado.

---

### 4. Tradução de Texto

Traduz um texto entre dois idiomas especificados.

```php
$translatedText = $woolball->translateText('Olá, mundo!', 'por_Latn', 'eng_Latn');
echo $translatedText;
```

#### Parâmetros:
- `text` (string): Texto a ser traduzido.
- `sourceLanguage` (string): Idioma de origem.
- `targetLanguage` (string): Idioma de destino.

#### Retorno:
- Texto traduzido.

---

### 5. Classificação de Texto

Realiza classificação de texto baseada em rótulos fornecidos.

```php
$classification = $woolball->classifyText('Qual cidade não está na América do Sul?', ['geografia', 'viagem', 'história']);
echo $classification;
```

#### Parâmetros:
- `text` (string): Texto para classificar.
- `labels` (array): Lista de rótulos candidatos.

#### Retorno:
- Melhor rótulo identificado.

---

### 6. Detecção de Emoções em Imagens

Detecta emoções em imagens de rostos humanos.

```php
$emotions = $woolball->detectFacialEmotions('img.png');
echo $emotions;
```

#### Parâmetros:
- `filePath` (string): Caminho para a imagem.

#### Retorno:
- Emoções detectadas.

---

### 7. Visão Computacional

Analisa o conteúdo de uma imagem e fornece descrições.

```php
$description = $woolball->analyzeImage('img.png', 'Descreva o conteúdo da imagem');
echo $description;
```

#### Parâmetros:
- `filePath` (string): Caminho para a imagem.
- `prompt` (string): Instrução de descrição.

#### Retorno:
- Descrição da imagem.

---

### 8. Classificação de Imagens

Classifica imagens com base em rótulos fornecidos.

```php
$labels = $woolball->classifyImages(['img1.png', 'img2.png']);
print_r($labels);
```

#### Parâmetros:
- `filePaths` (array): Lista de caminhos para imagens.

#### Retorno:
- Rótulos e pontuações para cada imagem.

---

### 9. Resumo de Texto

Fornece um resumo para um texto longo.

```php
$summary = $woolball->summarizeText('Texto longo aqui...');
echo $summary;
```

#### Parâmetros:
- `text` (string): Texto a ser resumido.

#### Retorno:
- Resumo do texto.

---

### 10. Criação de Imagens a Partir de Caracteres

Gera uma representação visual de um caractere fornecido.

```php
$imageBase64 = $woolball->charToImage('A');
file_put_contents('character.png', base64_decode($imageBase64));
```

#### Parâmetros:
- `character` (string): Caractere a ser representado.

#### Retorno:
- String Base64 da imagem.

---

### 11. Avaliação de Sentimento

Analisa o sentimento de um texto (positivo, negativo ou neutro).

```php
$sentiment = $woolball->analyzeSentiment('Estou muito feliz hoje!');
echo $sentiment;
```

#### Parâmetros:
- `text` (string): Texto a ser analisado.

#### Retorno:
- Sentimento identificado (positivo, negativo ou neutro).

---

## Erros e Depuração

Caso ocorram erros, a biblioteca lançará exceções. Certifique-se de usar blocos `try-catch` para capturá-los:

```php
try {
    $result = $woolball->textToSpeech('Olá mundo', 'pt');
} catch (Exception $e) {
    echo 'Erro: ' . $e->getMessage();
}
```

---

## Contribuição

Contribuições são bem-vindas! Sinta-se à vontade para abrir issues ou enviar pull requests.

---

## Licença

Esta biblioteca é fornecida sob a licença MIT. Consulte o arquivo `LICENSE` para mais detalhes.

---

## Créditos

Desenvolvido com ❤️ por [Bugadoz.dev](https://bugadoz.dev).

