<?php

/*
 * This file is part of the Konzolo project.
 *
 * (c) Loïc Chardonnet <loic.chardonnet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Gnugat\Konzolo;

use PhpSpec\ObjectBehavior;

class InputSpec extends ObjectBehavior
{
    const COMMAND_NAME = 'command name';
    const ARGUMENT_NAME = 'argument value';
    const ARGUMENT_VALUE = 'argument name';

    function let()
    {
        $this->beConstructedWith(self::COMMAND_NAME);
    }

    function it_has_a_command_name()
    {
        $this->getCommandName()->shouldBe(self::COMMAND_NAME);
    }

    function it_has_arguments()
    {
        $this->setArgument(self::ARGUMENT_NAME, self::ARGUMENT_VALUE);
        $this->getArgument(self::ARGUMENT_NAME)->shouldBe(self::ARGUMENT_VALUE);
    }

    function it_cannot_get_undefined_arguments()
    {
        $undefinedArgumentException = 'Gnugat\Konzolo\Exception\UndefinedArgumentException';
        $this->shouldThrow($undefinedArgumentException)->duringGetArgument(self::ARGUMENT_NAME);
    }

    function it_checks_presence_of_argument()
    {
        $this->hasArgument(self::ARGUMENT_NAME)->shouldBe(false);

        $this->setArgument(self::ARGUMENT_NAME, self::ARGUMENT_VALUE);
        $this->hasArgument(self::ARGUMENT_NAME)->shouldBe(true);
    }
}
