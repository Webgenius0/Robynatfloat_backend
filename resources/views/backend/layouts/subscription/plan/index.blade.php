@extends('backend.app')

@section('title', 'Subscription Plans')

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
                    <h3 class="mb-0">Subscription Plans</h3>
                    <a href="{{ route('admin.subscription.plan.create') }}" class="btn btn-primary">+ Add Plan</a>
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
                                        <th>Plan Type</th>
                                        <th>Description</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($plans as $plan)
                                    <tr>
                                        <td>{{ $plan->plan_type }}</td>
                                        <td>{{ $plan->description }}</td>
                                        <td>
                                            <a href="{{ route('admin.subscription.plan.edit', $plan->slug) }}" class="btn btn-sm btn-warning">Edit</a>

                                            <form action="{{ route('admin.subscription.plan.destroy', $plan->slug) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this plan?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $plans->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
