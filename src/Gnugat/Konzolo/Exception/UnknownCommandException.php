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

use Gnugat\Konzolo\Input;

/**
 * When an Application cannot find a Command.
 *
 * @api
 */
class UnknownCommandException extends InvalidArgumentException
{
    /**
     * @var Input
     */
    private $input;

    /**
     * @var array
     */
    private $commands;

    /**
     * @param Input $input
     * @param array $commands
     *
     * @api
     */
    public function __construct(Input $input, array $commands)
    {
        $this->input = $input;
        $this->commands = $commands;

        parent::__construct(sprintf('Unknown command: "%s"', $input->getCommandName()));
    }

    /**
     * @return Input
     *
     * @api
     */
    public function getInput()
    {
        return $this->input;
    }

    /**
     * @return array
     *
     * @api
     */
    public function getCommands()
    {
        return $this->commands;
    }
}
