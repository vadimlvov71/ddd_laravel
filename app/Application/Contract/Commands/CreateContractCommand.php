<?php

declare(strict_types=1);

namespace App\Application\Contract\Commands;

/**
 * Command for creating a contract.
 */
final readonly class CreateContractCommand
{
    /**
     * @param string $id
     * @param string $clientName
     * @param string $timezone
     */
    public function __construct(
        public string $id,
        public string $clientName,
        public string $timezone
    ) {
    }
}