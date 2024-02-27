<?php
class Creds {
    /**
     * Add your api key here
     */
    private string $api_key = '';
    public function getApiKey(): string
    {
        return $this->api_key;
    }
}
