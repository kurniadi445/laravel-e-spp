'use strict';

$(function () {
    // tabel
    const tabelKelas = $('#tabel-kelas');

    tabelKelas.DataTable({
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
            url: `${window.location.origin}/master-data/kelas/data`
        },
        columnDefs: [
            {
                className: 'text-center',
                orderable: false,
                searchable: false,
                targets: 0
            },
            {
                orderable: false,
                searchable: false,
                targets: 2
            },
            {
                className: 'text-center',
                orderable: false,
                render: function (data, tipe, baris) {
                    return `
                        <div class="d-inline d-md-flex justify-content-md-center">
                            <a class="mr-2" href="#"><i class="fa-edit far"></i></a>
                            <a class="text-danger" href="${window.location.origin}/master-data/kelas/hapus/${baris['uuid']}"><i class="fa-trash-alt far"></i></a>
                        </div>
                    `;
                },
                searchable: false,
                targets: 3
            }
        ],
        columns: [
            {data: 'no'},
            {data: 'nama_kelas'},
            {data: 'keterangan'},
            {data: null}
        ],
        order: [],
        responsive: true,
        serverSide: true
    });
});
