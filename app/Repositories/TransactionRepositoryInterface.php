<?php

namespace App\Repositories;

use App\Models\Transaction;
use Illuminate\Support\Collection;

interface TransactionRepositoryInterface
{
    public function all(): Collection;
    public function create(array $data): Transaction;
    public function find(string $id): ?Transaction;
    public function update(string $id, array $data): bool;
    public function delete(string $id): bool;
}

