<?php
// NextTechX Solutions - Secure Server-Side AI API Configuration
// Keys are read from server environment variables for maximum security.
// NEVER commit actual API keys to GitHub or expose them in client-side code.

if (!defined('GEMINI_API_KEY')) {
    $gemini_key = getenv('GEMINI_API_KEY') ?: ($_ENV['GEMINI_API_KEY'] ?? ($_SERVER['GEMINI_API_KEY'] ?? ''));
    define('GEMINI_API_KEY', $gemini_key);
}

if (!defined('OPENAI_API_KEY')) {
    $openai_key = getenv('OPENAI_API_KEY') ?: ($_ENV['OPENAI_API_KEY'] ?? ($_SERVER['OPENAI_API_KEY'] ?? ''));
    define('OPENAI_API_KEY', $openai_key);
}
