<?php

Route::get('/', function () {

    $channel = request()->input('channel', null);
    $content = request()->input('content', null);
    $user = request()->input('user', null);
    $icon = request()->input('icon', null);
    

    if (empty($content))
    {
        return "CONTENT REQUIRED.";
    }

    $slack = new \App\Libraries\Slack;

    $response = $slack
        ->channel($channel)
        ->content($content)
        ->user($user)
        ->icon($icon)
        ->publish();

    return $response->getStatusCode();

});
