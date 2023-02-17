'use strict';

$(function () {
    // tabel
    const tabelSiswa = $('#tabel-siswa');

    tabelSiswa.DataTable({
        ajax: {
            error: function (jqXHR) {
                if (jqXHR.status === 401) {
                    let intervalWaktu;

                    Swal.fire({
                        didOpen: function () {
                            Swal.showLoading();

                            intervalWaktu = setInterval(function () {
                                Swal.getHtmlContainer().querySelector('b').textContent = (Swal.getTimerLeft() / 1000).toFixed();
                            }, 100);
                        },
                        html: 'Sesi Anda habis, Anda akan keluar dalam <b></b> detik.',
                        timer: 5000,
                        timerProgressBar: true,
                        title: 'Peringatan',
                        willClose: function () {
                            clearInterval(intervalWaktu);
                        },
                    }).then(function () {
                        window.location.assign(`${window.location.origin}/autentikasi/keluar`);
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        text: 'Terjadi kesalahan!',
                        title: 'Ups...'
                    });
                }
            },
            url: `${window.location.origin}/master-data/siswa/data`
        },
        autoWidth: false,
        columnDefs: [
            {
                className: 'text-center',
                orderable: false,
                searchable: false,
                targets: 0
            },
            {
                className: 'text-center',
                targets: [1, 2]
            },
            {
                searchable: false,
                targets: [4, 5, 6]
            },
            {
                orderable: false,
                render: function (data, tipe, baris) {
                    return `
                        <div class="d-inline d-md-flex justify-content-md-center">
                            <a class="mr-2" href="#"><i class="fa-edit far"></i></a>
                            <a class="text-danger" href="${window.location.origin}/master-data/siswa/hapus/${baris['uuid']}"><i class="fa-trash-alt far"></i></a>
                        </div>
                    `;
                },
                searchable: false,
                targets: 7
            }
        ],
        columns: [
            {data: 'no'},
            {data: 'nis'},
            {data: 'nisn'},
            {data: 'nama_lengkap'},
            {data: 'jenis_kelamin'},
            {data: 'agama'},
            {data: 'status'},
            {data: null}
        ],
        order: [],
        responsive: true,
        serverSide: true
    });
});
