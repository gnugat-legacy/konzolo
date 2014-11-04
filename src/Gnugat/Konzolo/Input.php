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
     */
    public function __construct($commandName)
    {
        $this->commandName = $commandName;
    }

    /**
     * @return string
     */
    public function getCommandName()
    {
        return $this->commandName;
    }

    /**
     * @param string $name
     * @param string $value
     */
    public function setArgument($name, $value)
    {
        $this->arguments[$name] = $value;
    }

    /**
     * @param string $name
     *
     * @return string
     */
    public function getArgument($name)
    {
        return $this->arguments[$name];
    }
}
