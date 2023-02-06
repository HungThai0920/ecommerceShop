$(document).ready(function(){

    $('a.option-delete-modal').confirm({
        title: 'Bạn có chắc chắn muốn xóa dữ liệu ?',
        content: "...",
        buttons: {
            confirm: {
                text: 'Xác nhận',
                btnClass: 'btn-blue',
                action: function () {
                    location.href = this.$target.attr('href');
                }
            },
            cancel: {
                text: 'Hủy',
                action: function () {
                }
            }
        }
    });
    
});