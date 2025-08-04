<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TransactionService;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

/**
 * Controller responsible for handling HTTP requests
 * related to transaction (create, list, delete, etc.)
 * 
 * This controller delegates all logic to the TransactionService
 * following Clean Architecture and Separation of concerns
 */

class TransactionController extends Controller
{
    /**
     * This service layer instance
     * @var TransactionService
     */

     protected TransactionService $transactionService;

     /**
      * Constructor-based dependency injection of the TransactionService.
      */

      public function __construct(TransactionService $transactionService)
      {
        $this->transactionService = $transactionService;
      }

      /**
       * Display a list of all transactions.
       * @return View;
       */

       public function index(): View
       {
            $transactions = $this->transactionService->getAll();
            return view('transactions.index', compact('transactions'));
       }

       /**
        * Show the form to create a new transaction.
        * @return View
        */

        public function create(): View
        {
            return view('transactions.create');
        }

        /**
         * Store a new transaction via the service layer.
         * 
         * @param Request $request
         * @return RedirectResponse
         */

         public function store(Request $request): RedirectResponse
         {
            $validated = $request->validate([
                'user_id' => ['nullable', 'integer'],
                'description' => ['required', 'string', 'max:255'],
                'amount' => ['required', 'numeric'],
                'date' => ['required', 'date'],
                'type' => ['required', 'in:income, expense'],
                'category' => ['nullable', 'string'],
            ]);

            // Default to user ID 1 if not provided
            $validated['user_id'] = $validated['user_id'] ?? 1;

            $this->transactionService->create($validated);
            
            return redirect()->route('transactions.index')
            ->with ('success', 'Transaction recorded successfully!');
         }
}
