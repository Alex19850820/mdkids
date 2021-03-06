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
		<h2>
			<?=$atts['h2']?>
		</h2>
		<div class="head__circle">
		</div><hr/>
	</div>
	<div class="container">
		<div class="contacts-block m-1">
			<div class="contacts-block__left">
				<div class="contacts-block__left__item">
					<div class="contacts-block__left__item__image">
						<img src="<?php bloginfo('template_url')?>/assets/images/icons/map-placeholder.svg" alt="" role="presentation"/>
					</div>
					<span><?=$atts['address']?></span>
				</div>
				<div class="contacts-block__left__item">
					<div class="contacts-block__left__item__image">
						<img src="<?php bloginfo('template_url')?>/assets/images/icons/call-answer.svg" alt="" role="presentation"/>
					</div>
					<a class="contacts-phone" href="tel:<?=preg_replace('![^0-9+]+!', '', $atts['phone'])?>">
						<?=$atts['phone']?>
					</a>
				</div>
				<div class="contacts-block__left__item">
					<div class="contacts-block__left__item__image">
						<img src="<?php bloginfo('template_url')?>/assets/images/icons/mail.svg" alt="" role="presentation"/>
					</div>
					<a href="mailto:<?=$atts['email']?>"><?=$atts['email']?></a>
				</div>
				<div class="contacts-block__left__item">
					<div class="contacts-block__left__item__image">
						<img src="<?php bloginfo('template_url')?>/assets/images/icons/clock.svg" alt="" role="presentation"/>
					</div>
					<span><?=$atts['time']?></span>
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
