<?php

/**
 * Bread PHP Framework (http://github.com/saiv/Bread)
 * Copyright 2010-2012, SAIV Development Team <development@saiv.it>
 *
 * Licensed under a Creative Commons Attribution 3.0 Unported License.
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright  Copyright 2010-2012, SAIV Development Team <development@saiv.it>
 * @link       http://github.com/saiv/Bread Bread PHP Framework
 * @package    Bread
 * @since      Bread PHP Framework
 * @license    http://creativecommons.org/licenses/by/3.0/
 */
namespace Bread\Promises;

use Exception;

class Lazy implements Interfaces\Promise {
  use Traits\PromiseFor;

  private $factory;

  private $promise;

  public function __construct($factory) {
    $this->factory = $factory;
  }

  public function then($fulfilledHandler = null, $errorHandler = null,
    $progressHandler = null) {
    if (null === $this->promise) {
      try {
        $this->promise = static::promiseFor(call_user_func($this->factory));
      } catch (Exception $exception) {
        $this->promise = new Rejected($exception);
      }
    }

    return $this->promise->then($fulfilledHandler, $errorHandler, $progressHandler);
  }
}
