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

namespace Chevere\Message;

use Chevere\Message\Interfaces\MessageInterface;
use Stringable;

final class Message implements MessageInterface
{
    /**
     * @var array<string, string>
     */
    private array $replacements = [];

    public function __construct(
        private string $template,
        float|int|string|Stringable ...$translate
    ) {
        $array = [];
        foreach ($translate as $key => $value) {
            $value = strval($value);
            $array["%{$key}%"] = $value;
            $array["{{{$key}}}"] = $value;
            $array["{{ {$key} }}"] = $value;
        }
        $this->replacements = $array;
    }

    public function __toString(): string
    {
        return strtr($this->template, $this->replacements);
    }

    public function template(): string
    {
        return $this->template;
    }

    public function replacements(): array
    {
        return $this->replacements;
    }
}
