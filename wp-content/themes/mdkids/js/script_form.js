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
$(document).on('click', '#next', function (e) {
	e.preventDefault();
	$('.pagination-active').removeClass( 'pagination-active');
	var left = $('#move_page_left');
	var right = $('#move_page_right');
	var all = parseInt(left.attr('data-all'));
	//создаем экземпляр класс FormData, тут будем хранить всю информацию для отправки
	$(this).parent('li').addClass("pagination-active");
	var form_data = new FormData();
	var count = parseInt($(this).attr('data-page'));
	var cat = $(this).attr('data-cat');
	if(all === count) {
		right.css({'opacity':'0.5', 'pointer-events':'none'});
		left.css({'opacity':'1', 'pointer-events':'auto'});
	} else {
		right.css({'opacity':'1', 'pointer-events':'auto'});
	}
	if(count == 1) {
		left.css({'opacity':'0.5', 'pointer-events':'none'});
		right.css({'opacity':'1', 'pointer-events':'auto'});
	}
	right.attr('data-np', count);
	left.attr('data-np', count);
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

/*left + right pagination*/
$(document).on('click', '#move_page_right', function (e) {
	e.preventDefault();
	var $current = $('.pagination__ul__li.pagination-active');
	getPageByPagination($(this), +1);
	$current.next('.pagination__ul__li').addClass('pagination-active');
	$('#move_page_left').css({'opacity':'1', 'pointer-events':'auto'});
});
$(document).on('click', '#move_page_left', function (e) {
	e.preventDefault();
	var $current = $('.pagination__ul__li.pagination-active');
	getPageByPagination($(this), -1);
	$current.prev('.pagination__ul__li').addClass('pagination-active');
	$('#move_page_right').css({'opacity':'1', 'pointer-events':'auto'});
});
/*change url*/
function changeHash(id) {
	try {
		history.replaceState(null,null,'?cur_p='+ id);
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
function getPageByPagination(button, n) {
	var form_data = new FormData();
	var cur = parseInt(button.attr('data-np'));
	var count = parseInt(button.attr('data-np')) + n;
	var all = parseInt(button.attr('data-all'));
	var cat = button.attr('data-cat');
	var left = $('#move_page_left');
	var right = $('#move_page_right');
	$('.pagination-active').removeClass( 'pagination-active');
	if(count > all) {
		count = all;
		$('.pagination__ul__li:last').addClass('pagination-active');
		right.css({'opacity':'0.5', 'pointer-events':'none'});
	}
	if(count < 1) {
		count = 1;
		$('.pagination__ul__li:first').addClass('pagination-active');
		left.css({'opacity':'0.5', 'pointer-events':'none'});
	}
	right.attr('data-np', count);
	left.attr('data-np', count);

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
}
$(document).ready(function(){
	var left = $('#move_page_left');
	var right = $('#move_page_right');
	var button = $('[data-page='+left.attr('data-np')+']');
	var last = parseInt(left.attr('data-all'));
	if(parseInt(left.attr('data-np'))) {
		changeHash(left.attr('data-np'));
	} else {
		return false;
	}
	button.parent('li').addClass("pagination-active");
	if(parseInt(button.attr('data-page')) === 1) {
		left.css({'opacity':'0.5', 'pointer-events':'none'});
	}
	if (parseInt(button.attr('data-page')) === last) {
		right.css({'opacity':'0.5', 'pointer-events':'none'});
	}
});