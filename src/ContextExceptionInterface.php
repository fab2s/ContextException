<?php

/*
 * This file is part of ContextException.
 *     (c) Fabrice de Stefanis / https://github.com/fab2s/NodalFlow
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
     * Some will argue that one shall not mutate an exeception
     * after it has been thrown (or instanciated), but IRL it
     * prooves usefull to be able to do it, especially to generate
     * commplete error log, with enough context data to be self
     * analysable
     * `
     * // ...
     * } catch (NodalFlowExcepption $e) {
     *      $context = $e->getContext();
     *      // ... enrich / whatever
     *      throw $e->setContext($enrichedContext);
     *      // or ...
     * }
     *
     * @return $this
     */
    public function setContext(array $context);

    /**
     * Merge more context to current context
     *
     * @param array $moreContext The contextt to merge to eh (eventually) existing one
     */
    public function mergeContext(array $moreContext);
}
