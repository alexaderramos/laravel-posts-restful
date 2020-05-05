<?php

namespace App\Exceptions;

use App\Traits\ApiResponse;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    use ApiResponse;
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return JsonResponse
     */
    public function render($request, Exception $exception)
    {
        #dd($exception);

        if (env('APP_ENV')=='local'){
            return parent::render($request, $exception);
        }


        if ($exception instanceof NotFoundHttpException) //404
        {
            return $this->errorResponse(null,404,"Pagina no encontrada");
        }

        if ($exception instanceof ModelNotFoundException) //404
        {
            return $this->errorResponse(null,404,"Recurso no encontrado");
        }

        return parent::render($request, $exception);


    }
}
