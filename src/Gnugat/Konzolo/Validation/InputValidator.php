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
 * Checks the Input against a collection of InputConstraint.
 *
 * @api
 */
class InputValidator
{
    /**
     * @var array of InputConstraint
     */
    private $constraints = array();

    /**
     * @var bool
     */
    private $isSorted = false;

    /**
     * @param InputConstraint $constraint
     * @param int             $priority
     *
     * @api
     */
    public function addConstraint(InputConstraint $constraint, $priority = 0)
    {
        $this->constraints[$priority][] = $constraint;
        $this->isSorted = false;
    }

    /**
     * @param Input $input
     *
     * @throws \Gnugat\Konzolo\Exception\InvalidInputException If the Input isn't valid
     *
     * @api
     */
    public function throwIfInvalid(Input $input)
    {
        if (!$this->isSorted) {
            $this->sortConstraints();
        }
        foreach ($this->constraints as $priority => $constrains) {
            foreach ($constrains as $constraint) {
                $constraint->throwIfInvalid($input);
            }
        }
    }

    /**
     * Sort constraints according to their priorities.
     */
    private function sortConstraints()
    {
        krsort($this->constraints);
        $this->isSorted = true;
    }
}
