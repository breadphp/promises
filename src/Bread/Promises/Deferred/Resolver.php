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
namespace Bread\Promises\Deferred;

use Bread\Promises\Deferred;
use Bread\Promises\Interfaces;

class Resolver implements Interfaces\Resolver
{

    private $deferred;

    public function __construct(Deferred $deferred)
    {
        $this->deferred = $deferred;
    }

    public function resolve($result = null)
    {
        return $this->deferred->resolve($result);
    }

    public function reject($reason = null)
    {
        return $this->deferred->reject($reason);
    }

    public function progress($update = null)
    {
        return $this->deferred->progress($update);
    }
}
