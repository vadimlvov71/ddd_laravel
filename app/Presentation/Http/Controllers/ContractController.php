<?php

declare(strict_types=1);

namespace App\Presentation\Http\Controllers;

use App\Application\Contract\Commands\CreateContractCommand;
use App\Application\Contract\Handlers\CreateContractHandler;
use App\Presentation\Http\Requests\CreateContractRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Ramsey\Uuid\Uuid;

/**
 * Handles HTTP requests related to Contract aggregate.
 */
final class ContractController extends Controller
{
    /**
     * @param CreateContractHandler $handler
     */
    public function __construct(private readonly CreateContractHandler $handler)
    {
    }

    /**
     * Create a new contract.
     *
     * @param CreateContractRequest $request
     * @return JsonResponse
     */
    public function store(CreateContractRequest $request): JsonResponse
    {
        $id = Uuid::uuid4()->toString();

        $command = new CreateContractCommand(
            id: $id,
            clientName: $request->string('client_name')->toString(),
            timezone: $request->string('timezone')->toString()
        );

        $this->handler->handle($command);

        return response()->json([
            'id' => $id,
            'status' => 'created',
        ], 201);
    }
}