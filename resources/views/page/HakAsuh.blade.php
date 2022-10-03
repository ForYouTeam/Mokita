@extends('base.Skelton')
@section('content')
    <div class="col-10">
        <div class="mb-4">
            <blockquote class="blockquote">
                <p class="mb-0 text-uppercase">Pengolahan Data Hak Asuh.</p>
                <footer class="blockquote-footer"><cite title="Source Title">Tabel dan Form</cite></footer>
            </blockquote>
        </div>
        <div class="card shadow">
            <div class="card-body">
                <button class="btn btn-primary btn-sm mb-4" id="btnTambah" disabled>Tambah Baru</button>
                <p class="card-text text-danger">Hati-hati saat menghapus tabel yang memiliki relasi.</p>
                <table id="tableData" class="table table-bordered mb-0">
                    <thead>
                        <tr>
                            <th style="width: 10px;">#</th>
                            <th style="width: 300px;">Hak Asuh</th>
                            <th style="padding-left: 35px">Anak</th>
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
                <div class="col-md-12">
                    <div class="form-group mb-3">
                        <label>Nama</label>
                        <input type="hidden" name="id" id="id_hakasuh">
                        <input type="text" id="hak_asuh" name="hak_asuh" class="form-control" placeholder="Masukan text disini...">
                        <span class="help-block text-danger"><small class="danger-alert" id="hak_asuh-alert"></small></span>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <form id="formDataSecond">
        <div class="row justify-content-center">
            <div class="col-lg-12 row">
                <div class="col-md-12">
                    <div class="form-group mb-3">
                        <label>Nama</label>
                        <input type="hidden" name="id" id="id">
                        <input type="hidden" name="id_detail_anak" id="id_detail_anak">
                        <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukan text disini...">
                        <span class="help-block text-danger"><small class="danger-alert" id="hak_asuh-alert"></small></span>
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
                </div>
                <div class="col-md-12">
                    <button id="btn-tmbah-anak" type="button" class="btn btn-primary float-right">Proccess</button>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('js')
    <script>
        const url = "{{ config('app.url') }}"

        const fieldList = [
            "id", "id_hakasuh", "hak_asuh", "id_detail_anak", 
            "nama", "tempat_lahir", "tgl_lahir"
        ]

        const clearInput = () => {
            $.each(fieldList, (i, value) => {
                $(`#${value}`).val('')
            })
            $('.danger-alert').html('')
            $('#btn-proccess').html('Kirim')
            $('#btn-proccess').prop('disabled', false)
        }

        const getHakAsuh = () => {
            $.get(url + 'v1/detail_anak', function(result) {
                $('#btnTambah').prop('disabled', false)
                let hukum = result.data
                $('#tb-body').html('')
                $.each(hukum, function(i, value) {
                    $('#tb-body').append(`
                        <tr class="text-capitalize">
                            <td style="vertical-align: text-top !important">${i + 1}.</td>
                            <td style="vertical-align: text-top !important">${value.hak_asuh}</td>
                            <td>
                                <div class="row" style="padding-left: 40px">
                                    <ol class="float-left col-md-9 row" id="${value.id}-tb"></ol>
                                    <div class="float-right col-md-3">
                                        <button id="anakList" data-id="${value.id}" class="btn btn-sm btn-white rounded text-primary">Tambah Anak <span class="fe fe-21 fe-external-link"></span></button>
                                    </div>    
                                </div>
                            </td>
                            <td style="vertical-align: text-top !important">
                                <button id="btn-edit" data-id="${value.id}" type="button" class="btn btn-sm btn-outline-primary">Edit</button>
                                <button id="btn-del" data-id="${value.id}" type="button" class="btn btn-sm btn-outline-danger">Delete</button>
                            </td>
                        </tr>
                    `)
                    $.each(value.anak, (x, item) => {
                        $(`#${value.id}-tb`).append(`
                          <div class="col-sm-10">
                            <li>
                              ${item.nama}
                            </li>
                          </div>
                          <div class="col-sm-2">
                            <button type="button" data-id="${item.id}" id="btn-del-anak" class="text-danger btn-white btn btn-sm"><span class="fe fe-23 fe-trash-2"></span></button>
                          </div>
                        `)
                    })
                })
            })
        }

        function showing() {
            $('#univModal').modal('show')
            $('#formDataSecond').hide()
            $('#formData').show()
            $('.md-footer').show()
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
                    getHakAsuh()
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
            getHakAsuh()
            $('#tableData').DataTable();
        });
        $(document).on('click', '#btnTambah', function() {
            clearInput()
            showing()
        });

        $(document).on('click', '#btn-proccess', function() {
            $(this).html('Loading...')
            $(this).prop('disabled', true)

            let dataForm = $('#formData').serialize()
            $.ajax({
                type: "POST",
                url: url + 'v1/detail_anak',
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

        $(document).on('click', '#anakList', function() {
            let _id = $(this).data('id')

            $('#univModal').modal('show')
            $('#formDataSecond').show()
            $('#formData').hide()
            $('.md-footer').hide()
            $('#id_detail_anak').val(_id)
        })

        $(document).on('click', '#btn-tmbah-anak', function() {
            let data = $('#formDataSecond').serialize()
            $(this).html('Loading...')
            $(this).prop('disabled', true)
            $.ajax({
                type: "POST",
                url: url + 'v1/anak',
                data: data,
                success: (res) => {
                    $('#univModal').modal('hide')
                    alertSuccess('Data berhasil di simpan')
                    $(this).html('Proses')
                    $(this).prop('disabled', false)
                },
                error: (err) => {
                    alertError()
                    $(this).html('Proses')
                    $(this).prop('disabled', false)
                }
            })
        })

        $(document).on('click', '#btn-del-anak', function () {
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
                        url : url + 'v1/anak/' + _id,
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

        $(document).on('click', '#btn-edit', function() {
            let _id = $(this).data('id')
            clearInput()
            $.get(url + 'v1/detail_anak/' + _id, (result) => {
                let data = result.data
                $('#id_hakasuh').val(data.id)
                $('#hak_asuh').val(data.hak_asuh)
                showing()
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
                        url : url + 'v1/detail_anak/' + _id,
                        success: (result) => {
                            alertSuccess('Data berhasil dihapus')
                        },
                        error: (err) => {
                            alertError()
                            console.log(err.responseJSON);
                        }
                    })
                }
            })
        })
    </script>
@endsection
