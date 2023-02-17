'use strict';

$(function () {
    toastr.options = {
        closeButton: true,
        debug: false,
        extendedTimeOut: 1000,
        hideDuration: 1000,
        hideEasing: 'linear',
        hideMethod: 'fadeOut',
        newestOnTop: false,
        onclick: null,
        positionClass: 'toast-top-center',
        preventDuplicates: false,
        progressBar: false,
        showDuration: 300,
        showEasing: 'swing',
        showMethod: 'fadeIn',
        timeOut: 5000
    };

    toastr['success']('Siswa berhasil dihapus', 'Berhasil');
});
