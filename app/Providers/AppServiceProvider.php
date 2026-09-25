<?php

declare(strict_types=1);

namespace App\Providers;

use App\Domain\Contract\Repositories\ContractRepositoryInterface;
use App\Infrastructure\Persistence\Eloquent\Repositories\EloquentContractRepository;
use Illuminate\Support\ServiceProvider;

/**
 * Application service provider for DI bindings.
 */
final class AppServiceProvider extends ServiceProvider
{
    /**
     * Register application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(ContractRepositoryInterface::class, EloquentContractRepository::class);
    }
}