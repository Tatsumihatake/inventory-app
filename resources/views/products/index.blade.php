@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-dark"><i class="bi bi-box-seam"></i> Daftar Produk</h2>
        <a href="{{ route('products.create') }}" class="btn btn-warning fw-bold"><i class="bi bi-plus-lg"></i> Tambah Produk</a>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card shadow border-0">
        <div class="card-body">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th> <th>Supplier</th> <th>Harga</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="fw-bold">{{ $product->name }}</td>
                        
                        <td><span class="badge bg-info text-dark">{{ $product->category->name }}</span></td>
                        
                        <td><small class="text-muted">{{ $product->supplier->name }}</small></td>
                        
                        <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                        
                        <td>
                            @if($product->stock < 10)
                                <span class="text-danger fw-bold">{{ $product->stock }} (Menipis!)</span>
                            @else
                                <span class="text-success">{{ $product->stock }}</span>
                            @endif
                        </td>
                        
                        <td>
                            <form onsubmit="return confirm('Hapus produk ini?');" action="{{ route('products.destroy', $product->id) }}" method="POST">
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-5">
                            <img src="https://cdn-icons-png.flaticon.com/512/4076/4076432.png" width="80" class="mb-3 opacity-50">
                            <p class="text-muted">Belum ada produk. Silakan tambah produk baru.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection