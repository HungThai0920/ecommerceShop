$(document).ready(function() {

	$('.update_transaction').click(function() {
		var id = $(this).attr('id');
		$.ajax({
				url:url_base+'/admin/transactions/confirmTransaction',
				type:'get',
				async:true,
		 		dataType:'text',
				data :{'id': id },
				success: function(data)
				{
					if(data == 'error') {
						alert('Số lượng sản phẩm không đủ cần kiểm tra lại');
					} 
					window.location.href = url_base +'/admin/transactions/list';
				}
		});
	});

	$('.check-all').click(function()
	{
		var checkedStatus = this.checked;
		$("#checkAll tbody tr td:first-child input:checkbox").each(function()
		{
			var tr = $(this).parents('tr');
			this.checked = checkedStatus;

			if (checkedStatus == this.checked)
			{
				$(this).closest('.checker > span').removeClass('checked');
				tr.removeClass('active')
			}
			if (this.checked)
			{
				$(this).closest('.checker > span').addClass('checked');
				tr.addClass('active')
			}
		});
	});

	$('#deleteAll').click(function (e) {

		var link = $(this).attr('link');
		var _token = $(this).attr('token');

		if(!window.confirm('Bạn cân nhắc chắc chắn xóa tất cả dữ liệu sẽ không khôi phục lại được ?')) {
			e.preventDefault();
			return false;
		}

		var ids = new Array();

		$('[name="id[]"]:checked').each(function()
		{
			ids.push($(this).val());
		});

		$.ajax({
			url: link,
			type: 'POST',
			async: true,
			dataType: 'json',
			data: {
				'ids': ids,
				'_token' : _token
			},
			success: function (data) {
				$(data.ids).each(function(id, val)
				{
					//xoa cac the <tr> chua danh muc tung ung
					$('tr.row_'+val).fadeOut();
				});
			},
			error: function (xhr, ajaxOptions, thrownError) {

			}
		});
	});

	$('.shiper').change(function () {

		let shiper = $(this).val();
		let token = $(this).attr('token')
		let url = $(this).attr('url');

		$.ajax({
			url: url,
			type:'post',
			async:true,
			dataType:'json',
			data :{
				'_token' : token,
				'shiper' : shiper,
				'status' : 2
			},
			success: function(data)
			{
				if(data.code == 1) {
					alert('Cập nhật thành công');
					let urlCurrent = window.location.href;
					window.location.href = urlCurrent;
				} else {
					alert('Đã xảy ra lỗi không thể cập nhật dữ liệu');
				}
			}
		});

	});

	$('.status').change(function () {

		let status = $(this).val();
		let token = $(this).attr('token')
		let url = $(this).attr('url');

		$.ajax({
			url: url,
			type:'post',
			async:true,
			dataType:'json',
			data :{
				'_token' : token,
				'status' : status,
			},
			success: function(data)
			{
				if(data.code == 1) {
					alert('Cập nhật thành công');
					let urlCurrent = window.location.href;
					window.location.href = urlCurrent;
				}
			}
		});

	})

});