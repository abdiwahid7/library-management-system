@extends('websitelayout.app')

@section('content')
<div class="container mt-5">
    <div class="text-center mb-5">
        <h1 class="text-primary fw-bold">Our Services</h1>
        <p class="text-muted">Explore the wide range of services we offer to meet your needs.</p>
    </div>

    <div class="row">
        @forelse($services as $service)
            <div class="col-lg-4 col-md-6">
                <div class="card shadow-lg border-0 h-100">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-dark fw-bold">{{ $service->name }}</h5>
                        <p class="card-text text-muted">{{ $service->description ?? 'No description available.' }}</p>
                        <p class="card-text text-success fw-bold">Price: ${{ number_format($service->price, 2) }}</p>
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

    <div class="mt-5 d-flex justify-content-center">
        {{ $services->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
