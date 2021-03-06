<?php

/*
 * This file is part of the Konzolo project.
 *
 * (c) Loïc Chardonnet <loic.chardonnet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gnugat\Konzolo;

/**
 * Retrieves information from Input and call services to process it.
 *
 * @api
 */
interface Command
{
    const EXIT_SUCCESS = 0;

    /**
     * @param Input $input
     *
     * @return int
     *
     * @throws Exception\UndefinedArgumentException If the argument is undefined
     *
     * @api
     */
    public function execute(Input $input);
}
