<?php

/*
 * This file is part of ContextException
 *     (c) Fabrice de Stefanis / https://github.com/fab2s/ContextException
 * This source file is licensed under the MIT license which you will
 * find in the LICENSE file or at https://opensource.org/licenses/MIT
 */

namespace fab2s\ContextException;

/**
 * Interface ContextExceptionInterface
 */
interface ContextExceptionInterface
{
    /**
     * Instantiate an exception
     *
     * @param string          $message
     * @param int             $code
     * @param null|\Throwable $previous
     * @param array           $context
     */
    public function __construct(string $message = '', int $code = 0, ?\Throwable $previous = null, array $context = []);

    /**
     * Get current exception context, useful for logging
     *
     * @return array
     */
    public function getContext(): array;

    /**
     * Set context
     *
     * @param array $context
     *
     * @return static
     */
    public function setContext(array $context): self;

    /**
     * Merge more context to current context
     *
     * @param array $moreContext The context to merge to the (eventually) existing one
     *
     * @return static
     */
    public function mergeContext(array $moreContext): self;
}
