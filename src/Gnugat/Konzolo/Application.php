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

use Gnugat\Konzolo\Exception\UnknownCommandException;

class Application
{
    /**
     * @var array
     */
    private $commands = array();

    /**
     * @param string $commandName
     * @param Command $command
     */
    public function addCommand($commandName, Command $command)
    {
        $this->commands[$commandName] = $command;
    }

    /**
     * @param Input $input
     *
     * @return int
     */
    public function run(Input $input)
    {
        $commandName = $input->getCommandName();
        if (!isset($this->commands[$commandName])) {
            throw new UnknownCommandException($input, $this->commands);
        }
        $command = $this->commands[$commandName];

        return $command->execute($input);
    }
}
