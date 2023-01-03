<?php

/*
 * This file is part of ContextException
 *     (c) Fabrice de Stefanis / https://github.com/fab2s/ContextException
 * This source file is licensed under the MIT license which you will
 * find in the LICENSE file or at https://opensource.org/licenses/MIT
 */

namespace fab2s\ContextException;

/**
 * Trait ContextException
 */
trait ContextExceptionTrait
{
    /**
     * Exception context
     *
     * @var array
     */
    protected $context = [];

    /**
     * Get current exception context, useful for logging
     *
     * @return array
     */
    public function getContext(): array
    {
        return $this->context;
    }

    /**
     * @param array $context
     *
     * @return static
     */
    public function setContext(array $context): ContextExceptionInterface
    {
        $this->context = $context;

        return $this;
    }
}
