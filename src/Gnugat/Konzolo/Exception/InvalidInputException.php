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
 * When an Input isn't valid.
 *
 * @api
 */
class InvalidInputException extends InvalidArgumentException
{
    /**
     * @var Input
     */
    private $input;

    /**
     * @param Input  $input
     * @param string $message
     *
     * @api
     */
    public function __construct(Input $input, $message)
    {
        $this->input = $input;

        parent::__construct($message);
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
}
