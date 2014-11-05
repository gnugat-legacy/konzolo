<?php

namespace Gnugat\Konzolo\Exception;

use Gnugat\Konzolo\Input;

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
     */
    public function __construct(Input $input, array $commands)
    {
        $this->input = $input;
        $this->commands = $commands;

        parent::__construct(sprintf(
            'Unknown command: "%s"',
            $input->getCommandName()
        ));
    }

    /**
     * @return Input
     */
    public function getInput()
    {
        return $this->input;
    }

    /**
     * @return array
     */
    public function getCommands()
    {
        return $this->commands;
    }
}
