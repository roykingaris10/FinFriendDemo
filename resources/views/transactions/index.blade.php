@extends('layouts.app')

@section('content')
    {{-- Page Header --}}
    <div class="page-header">
        <h1><i class="fas fa-chart-pie me-3"></i>My Financial Dashboard</h1>
        <p>Track your personal income, expenses, and financial health at a glance</p>
    </div>

    {{-- Financial Summary Cards --}}
    <div class="financial-summary">
        <div class="summary-card income">
            <h3><i class="fas fa-arrow-up me-2"></i>Total Income</h3>
            <div class="amount">£{{ number_format($transactions->where('type', 'income')->sum('amount'), 2) }}</div>
            <small>{{ $transactions->where('type', 'income')->count() }} transactions</small>
        </div>

        <div class="summary-card expense">
            <h3><i class="fas fa-arrow-down me-2"></i>Total Expenses</h3>
            <div class="amount">£{{ number_format($transactions->where('type', 'expense')->sum('amount'), 2) }}</div>
            <small>{{ $transactions->where('type', 'expense')->count() }} transactions</small>
        </div>

        <div class="summary-card balance">
            <h3><i class="fas fa-wallet me-2"></i>Net Balance</h3>
            <div class="amount">£{{ number_format($transactions->where('type', 'income')->sum('amount') - $transactions->where('type', 'expense')->sum('amount'), 2) }}</div>
            <small>Income - Expenses</small>
        </div>
    </div>

    {{-- Action Buttons --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0"><i class="fas fa-list me-2"></i>Transaction History</h2>
        <a href="{{ route('transactions.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>New Transaction
        </a>
    </div>

    {{-- Transactions Table --}}
    <div class="card">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th><i class="fas fa-tag me-2"></i>Description</th>
                        <th><i class="fas fa-pound-sign me-2"></i>Amount</th>
                        <th><i class="fas fa-exchange-alt me-2"></i>Type</th>
                        <th><i class="fas fa-folder me-2"></i>Category</th>
                        <th><i class="fas fa-calendar me-2"></i>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($transactions as $transaction)
                    <tr>
                        <td>
                            <strong>{{ $transaction->description }}</strong>
                        </td>
                        <td class="{{ $transaction->type === 'expense' ? 'text-danger' : 'text-success' }}">
                            <strong>£{{ number_format($transaction->amount, 2) }}</strong>
                        </td>
                        <td>
                            <span class="badge {{ $transaction->type === 'income' ? 'bg-success' : 'bg-danger' }}">
                                <i class="fas fa-{{ $transaction->type === 'income' ? 'arrow-up' : 'arrow-down' }} me-1"></i>
                                {{ ucfirst($transaction->type) }}
                            </span>
                        </td>
                        <td>
                            @if($transaction->category)
                                <span class="badge bg-secondary">{{ $transaction->category }}</span>
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>{{ $transaction->date->format('M d, Y') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-4">
                            <i class="fas fa-inbox fa-3x text-muted mb-3 d-block"></i>
                            <p class="text-muted mb-0">No transactions recorded yet.</p>
                            <small class="text-muted">Start by adding your first transaction!</small>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection