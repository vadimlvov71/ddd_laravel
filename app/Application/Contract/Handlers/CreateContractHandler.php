<?php

declare(strict_types=1);

namespace App\Application\Contract\Handlers;

use App\Application\Contract\Commands\CreateContractCommand;
use App\Domain\Contract\Entities\Contract;
use App\Domain\Contract\Repositories\ContractRepositoryInterface;
use App\Domain\Contract\ValueObjects\ContractId;

/**
 * Handles contract creation use case.
 */
final readonly class CreateContractHandler
{
    /**
     * @param ContractRepositoryInterface $contracts
     */
    public function __construct(private ContractRepositoryInterface $contracts)
    {
    }

    /**
     * Execute use case.
     *
     * @param CreateContractCommand $command
     * @return void
     */
    public function handle(CreateContractCommand $command): void
    {
        $contract = new Contract(
            ContractId::fromString($command->id),
            $command->clientName,
            $command->timezone
        );

        $this->contracts->save($contract);
    }
}