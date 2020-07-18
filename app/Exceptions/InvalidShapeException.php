<?php

namespace App\Exceptions;

use HGh\Handlers\Exception\Exceptions\BaseException;
use Throwable;

/**
 * The exception for invalid shapes
 * PHP version php >= 7.0
 *
 * @category Exceptions
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 */
class InvalidShapeException extends BaseException
{
    /**
     * CasinoException constructor.
     *
     * @param string         $message  The message of Exception
     * @param int            $code     The code of Exception
     * @param Throwable|null $previous The previous throwable used for the exception chaining.
     */
    public function __construct(
        $message = "The shapes you've tried to create, is not correct one.",
        $code = 400,
        Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }
}
