@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-primary"><i class="bi bi-truck"></i> Data Supplier</h2>
        <a href="{{ route('suppliers.create') }}" class="btn btn-success"><i class="bi bi-plus-lg"></i> Tambah Supplier</a>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card shadow border-0">
        <div class="card-body">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Supplier</th>
                        <th>No. Telepon</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($suppliers as $supplier)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="fw-bold">{{ $supplier->name }}</td>
                        <td>{{ $supplier->phone }}</td>
                        <td>{{Str::limit($supplier->address, 50)}}</td>
                        <td>
                            <form onsubmit="return confirm('Hapus supplier ini?');" action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST">
                                <a href="{{ route('suppliers.edit', $supplier->id) }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">Belum ada data supplier.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="mt-3">
    {{ $suppliers->links() }}
</div>
        </div>
    </div>
</div>
@endsection