<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class Handler extends Exception
{
    public function render($request, Throwable $exception)
{
    if ($this->isHttpException($exception)) {
        if ($exception->getStatusCode() == 404) {
            return response()->view('errors.404', [], 404);
        }
        if ($exception->getStatusCode() == 500) {
            return response()->view('errors.500', [], 500);
        }
        if ($exception->getStatusCode() == 503) {
            return response()->view('errors.503', [], 503);
        }
    }

    return parent::render($request, $exception);
}
}
