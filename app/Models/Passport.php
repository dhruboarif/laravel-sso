<?php
namespace App\Models;

use Laravel\Passport\Client;

class Passport extends Client{
    function skipsAuthorization()
    {
        // dd($this);
        return false;

    }
}