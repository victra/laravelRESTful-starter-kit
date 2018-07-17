<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        \Illuminate\Auth\AuthenticationException::class,
        \Illuminate\Auth\Access\AuthorizationException::class,
        \Symfony\Component\HttpKernel\Exception\HttpException::class,
        \Illuminate\Database\Eloquent\ModelNotFoundException::class,
        \Illuminate\Session\TokenMismatchException::class,
        \Illuminate\Validation\ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
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
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if (explode('/', $request->path())[0] == 'api') {
            $response = [
                'message' => $exception->getMessage(),
                'exception' => get_class($exception),
            ];
            if (!\App::environment('production')) {
                $response['file'] = $exception->getFile();
                $response['line'] = $exception->getLine();
            }

            switch ($exception) {
                /**
                 * Usage: $this->validate() in controller
                 */
                case ($exception instanceof \Illuminate\Validation\ValidationException):
                    $code = 422;
                    $response['status'] = 'VALIDATION_ERROR';
                    $response['errors'] = $exception->validator->errors();
                    break;

                /**
                 * Usage: abort($statusCode, $message)
                 */
                case ($exception instanceof \Symfony\Component\HttpKernel\Exception\HttpException):
                    $code = $exception->getStatusCode();
                    $response['status'] = 'HTTP_ERROR';
                    break;

                case ($exception instanceof \Illuminate\Auth\AuthenticationException):
                    $code = 401;
                    $response['status'] = 'UNAUTHORIZED';
                    break;

                //------CUSTOM EXCEPTION HANDLER ?? STILL NEED??? --------//
                case ($exception instanceof CustomMessagesException):
                    return response()->json(json_decode($exception->getMessage()));
                    break;
                default:
                    $code = 400;
            }

            if ($code == 403) {
                $response['status'] = 'FORBIDDEN';
            }
            
            return response()->json($response, $code);
        }

        return parent::render($request, $exception);
    }

    /**
     * Convert an authentication exception into an unauthenticated response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Auth\AuthenticationException  $exception
     * @return \Illuminate\Http\Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }

        return redirect()->guest(route('login'));
    }
}
