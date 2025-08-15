@extends('layouts.admin')
@section('title', 'Edit')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold d-flex align-items-center my-4">


            <i class="bx bx-user me-2 text-primary" style="font-size: 1.5rem;"></i>
            <span class="text-muted fw-light me-1"></span> Edit Kategori
        </h4>
        <div class="card">
            <div class="d-flex align-items-center justify-content-between border-bottom pb-2 mb-3">
                <a class="mx-4 my-4" href="{{ route('category.index') }}">
                    <button class="btn btn-outline-primary border-1 rounded-1 px-3 py-1 d-flex align-items-center"
                        data-bs-toggle="tooltip" title="Kembali">
                        <i class="bi bi-arrow-left fs-5 mx-1"></i>
                        <span class="fw-normal">Kembali</span>
                    </button>
                </a>
            </div>


            <div class="card-body">
                <div class="text-nowrap">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ url('category-edit/' . $category->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('POST') <!-- Gunakan method PUT untuk update data -->
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="mb-3">
                                    <label for="nama_category" class="form-label">Nama Kategori</label>
                                    <input type="text" name="nama_category" class="form-control" id="nama_category"
                                        value="{{ $category->nama_category }}">
                                </div>




                            </div>



                        </div>

                        <div class="text-end btn-page mb-0 mt-4">
                            <a href="{{ route('category.index') }}" class="btn btn-outline-secondary">Batal</a>

                            <button type="submit" class="btn btn-primary">Edit</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>


    </div>

    @include('sweetalert::alert')
@endsection
