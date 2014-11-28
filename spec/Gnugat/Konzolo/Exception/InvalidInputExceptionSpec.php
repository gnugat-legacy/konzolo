<?php

/*
 * This file is part of the Konzolo project.
 *
 * (c) Loïc Chardonnet <loic.chardonnet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Gnugat\Konzolo\Exception;

use Gnugat\Konzolo\Input;
use PhpSpec\ObjectBehavior;

class InvalidInputExceptionSpec extends ObjectBehavior
{
    const MESSAGE = 'Invalid Input';

    function let(Input $input)
    {
        $this->beConstructedWith($input, self::MESSAGE);
    }

    function it_is_a_konzolo_exception()
    {
        $this->shouldImplement('Gnugat\Konzolo\Exception\Exception');
    }

    function it_is_an_invalid_argument_exception()
    {
        $this->shouldHaveType('\Exception');
        $this->shouldHaveType('\InvalidArgumentException');
        $this->shouldHaveType('Gnugat\Konzolo\Exception\InvalidArgumentException');
    }

    function it_has_an_input(Input $input)
    {
        $this->getInput()->shouldBe($input);
    }

    function it_has_a_message()
    {
        $this->getMessage()->shouldBe(self::MESSAGE);
    }
}
