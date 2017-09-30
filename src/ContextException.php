<?php

/*
 * This file is part of ContextException.
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
    /**
     * Exception context
     *
     * @var array
     */
    protected $context = [];

    /**
     * Instantiate an exception
     *
     * @param string          $message
     * @param int             $code
     * @param null|\Exception $previous
     * @param array           $context
     */
    public function __construct($message = '', $code = 0, \Exception $previous = null, array $context = [])
    {
        $this->context = $context;

        parent::__construct($message, $code, $previous);
    }

    /**
     * Get current exception context, useful for logging
     *
     * @return array
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * Set context
     *
     * @return array
     */
    public function setContext(array $context)
    {
        $this->context = $context;

        return $this;
    }

    /**
     * Merge more context to current context
     *
     * @param array $moreContext The context to merge to the (eventually) existing one
     *
     * @return $this
     */
    public function mergeContext(array $moreContext)
    {
        $this->context = array_replace_recursive(isset($this->context) ? $this->context : [], $moreContext);

        return $this;
    }
}
