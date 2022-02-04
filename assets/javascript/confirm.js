function confirm(ev) {
    ev.preventDefault();
var urlToRedirect = ev.target.offsetParent.children[0].href;
Swal.fire({ 
  title: 'Bạn có chắc muốn xóa bài hát ?',
  text: 'Hành động này không thể khôi phục lại!',
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#2cde62',
  cancelButtonColor: '#bd2a2a',
  confirmButtonText: 'Đồng ý',
  cancelButtonText: 'Từ chối'
}).then((result) => {
  if (result.isConfirmed) {
    Swal.fire(
      'Đã xóa!',
      'Bài hát đã bị xóa hoàn toàn!',
      'success',
    ).then(function() {location.href= urlToRedirect;})
  }
  else if (result.dismiss === Swal.DismissReason.cancel) {
    Swal.fire(
      'Hủy!',
      'Bài hát vẫn ở trong thùng rác',
      'error'
    )
  }
})
}
