<script>
window.addEventListener('btn-delete', even => {
    Swal.fire({
        title: "Yakin",
        text: "Tindakan ini akan menghapus data secara permanen",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Hapus"
    }).then((result) => {
        if (result.isConfirmed) {
            Livewire.dispatch('deleteConfirmed')
        }
    });
});
window.addEventListener('success', even => {
    Swal.fire({
        title: 'Succeed',
        icon: 'success',
        text: event.detail.message,
    });
});
</script>
