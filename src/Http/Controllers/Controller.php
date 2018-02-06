<?php
declare(strict_types=1);

namespace Trancended\ClientProduct\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Trancended\ClientProduct\Exceptions\Handler;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function __construct()
    {
        $this->middleware('web');

        \App::singleton(
            ExceptionHandler::class,
            Handler::class
        );
    }
}
