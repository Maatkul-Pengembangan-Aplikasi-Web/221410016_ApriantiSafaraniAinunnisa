<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mahasiswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        @if (Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        <div class="ml-auto d-flex">
                            <a href="{{ route('mahasiswa/create') }}" class="btn btn-primary mr-2">Tambah Mahasiswa</a>
                            <form action="#" method="GET" class="d-flex">
                                <input type="text" name="search" class="form-control" placeholder="Pencarian"
                                    value="#">
                                <button class="btn btn-primary ml-2" type="submit">
                                    <i class="bi bi-search"></i>
                                </button>
                            </form>
                        </div>
                    </div>

                    <table class="table table-hover">
                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NPM</th>
                                <th>Program Studi</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mahasiswas as $mahasiswa)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $mahasiswa->nama }}</td>
                                    <td>{{ $mahasiswa->npm }}</td>
                                    <td>{{ $mahasiswa->prodi }}</td>
                                    <td>
                                        @if ($mahasiswa->foto)
                                            <img src="{{ asset('fotomahasiswa/' . $mahasiswa->foto) }}"
                                                alt="{{ $mahasiswa->nama }}" width="100">
                                        @else
                                            Tidak ada Fotonya
                                        @endif
                                    </td>
                                    <td>
                                    <a href="{{ route('mahasiswa/edit', $mahasiswa->id) }}"class="btn btn-secondary">Edit</a>
                                        <a href="#" type="button" class="btn btn-danger">Hapus</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>