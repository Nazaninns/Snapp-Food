<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\Facades\Log;

class MyException extends Exception
{
    public function report()
    {
        Log::info('something');
    }

    public function render()
    {
        return response('sth for customer');
    }
}
