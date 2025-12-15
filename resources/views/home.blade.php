@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-12">
            <h2 class="fw-bold text-dark">👋 Selamat Datang, {{ Auth::user()->name }}!</h2>
            <p class="text-muted">Berikut adalah ringkasan data inventaris Anda hari ini.</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card text-white bg-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs fw-bold text-uppercase mb-1">Total Kategori</div>
                            <div class="h1 mb-0 fw-bold">{{ $totalCategories }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-tags-fill display-4 text-white-50"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-0">
                    <a href="{{ route('categories.index') }}" class="text-white text-decoration-none small">
                        Lihat Detail <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card text-white bg-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs fw-bold text-uppercase mb-1">Total Supplier</div>
                            <div class="h1 mb-0 fw-bold">{{ $totalSuppliers }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-truck display-4 text-white-50"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-0">
                    <a href="{{ route('suppliers.index') }}" class="text-white text-decoration-none small">
                        Lihat Detail <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card text-white bg-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs fw-bold text-uppercase mb-1 text-dark">Total Produk</div>
                            <div class="h1 mb-0 fw-bold text-dark">{{ $totalProducts }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-box-seam-fill display-4 text-dark-50"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-0">
                    <a href="{{ route('products.index') }}" class="text-dark text-decoration-none small">
                        Lihat Detail <i class="bi bi-arrow-right text-dark"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header bg-white py-3">
                    <h6 class="m-0 fw-bold text-primary">Aksi Cepat</h6>
                </div>
                <div class="card-body">
                    <a href="{{ route('products.create') }}" class="btn btn-outline-primary me-2">
                        <i class="bi bi-plus-circle"></i> Tambah Produk Baru
                    </a>
                    <a href="{{ route('categories.create') }}" class="btn btn-outline-secondary me-2">
                        <i class="bi bi-plus-circle"></i> Tambah Kategori
                    </a>
                    <a href="{{ route('suppliers.create') }}" class="btn btn-outline-success">
                        <i class="bi bi-plus-circle"></i> Tambah Supplier
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection