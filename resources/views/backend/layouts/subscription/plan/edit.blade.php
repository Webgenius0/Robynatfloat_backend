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
                    <div class="mb-3">
                        <label for="name" class="form-label">Plan Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $plan->name }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="monthly_price" class="form-label">Monthly Price</label>
                        <input type="number" class="form-control" id="monthly_price" name="monthly_price" value="{{ $plan->monthly_price }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="full_price" class="form-label">Full Price</label>
                        <input type="number" class="form-control" id="full_price" name="full_price" value="{{ $plan->full_price }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="4">{{ $plan->description }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Plan</button>
                    <a href="{{ route('admin.subscription.plan.index') }}" class="btn btn-light">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
