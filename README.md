# ContextException

Exception logging proves particularly useful to monitor application failure, but as it is, cannot provide with contextual data that could help out when processing those exception logs.

This Exception interface and implementation is just a step towards providing context to exceptions allowing you to interact with such exception and log them together with the extra information you would have provided.

It goes particularly well with [Monolog](https://github.com/Seldaek/monolog) and global exception handling where you can directly and globally add exception context to your log (when available) which may be of virtually any nature (monolog has a lot of handler and you can add more yourself to suite your need).

In your exception handler (or just a `try{}catch{}`:
```php
if ($exception instanceof ContextExceptionInterface) {
    $context = $exception->getContext();
    // now you can add this data to your monolog's context
}
```

Setting context can be achieved in several ways :
```php
// arguable way
throw (new ContextException('Message'))->setContext($contextData);

// or more conventional
throw new ContextException('Message', 0, null, $contextData);

// or step by step (also arguable)
$exception = new ContextException;
$exception->setContext($contextData);
throw $exception;
```

IMHO, the arguability of some of the way to provide context to exceptions does not match the usefulness they provide IRL. I'm not saying that the conventional way to throw should not be in principle preferred, but I definitely find IRL use for things like :
```php
} catch (ContextException $e) {
    // access context
    $context = $e->getContext();
    // set context in case there is none
    $e->setContext($context);
    // and even add more context
    $e->mergeContext($moreContext);
}
```

And from there, you get mutability so ...

