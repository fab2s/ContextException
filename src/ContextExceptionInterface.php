<?php

/*
 * This file is part of ContextException.
 *     (c) Fabrice de Stefanis / https://github.com/fab2s/ContextExceptio
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
     * @param null|\Exception $previous
     * @param array           $context
     */
    public function __construct($message = '', $code = 0, \Exception $previous = null, array $context = []);

    /**
     * Get current exception context, useful for logging
     *
     * @return array
     */
    public function getContext();

    /**
     * Set context
     *
     * @return $this
     */
    public function setContext(array $context);

    /**
     * Merge more context to current context
     *
     * @param array $moreContext The context to merge to eh (eventually) existing one
     */
    public function mergeContext(array $moreContext);
}
