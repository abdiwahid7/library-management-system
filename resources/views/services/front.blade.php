@extends('websitelayout.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-primary mb-4">Our Services</h1>

    <div class="row">
        @forelse($services as $service)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title text-primary">{{ $service->name }}</h5>
                        <p class="card-text text-muted">{{ $service->description ?? 'No description available.' }}</p>
                        <p class="card-text"><strong>Price:</strong> ${{ number_format($service->price, 2) }}</p>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center">
                    No services available at the moment.
                </div>
            </div>
        @endforelse
    </div>

    <div class="mt-4">
        {{ $services->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
