<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\TestFixture\ObjectEquals;

final class ValueObjectWithEqualsMethodWithVoidReturnType
{
    private $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function equals(self $other): void
    {
    }

    public function asInt(): int
    {
        return $this->value;
    }
}
