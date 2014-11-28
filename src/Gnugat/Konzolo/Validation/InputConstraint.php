<?php

/*
 * This file is part of the Konzolo project.
 *
 * (c) Loïc Chardonnet <loic.chardonnet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gnugat\Konzolo\Validation;

use Gnugat\Konzolo\Input;

/**
 * Checks the Input against a custom rule.
 *
 * @api
 */
interface InputConstraint
{
    /**
     * @param Input $input
     *
     * @throws \Gnugat\Konzolo\Exception\InvalidInputException If the Input isn't valid
     *
     * @api
     */
    public function throwIfInvalid(Input $input);
}
