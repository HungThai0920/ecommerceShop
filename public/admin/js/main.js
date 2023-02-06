// Confirm delete data 
function confirmDelete(msg){
	if(window.confirm(msg)){
		return true;
	}
	else{
		return false;
	}
}


function  readURL(input,thumbimage) {

   if  (input.files && input.files[0]) {
   var  reader = new FileReader();
    reader.onload = function (e) {
    $("#thumbimage").attr('src', e.target.result);
     }
     reader.readAsDataURL(input.files[0]);
    }
    else  { // Sử dụng cho IE
      $("#thumbimage").attr('src', input.value);
    }
    $("#thumbimage").show();
    $('.filename').text($("#uploadfile").val());
    $('.Choicefile').css('background', '#C4C4C4');
    $('.Choicefile').css('cursor', 'default');
    $(".removeimg").show();
    $(".Choicefile").unbind('click');
}


$(".removeimg").click(function () {
	$("#thumbimage").attr('src', '').hide();
	$("#myfileupload").html('<input type="file" id="uploadfile"  onchange="readURL(this);" />');
	$(".removeimg").hide();
	$(".Choicefile").bind('click', function  () {
	$("#uploadfile").click();
	});
	$('.Choicefile').css('background','#0877D8');
	$('.Choicefile').css('cursor', 'pointer');
	$(".filename").text("");
});