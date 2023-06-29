@extends('theme.app')
@section('content')
    <div id="main">
        <div class="page-heading">
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="float: left">{{ $title }}</h3>
                        <button type="button" class="btn btn-primary" style="float: right" data-bs-toggle="modal"
                            data-bs-target="#modal-tambah">
                            <i class="bi bi-plus"></i> Tambah Data
                        </button>
                    </div>
                    <div class="card-body">
                        <table class="table" id="table1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Level</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $no => $d)
                                    <tr>
                                        <td>{{ $no + 1 }}</td>
                                        <td>{{ $d->name }}</td>
                                        <td>{{ $d->email }}</td>
                                        <td>{{ $d->level }}</td>
                                        <td align="center">
                                            <a data-bs-toggle="modal" data-bs-target="#modal-edit{{ $d->id }}"
                                                class="btn icon btn-sm btn-primary"><i class="bi bi-pencil"></i></a>
                                            <a onclick="return confirm('Yakin dihapus ?')"
                                                href="{{ route('hapus_user', $d->id) }}"
                                                class="btn  icon btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>

    </div>



    {{-- modal tambah --}}
    <x-modal id="modal-tambah" size="modal-lg" title="Tambah {{ $title }}" btnSave="Y">
        <div class="row">
            <div class="col-lg-5">
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" class="form-control" name="nama">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="">Level</label>
                    <select name="level" class="form-control" id="">
                        <option value="">- Pilih Level -</option>
                        <option value="guru">guru</option>
                        <option value="siswa">siswa</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" class="form-control" name="email">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
            </div>
        </div>
        <x-multiple-input>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="">tes</label>
                    <input type="text" name="example" class="form-control">
                </div>
            </div>
        </x-multiple-input>
    </x-modal>

    {{-- modal edit --}}
    @foreach ($user as $d)
        <x-modal id="modal-edit{{ $d->id }}" size="modal-lg" title="Edit {{ $title }}" btnSave="Y">
            <div class="row">
                <div class="col-lg-5">
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" value="{{ $d->name }}" class="form-control" name="nama">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="">Level</label>
                        <select name="level" class="form-control" id="">
                            <option value="">- Pilih Level -</option>
                            <option {{ $d->level == 'guru' ? 'selected' : '' }} value="guru">guru</option>
                            <option {{ $d->level == 'siswa' ? 'selected' : '' }} value="siswa">siswa</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="">Email</label>
                        <input value="{{ $d->email }}" type="email" class="form-control" name="email">
                    </div>
                </div>
            </div>
        </x-modal>
    @endforeach
@endsection
