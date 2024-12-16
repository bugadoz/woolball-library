# Biblioteca de Inteligência Artificial - Versão 3.0

Bem-vindo à versão 3.0 da biblioteca de IA! Esta biblioteca oferece diversas funcionalidades que aproveitam modelos de linguagem e processamento de imagens para diversas aplicações de IA. Abaixo estão as funcionalidades principais e suas descrições.

---

## Funcionalidades

### 1. Conversão de Texto para Áudio
Gera áudio a partir de um texto em diferentes idiomas.
- **Função:** `textToSpeech(string $text, string $language)`
- **Entrada:** Texto e idioma.
- **Saída:** Arquivo de áudio.

### 2. Conversão de Áudio para Texto
Transcreve o conteúdo de um arquivo de áudio para texto.
- **Função:** `speechToText(string $audioFilePath)`
- **Entrada:** Caminho para o arquivo de áudio.
- **Saída:** Transcrição textual.

### 3. Geração de Texto (Completação)
Cria texto automaticamente com base em um prompt fornecido.
- **Função:** `generateText(string $text)`
- **Entrada:** Prompt textual.
- **Saída:** Texto gerado.

### 4. Tradução de Texto
Traduz texto entre diferentes idiomas suportados.
- **Função:** `translateText(string $text, string $srcLang, string $tgtLang)`
- **Entrada:** Texto, idioma de origem e idioma de destino.
- **Saída:** Texto traduzido.

### 5. Classificação de Texto (Zero-Shot)
Classifica texto em categorias sem necessidade de treinamento prévio.
- **Função:** `zeroShotClassification(string $text, array $candidateLabels)`
- **Entrada:** Texto e categorias candidatas.
- **Saída:** Categoria atribuída.

### 6. Detecção de Emoções em Imagens
Identifica emoções faciais em imagens.
- **Função:** `detectFacialEmotions(string $imagePath)`
- **Entrada:** Caminho da imagem.
- **Saída:** Emoção detectada.

### 7. Análise de Conteúdo de Imagens
Gera descrições automáticas para o conteúdo de imagens.
- **Função:** `analyzeImageContent(string $imagePath, string $prompt)`
- **Entrada:** Caminho da imagem e um prompt.
- **Saída:** Descrição textual.

### 8. Classificação de Imagens
Classifica imagens em categorias pré-definidas.
- **Função:** `classifyImages(array $imagePaths)`
- **Entrada:** Lista de caminhos de imagens.
- **Saída:** Categorias atribuídas.

### 9. Classificação Zero-Shot em Imagens
Determina a correspondência de uma imagem com etiquetas personalizadas.
- **Função:** `imageZeroShotClassification(string $imagePath, array $labels)`
- **Entrada:** Caminho da imagem e etiquetas.
- **Saída:** Etiqueta atribuída.

### 10. Resumir Texto
Gera um resumo condensado de textos longos.
- **Função:** `summarizeText(string $text)`
- **Entrada:** Texto longo.
- **Saída:** Resumo.

### 11. Imagem a partir de Caracteres
Gera imagens em base64 a partir de caracteres fornecidos.
- **Função:** `generateImageFromChar(string $character)`
- **Entrada:** Caractere ou conjunto de caracteres.
- **Saída:** Imagem gerada.

### 12. Análise de Sentimento em Texto
Realiza análise de sentimento de um texto fornecido.
- **Função:** `analyzeSentiment(string $text)`
- **Entrada:** Texto.
- **Saída:** Sentimento (positivo, negativo ou neutro).

### 13. Geração de Resposta Contextual
Implementa um chatbot baseado no contexto fornecido.
- **Função:** `generateChatResponse(string $context)`
- **Entrada:** Contexto textual.
- **Saída:** Resposta gerada.

### 14. Classificação de Objetos em Imagens
Detecta e rotula objetos presentes em imagens.
- **Função:** `detectObjectsInImage(string $imagePath)`
- **Entrada:** Caminho da imagem.
- **Saída:** Lista de objetos detectados.

---

## Instalação

Instale a biblioteca usando o [Composer](https://getcomposer.org/):

```bash
composer require sua-org/sua-biblioteca
```

Certifique-se de que o autoload do Composer está configurado no seu projeto:

```php
require_once 'vendor/autoload.php';
```

---

## Uso

Consulte a documentação de cada função para exemplos de como utilizar as funcionalidades.

---

## Atualização para Versão 3.0
Esta versão inclui:
- Novas funcionalidades como **Análise de Sentimento**, **Geração de Resposta Contextual** e **Classificação de Objetos em Imagens**.
- Melhorias de desempenho e correções de bugs.

Para atualizar, execute:

```bash
composer update
```

---

## Contribuição
Contribuições são bem-vindas! Envie suas sugestões e correções através de pull requests ou abra uma issue no repositório.

---

## Licença
Esta biblioteca é licenciada sob a [MIT License](LICENSE).
