<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\Facades\Log;

class MyException extends Exception
{
    public function report()
    {
        Log::info('ex folan shd');
    }

    public function render()
    {
        return response('hehe');
    }
}
