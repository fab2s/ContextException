<?php

/*
 * This file is part of ContextException
 *     (c) Fabrice de Stefanis / https://github.com/fab2s/ContextException
 * This source file is licensed under the MIT license which you will
 * find in the LICENSE file or at https://opensource.org/licenses/MIT
 */

use fab2s\ContextException\ContextException;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(ContextException::class)]
class ContextExceptionTest extends TestCase
{
    /**
     * @var array
     */
    protected $defaultContext = [
        'field1' => 'value1',
    ];

    /**
     * @var array
     */
    protected $defaultContextMerge = [
        'field2' => 'value2',
    ];

    public function test_set_context()
    {
        $e = new ContextException;
        $e->setContext($this->defaultContext);
        $this->assertSame($this->defaultContext, $e->getContext());
    }

    /**
     * @throws ContextException
     */
    public function test_context_exception_no_context()
    {
        $this->expectException(ContextException::class);
        throw new ContextException('', 0, new Exception);
    }

    /**
     * @throws ContextException
     */
    public function test_context_exception_with_context()
    {
        $this->expectException(ContextException::class);
        try {
            throw new ContextException('', 0, null, $this->defaultContext);
        } catch (ContextException $e) {
            $this->assertSame($this->defaultContext, $e->getContext());
            throw $e;
        }
    }

    /**
     * @throws ContextException
     */
    public function test_context_exception_with_set_context()
    {
        $this->expectException(ContextException::class);
        try {
            throw (new ContextException)->setContext($this->defaultContext);
        } catch (ContextException $e) {
            $this->assertSame($this->defaultContext, $e->getContext());
            throw $e;
        }
    }

    /**
     * @throws ContextException
     */
    public function test_context_exception_with_set_context_variant()
    {
        $this->expectException(ContextException::class);
        try {
            $e = new ContextException;
            $e->setContext($this->defaultContext);
            throw $e;
        } catch (ContextException $e) {
            $this->assertSame($this->defaultContext, $e->getContext());
            throw $e;
        }
    }
}
