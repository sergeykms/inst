<?php

namespace App\Controllers;

use App\Application\Actions\Actions;

class ActionsController
{
    public function sendForm($params = []): void
    {
        $email = $_POST['email'];
        $message = $_POST['message'];
        Actions::sendForm(['email' => $email, 'message' => $message]);
    }
}