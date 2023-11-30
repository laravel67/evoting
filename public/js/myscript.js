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
// Alerts Unntuk Konfirmasi Logout
$('.btn-out').on('click', function(e){
    e.preventDefault();
    const form = $('#out-form')
    Swal.fire({
    title: 'Yakin ?',
    text: "Anda akan keluar dari halaman dashboard",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Keluar',
    cancelButtonText: 'Batal'
}).then((result) => {
  if (result.isConfirmed) {
     form.submit();
  }
})
});
// Alerts Unntuk Konfirmasi Keluar dari Halaman voting
$('.btn-out-home').on('click', function(e){
    e.preventDefault();
    const form = $('#out-form-home')
    Swal.fire({
    title: 'Terimakasih',
    text: "Anda akan keluar dari halaman voting",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Keluar',
    cancelButtonText: 'Batal'
}).then((result) => {
    if (result.isConfirmed) {
        form.submit();
    }
})
});

// Alerts Unntuk Konfirmasi Voting
$('.btn-vote').on('click', function(e) {
    e.preventDefault();
    const form = $('#vote-form');
    const candidateId = $(this).data('candidate-id');
    const nameKetua = $(this).data('name-ketua');
    const nameWakil = $(this).data('name-wakil');
    console.log('Candidate ID:', candidateId);
    console.log('Name Ketua:', nameKetua);
    console.log('Name Wakil:', nameWakil);

    Swal.fire({
        title: 'Yakin',
        text: `Voting hanya bisa dilakukan sekali, yakin ingin memilih ${nameKetua} dan ${nameWakil} sebagai ketua BEM`,
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Voting Sekarang',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            // Update the form action with the dynamic candidate ID
            form.attr('action', '/vote/' + candidateId);
            form.submit();
        }
    });
});

// Preview Image
function previewImage(){
    const image      = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');
    imgPreview.style.display ='block';
    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0])
    oFReader.onload = function(oFREvent){
        imgPreview.src = oFREvent.target.result;
    }
}

// Trix-editor
document.addEventListener('trix-file-accept', function(e){
    e.preventDefault();
});

