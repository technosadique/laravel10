<?php
namespace App\Services;

class UrlShortenerService
{
    public function generate(string $longUrl): string
    {
        $apiUrl   = "https://tinyurl.com/api-create.php?url=" . urlencode($longUrl);
        $shortUrl = file_get_contents($apiUrl);
        return $shortUrl;
    }
}
