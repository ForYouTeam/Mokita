@extends('base.Skelton')
@section('content')
    <div class="col-10">
        <div class="mb-4">
            <blockquote class="blockquote">
                <p class="mb-0 text-uppercase">Pengolahan Data Hakim.</p>
                <footer class="blockquote-footer"><cite title="Source Title">Tabel dan Form</cite></footer>
            </blockquote>
        </div>
        <div class="card shadow">
            <div class="card-body">
                <button class="btn btn-primary btn-sm mb-4" id="btnTambah">Tambah Baru</button>
                <p class="card-text text-danger">Hati-hati saat menghapus tabel yang memiliki relasi.</p>
                <table id="tableData" class="table table-bordered mb-0">
                    <thead>
                        <tr>
                            <th style="width: 50px;">#</th>
                            <th>Nama</th>
                            <th>Nip</th>
                            <th>Tempat/Tgl Lahir</th>
                            <th>Jabatan</th>
                            <th style="width: 140px;">Opsi</th>
                        </tr>
                    </thead>
                    <tbody id="tb-body">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('form')
    <form id="formData">
        <div class="row justify-content-center">
            <div class="col-lg-12 row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label>Nama</label>
                        <input type="text" id="nama" class="form-control" placeholder="Masukan text disini...">
                        <span class="help-block"><small id="nama-alert"></small></span>
                    </div>
                    <div class="form-group mb-3">
                        <label>Nip</label>
                        <input type="number" id="nip" class="form-control" placeholder="Masukan text disini...">
                        <span class="help-block"><small id="nip-alert"></small></span>
                    </div>
                    <div class="form-group mb-3">
                        <label>Tempat Lahir</label>
                        <input type="text" id="tempat_lahir" class="form-control" placeholder="Masukan text disini...">
                        <span class="help-block"><small id="tempat_lahir-alert"></small></span>
                    </div>
                    <div class="form-group mb-3">
                        <label>Tanggal Lahir</label>
                        <input type="date" id="tgl_lahir" class="form-control" placeholder="Masukan text disini...">
                        <span class="help-block"><small id="tgl_lahir-alert"></small></span>
                    </div>
                    <div class="form-group mb-3">
                        <label>Jabatan</label>
                        <select class="form-control" name="jabatan" id="jabatan">
                            <option selected disabled>-- Select --</option>
                            <option value="hakim ketua/madya pratama">Hakim Ketua/Madya Pratama</option>
                            <option value="hakim pratama">Hakim Pratama</option>
                        </select>
                        <span class="help-block"><small id="jabatan-alert"></small></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label>Pendidikan S1</label>
                        <input type="text" id="pendidikan_s1" class="form-control" placeholder="Masukan text disini...">
                        <span class="help-block"><small id="pendidikan_s1-alert"></small></span>
                    </div>
                    <div class="form-group mb-3">
                        <label>Pendidikan S2</label>
                        <input type="text" id="pendidikan_s2" class="form-control" placeholder="Masukan text disini...">
                        <span class="help-block"><small id="pendidikan_s2-alert"></small></span>
                    </div>
                    <div class="form-group mb-3">
                        <label>Pendidikan S3</label>
                        <input type="text" id="pendidikan_s3" class="form-control" placeholder="Masukan text disini...">
                        <span class="help-block"><small id="pendidikan_s3-alert"></small></span>
                    </div>
                    <div class="form-group mb-3">
                        <label>Nomor Sertifikan Mediator</label>
                        <input type="text" id="sertifikat_mediator" class="form-control"
                            placeholder="Masukan text disini...">
                        <span class="help-block"><small id="sertifikat_mediator-alert"></small></span>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('js')
    <script>
        const modalHideShow = () => {
            $('#univModal').modal('show') ? $('#univModal').modal('show') : $('#univModal').modal('hide')
        }
        const url = "{{ config('app.url') }}"
        const getHukum = () => {
            $.get(url + 'v1/hakim', function(result) {
                let hukum = result.data
                $.each(hukum, function(i, value) {
                    $('#tb-body').html('')
                    $('#tb-body').append(`
                        <tr>
                            <td>${i + 1}.</td>
                            <td>${value.nama}</td>
                            <td>${value.nip}</td>
                            <td>${value.tempat_lahir} | ${value.tgl_lahir}</td>
                            <td>${value.jabatan}</td>
                            <td>
                                <button data-id="${value.id}" type="button" class="btn btn-sm btn-outline-info">Info</button>
                                <button data-id="${value.id}" type="button" class="btn btn-sm btn-outline-danger">Delete</button>
                            </td>
                        </tr>
                    `)
                })
            })
        }
        $(document).ready(function() {
            getHukum()
            $('#tableData').DataTable();
        });
        $(document).on('click', '#btnTambah', function() {
            modalHideShow()
        });
    </script>
@endsection
