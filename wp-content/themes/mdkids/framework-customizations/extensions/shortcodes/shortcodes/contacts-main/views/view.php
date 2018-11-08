<?php if ( ! defined( 'FW' ) ) {
    die( 'Forbidden' );
}
/***
  * Верстка шорткода
  * весь контент лежит в переменной $atts
 *@var $atts array
 *
 **/

?>
<section class="contacts"><hr class="pages-hr"/>
	<div class="head"><hr/>
		<div class="head__circle">
		</div>
		<h2>Контакты
		</h2>
		<div class="head__circle">
		</div><hr/>
	</div>
	<div class="container">
		<div class="contacts-block m-1">
			<div class="contacts-block__left">
				<div class="contacts-block__left__item">
					<div class="contacts-block__left__item__image"><img src="<?php bloginfo('template_url')?>/assets/images/icons/map-placeholder.svg" alt="" role="presentation"/>
					</div><span>мкр. Ботанический сад, д.22,<br> офис 31, Алматы, Казахстан</span>
				</div>
				<div class="contacts-block__left__item">
					<div class="contacts-block__left__item__image"><img src="<?php bloginfo('template_url')?>/assets/images/icons/call-answer.svg" alt="" role="presentation"/>
					</div><a class="contacts-phone" href="tel:+77273390329">+7 (727) 339 - 03 - 29</a>
				</div>
				<div class="contacts-block__left__item">
					<div class="contacts-block__left__item__image"><img src="<?php bloginfo('template_url')?>/assets/images/icons/mail.svg" alt="" role="presentation"/>
					</div><a href="mailto:info@alcor.kz">info@alcor.kz</a>
				</div>
				<div class="contacts-block__left__item">
					<div class="contacts-block__left__item__image"><img src="<?php bloginfo('template_url')?>/assets/images/icons/clock.svg" alt="" role="presentation"/>
					</div><span>Пн - Пт 9:00 - 18:00<br> Сб - Вс Выходные</span>
				</div>
			</div>
			<form class="contacts-block__right" id="contacts">
				<h3 class="contacts-block__right__head">
					У вас остались вопросы?
				</h3>
				<input type="text" name="name" placeholder="Ваше имя*"/>
				<input type="tel" name="phone" placeholder="Номер телефона*"/>
				<input type="text" name="email" placeholder="Email*"/>
				<textarea name="text" placeholder="Текст сообщения*"></textarea>
				<button type="submit" id="send_form" data-form="contacts">
					Отправить
				</button>
			</form>
		</div>
	</div>
</section>
