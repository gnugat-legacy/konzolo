<?php

namespace Gnugat\Konzolo\Exception;

/**
 * Allows developers to catch either a standard InvalidArgumentException or a Konzolo one.
 *
 * @api
 */
class InvalidArgumentException extends \InvalidArgumentException implements Exception
{
}
