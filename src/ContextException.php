<?php

/*
 * This file is part of ContextException
 *     (c) Fabrice de Stefanis / https://github.com/fab2s/ContextException
 * This source file is licensed under the MIT license which you will
 * find in the LICENSE file or at https://opensource.org/licenses/MIT
 */

namespace fab2s\ContextException;

/**
 * Class ContextException
 */
class ContextException extends \Exception implements ContextExceptionInterface
{
    use ContextExceptionTrait;

    /**
     * Instantiate an exception
     *
     * @param string          $message
     * @param int             $code
     * @param null|\Throwable $previous
     * @param array           $context
     */
    public function __construct(string $message = '', int $code = 0, ? \Throwable $previous = null, array $context = [])
    {
        $this->context = $context;

        parent::__construct($message, $code, $previous);
    }
}
