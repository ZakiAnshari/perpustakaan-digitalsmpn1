@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <h4 class="fw-bold d-flex align-items-center my-4">
                <i class="bx bx-user me-2 text-primary" style="font-size: 1.5rem;"></i>
                <span class="text-muted fw-light me-1"></span> Data Anggota
            </h4>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <h5>Table Anggota</h5>
                            <div class="d-flex justify-content-between align-items-center">
                                <!-- Form Search -->
                                <form method="GET" class="d-flex align-items-center my-3" style="max-width: 350px;">
                                    <div class="input-group shadow-sm" style="height: 38px; width: 100%;">
                                        <input type="text" name="name" value="{{ request('name') }}"
                                            class="form-control border-end-0 py-2 px-3" style="font-size: 0.9rem;"
                                            placeholder="Cari  ..." aria-label="Search">
                                        <button class="btn btn-outline-primary px-3" type="submit"
                                            style="font-size: 0.9rem;">
                                            <i class="bx bx-search"></i>
                                        </button>
                                    </div>
                                </form>



                            </div>




                            <!-- Table Data -->
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Lengkap</th>
                                        <th>No Telepon</th>
                                        <th>NIS/NISN</th>
                                        <th>KELAS</th>
                                        <th>JENIS KELAMIN</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($users  as $index => $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->contact }}</td>
                                            <td>{{ $item->nisn }}</td>
                                            <td>{{ $item->kelas }}</td>
                                            <td>{{ $item->jenis_kelamin }}</td>

                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center">Data Kosong</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>




                            <!-- Pagination -->
                            {{-- <div class="d-flex justify-content-end mt-3">
                                {{ $users->appends(request()->input())->links('pagination::bootstrap-4') }}

                            </div> --}}


                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @include('sweetalert::alert')
@endsection
