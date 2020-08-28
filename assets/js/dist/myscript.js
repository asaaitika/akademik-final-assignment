// Pesan Data Profile
const flash = $('.flash-data').data('flashdata');

if (flash) {
    Swal.fire(
        'Profile',
        flash,
        'success'
    );
}

// Pesan Data Menu
const flashq = $('.flash-dataq').data('flashdata');

if (flashq) {
    Swal.fire(
        'Data Menu',
        flashq,
        'success'
    );
}

// Pesan Data Sub Menu
const flashw = $('.flash-dataw').data('flashdata');

if (flashw) {
    Swal.fire(
        'Data Submenu',
        flashw,
        'success'
    );
}

// Pesan Data Level
const flashe = $('.flash-datae').data('flashdata');

if (flashe) {
    Swal.fire(
        'Data Level',
        flashe,
        'success'
    );
}

// Pesan Data Level Access
const flashp = $('.flash-datap').data('flashdata');

if (flashp) {
    Swal.fire(
        'Data Level Access',
        flashp,
        'success'
    );
}

// Pesan Data User
const flashr = $('.flash-datar').data('flashdata');

if (flashr) {
    Swal.fire(
        'Data User',
        flashr,
        'success'
    );
}

const flashn = $('.flash-datan').data('flashdata');

if (flashn) {
    Swal.fire(
        'Data User',
        flashn,
        'success'
    );
}

// Tombol Konfirmasi Hapus Data
$('.tbl-hapus').on('click', function (a) {
    a.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Data ini akan dihapus",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ok!'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })
})


