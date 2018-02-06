<?php
declare(strict_types=1);

namespace Trancended\ClientProduct\Exceptions;

use Exception;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        if ($e instanceof ClientException) {
            $content = json_decode($e->getResponse()->getBody()->getContents(), true);

            $message = $content['error'];

            return redirect()->back()->withErrors($message)->withInput($request->all());
        }

        if ($e instanceof EmptyDataException) {
            return redirect()->back()->withErrors($e->getMessage());
        }
        
        return parent::render($request, $e);
    }
}
