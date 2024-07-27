<?php
/**
 * A class to generate Thumbor URLs
 */

 namespace Amz;

class Thumbor
{
    private $baseUrl;
    private $key;
    private $secret;
    private $quality;

    public function __construct($baseUrl)
    {
        if (!$baseUrl) {
            throw new \Exception('Thumbor base URL is required');
        }
        $this->baseUrl = $baseUrl;
        $this->key = getenv('THUMBOR_KEY') ?: ($_ENV['THUMBOR_KEY'] ?? null);
        $this->secret = getenv('THUMBOR_SECRET') ?: ($_ENV['THUMBOR_SECRET'] ?? null);
        $this->quality = getenv('THUMBOR_QUALITY') ?: ($_ENV['THUMBOR_QUALITY'] ?? null);
    }

    public function url($image, $width, $height)
    {
        $image = urlencode($image);
        $width = urlencode($width);
        $height = urlencode($height);

        $image = str_replace('%2F', '/', $image);
        $image = str_replace('%3A', ':', $image);

        $url = "{$this->baseUrl}/{$this->key}";

        $url .= "/fit-in/{$width}x{$height}";

        $url .= "/smart/filters:quality(" . $this->quality . ")";

        $url .= "/{$image}";

        // $signature = hash_hmac('sha1', $url, $this->secret);

        // $url .= $signature;

        return $url;
    }
}