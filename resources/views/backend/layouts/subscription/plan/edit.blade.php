@extends('backend.app')

@section('title', 'Edit Plan')

@section('main')
<div class="app-content-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="mb-5">
                    <h3 class="mb-0">Edit Subscription Plan</h3>
                </div>
            </div>
        </div>

       <form action="{{ route('admin.subscription.plan.update', $plan->slug) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="card mb-4">
        <div class="card-body">
            <!-- Plan Type Dropdown -->
            <div class="mb-3">
                <label for="plan_type" class="form-label">Plan Type</label>
                <select class="form-select" id="plan_type" name="plan_type" required>
                    <option value="" disabled>Select plan type</option>
                    <option value="Weekly" {{ $plan->plan_type == 'Weekly' ? 'selected' : '' }}>Weekly</option>
                    <option value="Monthly" {{ $plan->plan_type == 'Monthly' ? 'selected' : '' }}>Monthly</option>
                    <option value="Yearly" {{ $plan->plan_type == 'Yearly' ? 'selected' : '' }}>Yearly</option>
                </select>
            </div>

            <!-- Description -->
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="4">{{ $plan->description }}</textarea>
            </div>

            <!-- Buttons -->
            <button type="submit" class="btn btn-primary">Update Plan</button>
            <a href="{{ route('admin.subscription.plan.index') }}" class="btn btn-light">Cancel</a>
        </div>
    </div>
</form>
    </div>
</div>
@endsection
