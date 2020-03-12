<?php

namespace App\Libraries;

class Slack
{
    private $web_hook_url = '';

    private $client;

    protected $text;
    protected $username;
    protected $icon_emoji;
    protected $channel;

    public function __construct()
    {
        $this->client = new \GuzzleHttp\Client([
            'timeout'  => 2.0,
            'verify' => false,
        ]);
    }

    public function publish()
    {
        $payload = json_encode([
            'text' => $this->text,
            'channel' => $this->channel,
            'username' => $this->username,
            'icon_emoji' => $this->icon_emoji,
        ]);

        return $this->client->post($this->web_hook_url, [
            'form_params' => [ 'payload' => $payload ],
        ]);
    }

    public function content($value)
    {
        $this->text = $value;

        return $this;
    }

    public function user($value)
    {
        $this->username = $value;

        return $this;
    }

    public function icon($value)
    {
        $this->icon_emoji = $value;

        return $this;
    }

    public function channel($value)
    {
        $this->channel = $value;

        return $this;
    }
}
