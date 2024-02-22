<?php
class Creds
{
    private string $api_key = '';
    public function getApiKey(): string
    {
        return $this->api_key;
    }
}
