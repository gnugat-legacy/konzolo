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

/**
 * When an Input cannot find an argument.
 *
 * @api
 */
class UndefinedArgumentException extends InvalidArgumentException
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var array
     */
    private $arguments;

    /**
     * @param string $name
     * @param array  $arguments
     *
     * @api
     */
    public function __construct($name, array $arguments)
    {
        $this->name = $name;
        $this->arguments = $arguments;

        parent::__construct(sprintf('Undefined argument: "%s"', $name));
    }

    /**
     * @return string
     *
     * @api
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return array
     *
     * @api
     */
    public function getArguments()
    {
        return $this->arguments;
    }
}
