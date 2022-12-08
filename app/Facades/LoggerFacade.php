<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

// Menambahkan logger facade agar nanti lebih gampang nyari class nya
// dan tanpa instantiate class nya setiap saat
class LoggerFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'logger';
    }
}
