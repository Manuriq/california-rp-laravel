<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ValidateIp extends Controller
{
    public function index()
    {
        $connection = ssh2_connect('91.121.67.107', 22);
        ssh2_auth_password($connection, 'root', 'Justerius12345');

        $stream = ssh2_exec($connection, '/usr/local/bin/php -i');

        dd($stream);
    }
}
