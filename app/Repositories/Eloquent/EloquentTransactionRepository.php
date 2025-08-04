<?php

namespace App\Repositories\Eloquent;

use App\Models\Transaction;
use App\Repositories\TransactionRepositoryInterface;
use Illuminate\Support\Collection;

class EloquentTransactionRepository implements TransactionRepositoryInterface
{
    public function all(): Collection
    {
        return Transaction::all();
    }

    public function create(array $data): Transaction
    {
        return Transaction::create($data);
    }

    public function find(string $id): ?Transaction
    {
        return Transaction::find($id);
    }

    public function update(string $id, array $data): bool
    {
        $transaction = Transaction::find($id);
        return $transaction ? $transaction->update($data) : false;
    }

    public function delete(string $id): bool
    {
        $transaction = Transaction::find($id);
        return $transaction ? $transaction->delete() : false;
    }
}
