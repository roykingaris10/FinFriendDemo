<?php

namespace App\Services;

use App\Models\Transaction;
use App\Repositories\TransactionRepositoryInterface;
use Illuminate\Support\Collection;

/**
 * TransactionService - apart of the Application layer
 * Handles business logic that interacts with the data layer
 * through a repository interface. Keeps controllers clean and promotes
 * testability, reusaibility, and adhere to DDD principles
 */

 class TransactionService 
 {
    /**
     * @var TransactionRepositoryInterface
     * This holds a reference to the repository
     * Depend on an interface (abstraction)
     */
    protected TransactionRepositoryInterface $repository;

    /**
     * Constructor-based dependency injection of the repository interface.
     * Laravel will inject the correct implementation automatically.
     */

     public function __construct(TransactionRepositoryInterface $repository)
     {
        $this->repository = $repository;
     }

     /**
      * Fetch all transactions from the repository.
      * @return Collection<Transaction> 
      */
      public function getAll(): Collection
      {
        return $this->repository->all();
      }

      /**
       * Create a new transaction.
       * @param array $data The validated transaction input
       * @return Transaction The newly created transaction model
       */
       public function create(array $data): Transaction
       {
        return $this->repository->create($data);
       }
       
       /**
        * Update an existing transaction.
        * @param string $id UUID of the transaction.
        * @param array $data Validated update data
        * @return bool True on success
        */
        public function update(string $id, array $data): bool
        {
            return $this->repository->update($id, $data);
        }

        /**
         * Delete a transaction
         * @param string $id UUID
         * @return bool
         */
        public function delete(string $id): bool 
        {
            return $this->repository->delete($id);
        }

 }