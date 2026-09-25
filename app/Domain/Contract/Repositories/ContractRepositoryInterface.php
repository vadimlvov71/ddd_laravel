<?php

declare(strict_types=1);

namespace App\Domain\Contract\Repositories;

use App\Domain\Contract\Entities\Contract;
use App\Domain\Contract\ValueObjects\ContractId;

/**
 * Contract repository abstraction.
 */
interface ContractRepositoryInterface
{
    /**
     * Persist contract aggregate.
     *
     * @param Contract $contract
     * @return void
     */
    public function save(Contract $contract): void;

    /**
     * Find contract by id.
     *
     * @param ContractId $id
     * @return Contract|null
     */
    public function findById(ContractId $id): ?Contract;
}