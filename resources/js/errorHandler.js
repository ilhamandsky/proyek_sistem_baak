document.addEventListener("DOMContentLoaded", function () {
    // Cek apakah ada elemen dengan class 'error-message'
    const errorMessages = document.querySelectorAll(".error-message");

    errorMessages.forEach((msg) => {
        setTimeout(() => {
            msg.style.display = "none";
        }, 5000); // Hilangkan pesan error setelah 5 detik
    });

    // Tambahkan konfirmasi saat menghapus
    const deleteButtons = document.querySelectorAll(".delete-btn");

    deleteButtons.forEach((button) => {
        button.addEventListener("click", function (event) {
            const confirmDelete = confirm("Apakah Anda yakin ingin menghapus data ini?");
            if (!confirmDelete) {
                event.preventDefault();
            }
        });
    });
});



