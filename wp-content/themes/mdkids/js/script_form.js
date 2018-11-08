$(document).on('click', '#next', function (e) {
	e.preventDefault();
	$('.pagination-active').removeClass( 'pagination-active');
	// $('#countItems').remove();
	var button = $(this);
	//создаем экземпляр класс FormData, тут будем хранить всю информацию для отправки
	$(this).parent('li').addClass("pagination-active");
	var form_data = new FormData();
	var count = parseInt($(this).attr('data-page'));
	var cat = $(this).attr('data-cat');
	form_data.append('action', 'get_next_page');
	form_data.append('page', count);
	form_data.append('cat', cat);
	$.ajax({
		url: myajax.url,
		type: 'post',
		data: form_data,
		contentType: false,
		processData: false,
		success: function (response) {
			var $response = $(response);
			// button.addClass("pagination-active");
			// changeHash(count);
			$('.m-1').html($response);
			dotDot();
			updateURL(count);
		}
	});
});
$(document).on('click', '#send_form', function (e) {
	e.preventDefault();
	var id = '#' + $(this).attr('data-form') + '';
	// var data = $('#'+id+'').serialize();
	var form = $(id).serialize();
	var $data = {};
	$(id).find ('input').each(function() {
		$data[this.name] = $(this).val();
	});
	// var name = $("input[name='name']").val();
	// var phone = $("input[name='phone']").val();
	var name = $data.name;
	var phone = $data.phone;
	var email = $data.email;
	var text = $("textarea[name='text']").val();


	var form_data = new FormData();
	if (name ==='') {
		alert('Введите Ваше имя!');
		return false;
	}
	if(phone === '') {
		alert('Введите номер телефона!');
		return false;
	}
	if(email === '') {
		alert('Введите номер Email!');
		return false;
	}
	if(text === '') {
		alert('Введите номер текст сообщения!');
		return false;
	}
	if(name !== '') {
		form_data.append('action', 'sendForm');
		form_data.append('name', name);
		form_data.append('phone', phone);
		form_data.append('email', email);
		form_data.append('text', text);
		$.ajax({
			url: myajax.url,
			type: 'post',
			data: form_data,
			contentType: false,
			processData: false,
			success: function (response) {
				if (response.result === 'success') {
					/*form.reset();*/
					$(id).trigger('reset');
					alert(response.message);
				} else {
					alert(response.message);
				}
			}
		});
		return false;
	} else {
		alert('Вы не заполнили все поля!');
	}
});



/*change url*/
function changeHash(id) {
	try {
		history.replaceState(null,null,'?page='+ id);
	}
	catch(e) {
		location.hash = '#id_'+id;
	}
}
function updateURL(page) {
	if (history.pushState) {
		var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?cur_p='+page+'';
		window.history.pushState({path:newurl},'',newurl);
	}
}