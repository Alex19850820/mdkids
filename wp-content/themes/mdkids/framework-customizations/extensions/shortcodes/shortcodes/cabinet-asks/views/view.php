<?php if ( ! defined( 'FW' ) ) {
    die( 'Forbidden' );
}
/***
  * Верстка шорткода
  * весь контент лежит в переменной $atts
 *@var $atts array
 *
 **/
	
$curr_user = wp_get_current_user();
?>
<div class="cabinet-asks mb-cabinet">
	<div class="cabinet-head">
		<h2>
			Здравствуйте,
			<span>
				<?=$curr_user->last_name?> <?=$curr_user->first_name?>
			</span>
		</h2>
	</div>
	<div class="container container_cabinet">
		<ul class="cabinet-nav" id="menu">
			<li>
				<a href="/cabinet-orders">Мои заказы</a>
			</li>
			<li>
				<a href="/cabinet-profile">Моя информация</a>
			</li>
			<li>
				<a href="/cabinet-password">Изменить пароль</a>
			</li>
			<li>
				<a href="/cabinet-social">Профили в социальных сетях</a>
			</li>
			<li>
				<a class="cabinet-nav-active" href="/cabinet-asks">Нужна помощь?</a>
			</li>
			<li>
				<a href="<?php echo wp_logout_url( '/' ); ?>">
					Выйти
				</a>
			</li>
		</ul>
		<form class="asks-block">
			<h2>
				У Вас остались вопросы?
			</h2>
			<textarea name="text" placeholder="Ваше сообщение"></textarea>
			<input name="name" value="<?=$curr_user->first_name?>" class="info-cabinet__fio__name" type="hidden" placeholder="Имя"/>
			<input name="phone" value="<?=$curr_user->phone?>" class="jsPhoneMask" type="hidden"/>
			<input name="email" value="<?=$curr_user->user_email?>" type="hidden" placeholder="Ваш e-mail"/>
			<button type="submit" id="send_form" data-form="contacts">Отправить
			</button>
		</form>
	</div>
</div>