<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Eloquent\Repositories;

use App\Domain\Contract\Entities\Contract;
use App\Domain\Contract\Repositories\ContractRepositoryInterface;
use App\Domain\Contract\ValueObjects\ContractId;
use App\Infrastructure\Persistence\Eloquent\Models\ContractModel;

/**
 * Eloquent implementation of ContractRepositoryInterface.
 */
final class EloquentContractRepository implements ContractRepositoryInterface
{
    /**
     * @inheritDoc
     */
    public function save(Contract $contract): void
    {
        ContractModel::query()->updateOrCreate(
            ['id' => $contract->id()->value],
            [
                'client_name' => $contract->clientName(),
                'timezone' => $contract->timezone(),
                'is_active' => $contract->isActive(),
            ]
        );
    }

    /**
     * @inheritDoc
     */
    public function findById(ContractId $id): ?Contract
    {
        $model = ContractModel::query()->find($id->value);

        if ($model === null) {
            return null;
        }

        $contract = new Contract(
            ContractId::fromString($model->id),
            $model->client_name,
            $model->timezone
        );

        if ($model->is_active) {
            $contract->activate();
        }

        return $contract;
    }
}