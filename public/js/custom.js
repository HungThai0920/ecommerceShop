$(document).ready(function() {

	$('.update_cart').click(function(event) {
		event.preventDefault();
		var row_id = $(this).attr('row_id');
		var qty = $(this).parent().parent().find('.input').val();
		var token = $("input[name='_token']").val();
		if(qty > 0 ) {
			$.ajax({
				url:url_base+'/cap-nhat-gio-hang',
				type:'post',
				async:true,
				dataType:'json',
				data :{'row_id': row_id, 'qty':qty, '_token': token },
				success: function(data)
				{
					if(data.flag == 1) {
						alert(data.message)
						return false;
					} else if (data.flag == 0) {
						window.location.href = url_base +'/gio-hang.html';
					}
				}
			});
		} else {
			alert('Số lượng sản phẩm không được nhỏ hơn 1')
		}

	});

	$('.btn-add-cart').click(function (event) {
		event.preventDefault();
		let $url = $(this).attr('href');
		let $qty = $('.input-qty').val();
		let $flag = $('#flag').val();
		let $delivery_date = $('.delivery_date').val();
		let $notification = $("input[name='notification']:checked").val() !== undefined ? $("input[name='notification']:checked").val() : null;

		if($flag == 1 && $delivery_date == '') {
			$('.messageError').html('Vui chọn ngày giao hàng');
		}

		if($url) {
			$.ajax({
				url: $url,
				type: 'GET',
				async : true,
				data : {
					qty : $qty,
					delivery_date : $delivery_date,
					notification : $notification
				},
				success: function(data)
				{
					if(data.result.flag == 1) {
						alert(data.result.message)
					} else if(data.result.flag == 2) {
						alert('Thêm thành công sản phẩm vào giỏ hàng');
						let $url = window.location.href;
						window.location.href = $url;
					}
				}
			})
		}
	});

	$('.deposit').click(function () {
		$('.info-deposit').toggle();
		let flag = $('#flag').val();
		let check = flag == 0 ? 1 : 0;

		$('#flag').val(check);
	});

	$(".check-all-auto").click(function () {
		$('input.check_auto:checkbox').prop('checked', $(this).is(':checked'));
	 });

	$('.check_auto').click(function () {

		var flag = $(this).is(":checked");

		var rid = $(this).attr('rowId');
		var id_produc = $(this).attr('idProduct');
		var url = url_base+'/cap-nhat-gio-hang';
		var token = $("input[name='_token']").val();
		var flg_update = flag == true ? 1 : 0 ;

		$.ajax({
			url: url,
			type: 'POST',
			async : true,
			data : {
				status: 'update_card',
				row_id: rid,
				flagUpdate : flg_update,
				_token: token,
				idProduct : id_produc
			},
			success: function(data)
			{
				$('.rowProduct_' + id_produc).attr('rowId', data.result.rowId);
				$('.total_delete_check').html(data.result.total)
			}
		})
	})

	$('.payment-cart').click(function (e) {
		e.preventDefault();
		var errors = new Array();
		$('[name="qty_cart[]"]').each(function()
		{
			if($(this).val() < 0) {
				errors.push($(this).val());
			}
		});
		if(errors.length > 0) {
			alert('Số lượng sản phẩm không được phép nhỏ hơn 0');
		} else {
			var url = $(this).attr('href');
			window.location.href = url;
		}
	})

});