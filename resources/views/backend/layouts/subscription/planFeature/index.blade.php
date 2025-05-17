@extends('backend.app')

@section('title', 'Subscription Features Plan')

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
                    <h3 class="mb-0">Subscription Features Plan</h3>
                    <a href="{{ route('admin.subscription.featurePlan.create') }}" class="btn btn-primary">+ Add Feature Plan</a>
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
                                        <th>Plan</th>
                                        <th>Feature</th>
                                        <th>Description</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($planFeatures as $planFeature)
                                    <tr>
                                        <td>{{ $planFeature->plan->name }}</td>
                                        <td>{{ $planFeature->feature->name }}</td>
                                        <td>{!! Str::limit($planFeature->feature->description ?? 'No Description', 50) !!}</td>
                                        <td>
                                            <a href="{{ route('admin.subscription.featurePlan.edit', $planFeature->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ route('admin.subscription.featurePlan.destroy', $planFeature->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this feature plan?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{-- {{ $planFeatures->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
