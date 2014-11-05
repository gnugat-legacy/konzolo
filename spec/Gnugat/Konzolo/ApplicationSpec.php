<?php

/*
 * This file is part of the Redaktilo project.
 *
 * (c) Loïc Chardonnet <loic.chardonnet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Gnugat\Konzolo;

use Gnugat\Konzolo\Command;
use Gnugat\Konzolo\Input;
use PhpSpec\ObjectBehavior;

class ApplicationSpec extends ObjectBehavior
{
    const COMMAND_NAME = 'name';

    function it_executes_the_right_command(Command $command)
    {
        $input = new Input(self::COMMAND_NAME);

        $command->execute($input)->willReturn(Command::EXIT_SUCCESS);

        $this->addCommand(self::COMMAND_NAME, $command);
        $this->run($input)->shouldBe(Command::EXIT_SUCCESS);
    }

    function it_cannot_execute_unknown_commands()
    {
        $input = new Input(self::COMMAND_NAME);
        $unknownCommandException = 'Gnugat\Konzolo\Exception\UnknownCommandException';

        $this->shouldThrow($unknownCommandException)->duringRun($input);
    }
}
