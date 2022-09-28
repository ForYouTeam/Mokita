@extends('base.Skelton')
@section('content')
    <div class="col-10">
        <div class="mb-4">
            <blockquote class="blockquote">
                <p class="mb-0 text-uppercase">Pengolahan Data Client.</p>
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
                            <th style="width: 10px;">#</th>
                            <th>Nama</th>
                            <th>Marga</th>
                            <th>Tempat/Tgl Lahir</th>
                            <th>Status</th>
                            <th style="width: 100px;">Opsi</th>
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
                        <input type="hidden" name="id" id="id">
                        <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukan text disini...">
                        <span class="help-block text-danger"><small class="danger-alert" id="nama-alert"></small></span>
                    </div>
                    <div class="form-group mb-3">
                        <label>Marga</label>
                        <input type="text" id="marga" name="marga" class="form-control" placeholder="Masukan text disini...">
                        <span class="help-block text-danger"><small class="danger-alert" id="marga-alert"></small></span>
                    </div>
                    <div class="form-group mb-3">
                        <label>Tempat Lahir</label>
                        <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control" placeholder="Masukan text disini...">
                        <span class="help-block text-danger"><small class="danger-alert" id="tempat_lahir-alert"></small></span>
                    </div>
                    <div class="form-group mb-3">
                        <label>Tanggal Lahir</label>
                        <input type="date" id="tgl_lahir" name="tgl_lahir" class="form-control">
                        <span class="help-block text-danger"><small class="danger-alert" id="tgl_lahir-alert"></small></span>
                    </div>
                    <div class="form-group mb-3">
                        <label>Agama</label>
                        <select class="form-control" name="agama" id="agama">
                            <option value="" selected disabled>-- Select --</option>
                            <option value="islam">Islam</option>
                            <option value="kristen">Kristen</option>
                            <option value="hindu">hindu</option>
                            <option value="budha">budha</option>
                            <option value="lainnya">lainnya</option>
                        </select>
                        <span class="help-block text-danger"><small class="danger-alert" id="agama-alert"></small></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label>Pendidikan</label>
                        <input type="text" id="pendidikan" name="pendidikan" class="form-control" placeholder="Masukan text disini...">
                        <span class="help-block text-danger"><small class="danger-alert" id="pendidikan-alert"></small></span>
                    </div>
                    <div class="form-group mb-3">
                        <label>Pekerjaan</label>
                        <input type="text" id="pekerjaan" name="pekerjaan" class="form-control" placeholder="Masukan text disini...">
                        <span class="help-block text-danger"><small class="danger-alert" id="pekerjaan-alert"></small></span>
                    </div>
                    <div class="form-group mb-3">
                        <label>Kelurahan</label>
                        <input type="text" id="kelurahan" name="kelurahan" class="form-control" placeholder="Masukan text disini...">
                        <span class="help-block text-danger"><small class="danger-alert" id="kelurahan-alert"></small></span>
                    </div>
                    <div class="form-group mb-3">
                        <label>Kecamatan</label>
                        <input type="text" id="kecamatan" name="kecamatan" class="form-control" placeholder="Masukan text disini...">
                        <span class="help-block text-danger"><small class="danger-alert" id="kecamatan-alert"></small></span>
                    </div>
                    <div class="form-group mb-3">
                        <label>kabupaten</label>
                        <input type="text" id="kabupaten" name="kabupaten" class="form-control" placeholder="Masukan text disini...">
                        <span class="help-block text-danger"><small class="danger-alert" id="kabupaten-alert"></small></span>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group mb-3">
                        <label>Status</label>
                        <select class="form-control" name="status" id="status">
                            <option value="" selected disabled>-- Select --</option>
                            <option value="penggugat">Penggugat</option>
                            <option value="tergugat">Tergugat</option>
                        </select>
                        <span class="help-block text-danger"><small class="danger-alert" id="status-alert"></small></span>
                    </div>
                    <div class="form-group mb-3">
                        <label>Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="4" placeholder="Masukan text disini"></textarea>
                        <span class="help-block text-danger"><small class="danger-alert" id="alamat-alert"></small></span>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('js')
    <script>
        const url = "{{ config('app.url') }}"

        const fieldList = [
            "id", "status", "nama", "marga", "tempat_lahir", "tgl_lahir", "agama", "pendidikan",
            "pekerjaan", "alamat", "kelurahan", "kecamatan", "kabupaten",
        ]

        const clearInput = () => {
            $.each(fieldList, (i, value) => {
                $(`#${value}`).val('')
            })
            $('.danger-alert').html('')
            $('#btn-proccess').html('Kirim')
            $('#btn-proccess').prop('disabled', false)
        }

        const getHukum = () => {
            $.get(url + 'v1/client', function(result) {
                let hukum = result.data
                $('#tb-body').html('')
                $.each(hukum, function(i, value) {
                    $('#tb-body').append(`
                        <tr>
                            <td>${i + 1}.</td>
                            <td>${value.nama}</td>
                            <td>${value.marga}</td>
                            <td>${value.tempat_lahir} | ${value.tgl_lahir}</td>
                            <td>${value.status}</td>
                            <td>
                                <button id="btn-info" data-id="${value.id}" type="button" class="btn btn-sm btn-outline-info">Info</button>
                                <button id="btn-del" data-id="${value.id}" type="button" class="btn btn-sm btn-outline-danger">Delete</button>
                            </td>
                        </tr>
                    `)
                })
            })
        }

        const alertSuccess = (params) => {
            $('#univModal').modal('hide')
            Swal.fire({
                icon: 'success',
                title: 'Kerja bagus',
                text: params
            }).then((result) => {
                if (result.isConfirmed) {
                    clearInput()
                    getHukum()
                }
            })
        }
        const alertError = () => {
            $('#univModal').modal('hide')
            Swal.fire({
                icon: 'warning',
                title: 'Ada yang salah',
                text: 'Periksa apakah tabel memiliki relasi atau tidak!'
            })
        }

        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            getHukum()
            $('#tableData').DataTable();
        });
        $(document).on('click', '#btnTambah', function() {
            clearInput()
            $('#univModal').modal('show')
        });

        $(document).on('click', '#btn-proccess', function() {
            $(this).html('Loading...')
            $(this).prop('disabled', true)

            let dataForm = $('#formData').serialize()
            $.ajax({
                type: "POST",
                url: url + 'v1/client/',
                data: dataForm,
                success: (result) => {
                    alertSuccess('Data berhasil di simpan')
                },
                error: (err) => {
                    let response = err.responseJSON.errors
                    if (err.status == 422) {
                        $.each(response.data, (i, value) => {
                            $(`#${i}-alert`).html(value)
                        })
                        $('#btn-proccess').html('Kirim')
                        $('#btn-proccess').prop('disabled', false)
                    } else {
                        alertError()
                    }
                }
            })
        })

        $(document).on('click', '#btn-info', function() {
            let _id = $(this).data('id')
            clearInput()
            $.get(url + 'v1/client/' + _id, (result) => {
                $.each(result.data, (i, value) => {
                    $(`#${i}`).val(value)
                })
                $('#univModal').modal('show')
            })
        })

        $(document).on('click', '#btn-del', function() {
            let _id = $(this).data('id')
            Swal.fire({
                title: 'Apa kau yakin?',
                text: "Data akan dihapus secara permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Batal',
                confirmButtonText: 'Ya, hapus itu!'
                }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "DELETE",
                        url : url + 'v1/client/' + _id,
                        success: (result) => {
                            alertSuccess('Data berhasil dihapus')
                        },
                        error: (err) => {
                            alertError()
                        }
                    })
                }
            })
        })
    </script>
@endsection
