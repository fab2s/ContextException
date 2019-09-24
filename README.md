# ContextException

[![Build Status](https://travis-ci.org/fab2s/ContextException.svg?branch=master)](https://travis-ci.org/fab2s/ContextException) [![Total Downloads](https://poser.pugx.org/fab2s/context-exception/downloads)](https://packagist.org/packages/fab2s/context-exception) [![Monthly Downloads](https://poser.pugx.org/fab2s/context-exception/d/monthly)](https://packagist.org/packages/fab2s/context-exception) [![Latest Stable Version](https://poser.pugx.org/fab2s/context-exception/v/stable)](https://packagist.org/packages/fab2s/context-exception) [![SensioLabsInsight](https://insight.sensiolabs.com/projects/d11fb66a-3e46-4b88-813a-04bd105d3103/mini.png)](https://insight.sensiolabs.com/projects/d11fb66a-3e46-4b88-813a-04bd105d3103) [![Code Climate](https://codeclimate.com/github/fab2s/ContextException/badges/gpa.svg)](https://codeclimate.com/github/fab2s/ContextException) [![Codacy Badge](https://api.codacy.com/project/badge/Grade/bc3d2572e1a74996883095054ec3c937)](https://www.codacy.com/app/fab2s/ContextException) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/fab2s/ContextException/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/fab2s/ContextException/?branch=master) [![PRs Welcome](https://img.shields.io/badge/PRs-welcome-brightgreen.svg?style=flat)](http://makeapullrequest.com) [![PHPPackages Referenced By](http://phppackages.org/p/fab2s/context-exception/badge/referenced-by.svg)](http://phppackages.org/p/fab2s/context-exception) [![License](https://poser.pugx.org/fab2s/nodalflow/license)](https://packagist.org/packages/fab2s/yaetl)

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

## Installation

ContextException can be installed using composer:

```
composer require "fab2s/context-exception"
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

ContextException is tested against php 7.1, 7.2 and 7.3.

## License

ContextException is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
