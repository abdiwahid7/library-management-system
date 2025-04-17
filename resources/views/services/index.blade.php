@extends('adminlayout.admin')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-primary">Services</h1>
        <a href="{{ route('services.create') }}" class="btn btn-success">Add Service</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        @forelse($services as $service)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title text-primary">{{ $service->name }}</h5>
                        <p class="card-text text-muted">{{ $service->description ?? 'No description available.' }}</p>
                        <p class="card-text"><strong>Price:</strong> ${{ number_format($service->price, 2) }}</p>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('services.edit', $service) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('services.destroy', $service) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this service?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center">
                    No services available. <a href="{{ route('services.create') }}">Add a new service</a>.
                </div>
            </div>
        @endforelse
    </div>

    <div class="mt-4">
        {{ $services->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
