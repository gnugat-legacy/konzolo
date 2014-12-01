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

use PhpSpec\ObjectBehavior;

class UndefinedArgumentExceptionSpec extends ObjectBehavior
{
    private $name = 'meh';
    private $arguments = array();

    function let()
    {
        $this->beConstructedWith($this->name, $this->arguments);
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

    function it_has_a_name()
    {
        $this->getName()->shouldBe($this->name);
    }

    function it_has_arguments()
    {
        $this->getArguments()->shouldBe($this->arguments);
    }
}
