<?php

/*
 * This file is part of the Redaktilo project.
 *
 * (c) Loïc Chardonnet <loic.chardonnet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gnugat\Konzolo;

/**
 * Holds information which needs to be processed.
 *
 * @api
 */
class Input
{
    /**
     * @var string
     */
    private $commandName;

    /**
     * @var array
     */
    private $arguments = array();

    /**
     * @param string $commandName
     *
     * @api
     */
    public function __construct($commandName)
    {
        $this->commandName = $commandName;
    }

    /**
     * @return string
     *
     * @api
     */
    public function getCommandName()
    {
        return $this->commandName;
    }

    /**
     * @param string $name
     * @param string $value
     *
     * @api
     */
    public function setArgument($name, $value)
    {
        $this->arguments[$name] = $value;
    }

    /**
     * @param string $name
     *
     * @return string
     *
     * @api
     */
    public function getArgument($name)
    {
        return $this->arguments[$name];
    }
}
