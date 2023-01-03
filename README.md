# ContextException

[![CI](https://github.com/fab2s/ContextException/actions/workflows/ci.yml/badge.svg)](https://github.com/fab2s/ContextException/actions/workflows/ci.yml) [![QA](https://github.com/fab2s/ContextException/actions/workflows/qa.yml/badge.svg)](https://github.com/fab2s/ContextException/actions/workflows/qa.yml) [![Total Downloads](https://poser.pugx.org/fab2s/context-exception/downloads)](https://packagist.org/packages/fab2s/context-exception) [![Monthly Downloads](https://poser.pugx.org/fab2s/context-exception/d/monthly)](https://packagist.org/packages/fab2s/context-exception) [![Latest Stable Version](https://poser.pugx.org/fab2s/context-exception/v/stable)](https://packagist.org/packages/fab2s/context-exception) [![Code Climate](https://codeclimate.com/github/fab2s/ContextException/badges/gpa.svg)](https://codeclimate.com/github/fab2s/ContextException) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/fab2s/ContextException/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/fab2s/ContextException/?branch=master) [![PRs Welcome](https://img.shields.io/badge/PRs-welcome-brightgreen.svg?style=flat)](http://makeapullrequest.com) [![License](https://poser.pugx.org/fab2s/nodalflow/license)](https://packagist.org/packages/fab2s/yaetl)

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
}
```

And from there, you get mutability so ...

## Installation

ContextException can be installed using composer:

```
composer require "fab2s/context-exception"
```

> V3.x introduces a breaking change in the `ContextExceptionInterface` which no more includes a signature for the constructor or even a merge function.
> It introduce and handy `ContextExceptionTrait` you can use to implement your own implementation of `ContextExceptionInterface` without having to inherit `ContextException`

If you want to stick to the previous interface :

```
composer require "fab2s/context-exception" ^2
```

If you want to specifically install the php >=7.1.0 version, use:

```
composer require "fab2s/context-exception" ^1
```

If you want to specifically install the php 5.6/7.0 version, use:

```
composer require "fab2s/context-exception" ^0
```

## Requirements

ContextException is tested against php 7.1, 7.2, 7.3, 7.4, 8.0, 8.1 and 8.2

## License

ContextException is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
