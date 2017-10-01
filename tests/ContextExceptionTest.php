<?php

/*
 * This file is part of ContextException.
 *     (c) Fabrice de Stefanis / https://github.com/fab2s/ContextExceptio
 * This source file is licensed under the MIT license which you will
 * find in the LICENSE file or at https://opensource.org/licenses/MIT
 */

use fab2s\ContextException\ContextException;

class ContextExceptionTest extends \TestCase
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

    public function testSetContext()
    {
        $e = new ContextException;
        $e->setContext($this->defaultContext);
        $this->assertSame($this->defaultContext, $e->getContext());
    }

    /**
     * @throws ContextException
     */
    public function testMergeContext()
    {
        $e = new ContextException;
        $e->setContext($this->defaultContext);
        $e->mergeContext($this->defaultContextMerge);
        $this->assertSame(array_replace_recursive($this->defaultContext, $this->defaultContextMerge), $e->getContext());
    }

    /**
     * @throws ContextException
     */
    public function testContextExceptionNoContext()
    {
        $this->expectException(ContextException::class);
        throw new ContextException('', 0, null);
    }

    /**
     * @throws ContextException
     */
    public function testContextExceptionWithContext()
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
    public function testContextExceptionWithSetContext()
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
    public function testContextExceptionWithSetContextVariant()
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
