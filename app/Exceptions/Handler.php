<?php

namespace App\Exceptions;

use BadMethodCallException;
use ErrorException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\MassAssignmentException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Jiannei\Response\Laravel\Support\Facades\Response;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $e)
    {
        if($request->acceptsJson()){
            $code = $e->getCode();
            switch ($e){
                case $e instanceof AuthenticationException:
                    $code = 403;
                    break;
                case $e instanceof AuthorizationException:
                    $code = 401;
                    break;
                case $e instanceof BadMethodCallException:
                case $e instanceof ValidationException:
                    $code = 412;
                case $e instanceof ModelNotFoundException:
                case $e instanceof ErrorException:
                case $e instanceof MassAssignmentException:
            }
//            return response($e->getMessage(),$code);
            return response()->json([
                'code' => $code,
                'message' => $e->getMessage(),
                'data'   => [],
            ]);
        }
        return parent::render($request, $e); // TODO: Change the autogenerated stub
    }
}
