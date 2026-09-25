<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Eloquent\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Eloquent model for contracts table.
 *
 * @property string $id
 * @property string $client_name
 * @property string $timezone
 * @property bool $is_active
 */
final class ContractModel extends Model
{
    protected $table = 'contracts';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'client_name',
        'timezone',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}