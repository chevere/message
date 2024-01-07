<?php

/*
 * This file is part of Chevere.
 *
 * (c) Rodolfo Berrios <rodolfo@chevere.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Chevere\Message\Interfaces;

use Stringable;

interface MessageInterface extends Stringable
{
    /**
     *  Returns a text message representation.
     */
    public function __toString(): string;

    /**
     * Provides access to the message template.
     */
    public function template(): string;

    /**
     * Provides access to the message translation table.
     *
     * @return array<string, string>
     */
    public function replacements(): array;
}
