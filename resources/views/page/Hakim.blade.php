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
                            <th style="width: 10px;">#</th>
                            <th>Nama</th>
                            <th>Nip</th>
                            <th>Tempat/Tgl Lahir</th>
                            <th>Jabatan</th>
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
                        <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukan text disini...">
                        <span class="help-block text-danger"><small class="danger-alert" id="nama-alert"></small></span>
                    </div>
                    <div class="form-group mb-3">
                        <label>Nip</label>
                        <input type="number" id="nip" name="nip" class="form-control" placeholder="Masukan text disini...">
                        <span class="help-block text-danger"><small class="danger-alert" id="nip-alert"></small></span>
                    </div>
                    <div class="form-group mb-3">
                        <label>Tempat Lahir</label>
                        <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control" placeholder="Masukan text disini...">
                        <span class="help-block text-danger"><small class="danger-alert" id="tempat_lahir-alert"></small></span>
                    </div>
                    <div class="form-group mb-3">
                        <label>Tanggal Lahir</label>
                        <input type="date" id="tgl_lahir" name="tgl_lahir" class="form-control" placeholder="Masukan text disini...">
                        <span class="help-block text-danger"><small class="danger-alert" id="tgl_lahir-alert"></small></span>
                    </div>
                    <div class="form-group mb-3">
                        <label>Jabatan</label>
                        <select class="form-control" name="jabatan" id="jabatan">
                            <option value="" selected disabled>-- Select --</option>
                            <option value="hakim ketua/madya pratama">Hakim Ketua/Madya Pratama</option>
                            <option value="hakim pratama">Hakim Pratama</option>
                        </select>
                        <span class="help-block text-danger"><small class="danger-alert" id="jabatan-alert"></small></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label>Pendidikan S1</label>
                        <input type="text" id="pendidikan_s1" name="pendidikan_s1" class="form-control" placeholder="Masukan text disini...">
                        <span class="help-block text-danger"><small class="danger-alert" id="pendidikan_s1-alert"></small></span>
                    </div>
                    <div class="form-group mb-3">
                        <label>Pendidikan S2</label>
                        <input type="text" id="pendidikan_s2" name="pendidikan_s2" class="form-control" placeholder="Masukan text disini...">
                        <span class="help-block text-danger"><small class="danger-alert" id="pendidikan_s2-alert"></small></span>
                    </div>
                    <div class="form-group mb-3">
                        <label>Pendidikan S3</label>
                        <input type="text" id="pendidikan_s3" name="pendidikan_s3" class="form-control" placeholder="Masukan text disini...">
                        <span class="help-block text-danger"><small class="danger-alert" id="pendidikan_s3-alert"></small></span>
                    </div>
                    <div class="form-group mb-3">
                        <label>Nomor Sertifikan Mediator</label>
                        <input type="text" id="sertifikat_mediator" name="sertifikat_mediator" class="form-control"
                            placeholder="Masukan text disini...">
                        <span class="help-block text-danger"><small class="danger-alert" id="sertifikat_mediator-alert"></small></span>
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
            "id", "nama", "nip", "tempat_lahir", "tgl_lahir", "jabatan",
            "pendidikan_s1", "pendidikan_s2", "pendidikan_s3", "sertifikat_mediator"
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
            $.get(url + 'v1/hakim', function(result) {
                let hukum = result.data
                $('#tb-body').html('')
                $.each(hukum, function(i, value) {
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

        const alertSuccess = () => {
            $('#univModal').modal('hide')
            Swal.fire({
                icon: 'success',
                title: 'Good Job',
                text: 'Data has been saved'
            }).then((result) => {
                if (result.isConfirmed) {
                    getHukum()
                }
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
                url: url + 'v1/hakim/',
                data: dataForm,
                success: (result) => {
                    alertSuccess()
                },
                error: (err) => {
                    let response = err.responseJSON.errors
                    if (response.length > 0) {
                        $.each(response.data, (i, value) => {
                            $(`#${i}-alert`).html(value)
                        })
                        $('#btn-proccess').html('Kirim')
                        $('#btn-proccess').prop('disabled', false)
                    }
                }
            })
        })
    </script>
@endsection
