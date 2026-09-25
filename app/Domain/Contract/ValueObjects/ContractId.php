<?php

declare(strict_types=1);

namespace App\Domain\Contract\ValueObjects;

use InvalidArgumentException;

/**
 * Value Object representing a Contract identifier.
 */
final readonly class ContractId
{
    /**
     * @param string $value UUID string.
     */
    public function __construct(public string $value)
    {
        if ($value === '') {
            throw new InvalidArgumentException('ContractId cannot be empty.');
        }
    }

    /**
     * Create a new ContractId from string value.
     *
     * @param string $value
     * @return self
     */
    public static function fromString(string $value): self
    {
        return new self($value);
    }
}