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
     * Get current exception context, useful for logging
     */
    public function getContext(): array;

    /**
     * Set context
     *
     *
     * @return static
     */
    public function setContext(array $context): self;
}
