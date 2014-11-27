<?php

/*
 * This file is part of the Konzolo project.
 *
 * (c) Loïc Chardonnet <loic.chardonnet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gnugat\Konzolo\Exception;

/**
 * Allows developers to catch either a standard InvalidArgumentException or a Konzolo one.
 *
 * @api
 */
class InvalidArgumentException extends \InvalidArgumentException implements Exception
{
}
