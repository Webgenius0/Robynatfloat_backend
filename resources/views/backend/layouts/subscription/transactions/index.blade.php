@extends('backend.app')

@section('title', 'Payment Transactions')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/dev/css/datatables.min.css') }}">
<style>
    .table-responsive {
        margin-bottom: 20px;
    }
</style>
@endpush

@section('main')
<div class="app-content-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="mb-5 d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Payment Transactions</h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="table-responsive table-card">
                            <table class="table text-nowrap mb-0 table-centered table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>User</th>
                                        <th>Amount</th>
                                        <th>Currency</th>
                                        <th>Status</th>
                                        <th>Payment Method</th>
                                        <th>Type</th>
                                        <th>Payable ID</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($payments as $payment)
                                    <tr>
                                        <td>{{ $payment->user->first_name ?? 'Unknown' }}</td>
                                        <td>${{ number_format($payment->amount, 2) }}</td>
                                        <td>{{ strtoupper($payment->currency) }}</td>
                                        <td>
                                            <span class="badge bg-{{ $payment->status == 'completed' ? 'success' : ($payment->status == 'failed' ? 'danger' : 'warning') }}">
                                                {{ ucfirst($payment->status) }}
                                            </span>
                                        </td>
                                        <td>{{ ucfirst($payment->payment_method) }}</td>
                                        <td>{{ ucfirst($payment->payable_type ? class_basename($payment->payable_type) : 'N/A') }}</td>
                                        <td>{{ $payment->payable_id }}</td>
                                        <td>{{ $payment->created_at ? $payment->created_at->format('d M Y, h:i A') : 'N/A' }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="8" class="text-center">No payment records found.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        {{-- Optional: Add pagination --}}
                        {{-- {{ $payments->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
