@extends('layouts.app')

@section('content')
    {{-- Page Header --}}
    <div class="page-header">
        <h1><i class="fas fa-plus-circle me-3"></i>Add New Transaction</h1>
        <p>Record your personal income or expense to track your financial health</p>
    </div>

    {{-- Display validation errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong><i class="fas fa-exclamation-triangle me-2"></i>There were problems with your input</strong>
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form Card --}}
    <div class="card">
        <div class="card-body p-4">
            <form action="{{ route('transactions.store') }}" method="POST">
                @csrf

                <div class="row">
                    {{-- Transaction Type --}}
                    <div class="col-md-6 mb-3">
                        <label for="type" class="form-label">
                            <i class="fas fa-exchange-alt me-2"></i>Transaction Type
                        </label>
                        <select name="type" id="type" class="form-select" required>
                            <option value="">Select Type</option>
                            <option value="income" {{ old('type') === 'income' ? 'selected' : '' }}>
                                <i class="fas fa-arrow-up"></i> Income
                            </option>
                            <option value="expense" {{ old('type') === 'expense' ? 'selected' : '' }}>
                                <i class="fas fa-arrow-down"></i> Expense
                            </option>
                        </select>
                    </div>

                    {{-- Category --}}
                    <div class="col-md-6 mb-3">
                        <label for="category" class="form-label">
                            <i class="fas fa-folder me-2"></i>Category
                        </label>
                        <input type="text" name="category" id="category" class="form-control"
                               value="{{ old('category') }}" placeholder="e.g., Food, Transport, Entertainment">
                    </div>
                </div>

                <div class="row">
                    {{-- Description --}}
                    <div class="col-md-8 mb-3">
                        <label for="description" class="form-label">
                            <i class="fas fa-tag me-2"></i>Description
                        </label>
                        <input type="text" name="description" id="description" class="form-control"
                               value="{{ old('description') }}" placeholder="e.g., Grocery shopping, Salary payment" required>
                    </div>

                    {{-- Amount --}}
                    <div class="col-md-4 mb-3">
                        <label for="amount" class="form-label">
                            <i class="fas fa-pound-sign me-2"></i>Amount (£)
                        </label>
                        <input type="number" name="amount" id="amount" class="form-control"
                               value="{{ old('amount') }}" step="0.01" min="0" placeholder="0.00" required>
                    </div>
                </div>

                <div class="row">
                    {{-- Date --}}
                    <div class="col-md-6 mb-3">
                        <label for="date" class="form-label">
                            <i class="fas fa-calendar me-2"></i>Date
                        </label>
                        <input type="date" name="date" id="date" class="form-control"
                               value="{{ old('date') }}" required>
                    </div>

                    {{-- Hidden User ID (default to first user) --}}
                    <div class="col-md-6 mb-3" style="display: none;">
                        <input type="hidden" name="user_id" value="1">
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="d-flex justify-content-center gap-2 mt-4">
                    <a href="{{ route('transactions.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times me-2"></i>Cancel
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Save Transaction
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection