<?php

declare(strict_types=1);

namespace Tests\Feature\Contract;

use App\Infrastructure\Persistence\Eloquent\Models\ContractModel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Feature tests for POST /contracts endpoint.
 *
 * These tests verify the full flow: HTTP request -> Application layer
 * -> Domain layer -> Infrastructure persistence.
 */
final class CreateContractTest extends TestCase
{
    use RefreshDatabase;

    /**
     * It should create a contract and persist it in database.
     *
     * @return void
     */
    public function test_it_creates_a_contract(): void
    {
        $payload = [
            "client_name" => "Acme Inc.",
            "timezone" => "Europe/Warsaw",
        ];

        $response = $this->postJson("/api/contracts", $payload);

        $response->assertStatus(201)
            ->assertJsonStructure(["id", "status"]);

        $this->assertDatabaseHas("contracts", [
            "client_name" => "Acme Inc.",
            "timezone" => "Europe/Warsaw",
            "is_active" => false,
        ]);

        $this->assertSame(
            1,
            ContractModel::query()->count()
        );
    }

    /**
     * It should reject request without required fields.
     *
     * @return void
     */
    public function test_it_validates_required_fields(): void
    {
        $response = $this->postJson("/api/contracts", []);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(["client_name", "timezone"]);
    }
}