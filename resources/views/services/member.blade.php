@extends('memberlayout.member')

@section('content')
<div class="container mt-5">
    <h1 class="text-primary mb-4 text-center">Services for Members</h1>

    <div class="row">
        @forelse($services as $service)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-primary">{{ $service->name }}</h5>
                        <p class="card-text text-muted">{{ $service->description ?? 'No description available.' }}</p>
                        <p class="card-text"><strong>Price:</strong> ${{ number_format($service->price, 2) }}</p>
                        <a href="#" class="btn btn-primary btn-sm mt-auto">Book Service</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center">
                    No services available for members at the moment.
                </div>
            </div>
        @endforelse
    </div>

    <div class="mt-4">
        {{ $services->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
