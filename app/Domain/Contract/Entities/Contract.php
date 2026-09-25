<?php

declare(strict_types=1);

namespace App\Domain\Contract\Entities;

use App\Domain\Contract\ValueObjects\ContractId;
use DomainException;

/**
 * Aggregate Root for Contract.
 *
 * Keeps core invariants of contract lifecycle.
 */
final class Contract
{
    private bool $active = false;

    /**
     * @param ContractId $id
     * @param string $clientName
     * @param string $timezone
     */
    public function __construct(
        private readonly ContractId $id,
        private string $clientName,
        private string $timezone
    ) {
        if ($clientName === '') {
            throw new DomainException('Client name cannot be empty.');
        }

        if ($timezone === '') {
            throw new DomainException('Timezone cannot be empty.');
        }
    }

    /**
     * Activate contract.
     *
     * @return void
     */
    public function activate(): void
    {
        $this->active = true;
    }

    /**
     * Check whether contract is active.
     *
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * Get contract id.
     *
     * @return ContractId
     */
    public function id(): ContractId
    {
        return $this->id;
    }

    /**
     * Get client name.
     *
     * @return string
     */
    public function clientName(): string
    {
        return $this->clientName;
    }

    /**
     * Get timezone.
     *
     * @return string
     */
    public function timezone(): string
    {
        return $this->timezone;
    }
}