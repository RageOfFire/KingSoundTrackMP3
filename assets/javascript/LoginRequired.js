function LoginRequired() {
    Swal.fire({
        icon: 'info',
        title: 'Bạn cần đăng nhập để thực hiện hành động này!',
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true
      })
}