$('.btn-deal').on('click', function(e){
    e.preventDefault();
    const form = $('#winform')
    Swal.fire({
    title: 'Yakin ?',
    text: "Pelantikan ini hanya dapat dilakukan satu kali, dan tidak bisa batalkan",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Ya, Hapus',
    cancelButtonText: 'Batal'
}).then((result) => {
    if (result.isConfirmed) {
        form.submit();
    }
})
});

// Alerts Unntuk Konfirmasi Penghapusan data
$('.btn-delete').on('click', function(e){
    e.preventDefault();
    const form = $('#delete-form')
    Swal.fire({
    title: 'Yakin ?',
    text: "Tindakan ini akan menghapus data secara permanen",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Ya, Hapus',
    cancelButtonText: 'Batal'
}).then((result) => {
    if (result.isConfirmed) {
        form.submit();
    }
})
});
// Alert Reset
$('.btn-reset').on('click', function(e){
    e.preventDefault();
    const form = $('#form-reset')
    Swal.fire({
    title: 'Yakin?',
    text: "Tindakan ini akan mereset voting,",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Reset Voting',
    cancelButtonText: 'Batal'
}).then((result) => {
  if (result.isConfirmed) {
     form.submit();
  }
})
});