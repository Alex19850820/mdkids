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
if(!$curr_user->ID) {
	wp_safe_redirect( '/' );
}
?>
<div class="cabinet-info mb-cabinet">
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
				<a class="cabinet-nav-active" href="/cabinet-profile">Моя информация</a>
			</li>
			<li>
				<a href="/cabinet-password">Изменить пароль</a>
			</li>
			<li>
				<a href="/cabinet-social">Профили в социальных сетях</a>
			</li>
			<li>
				<a href="/cabinet-asks">Нужна помощь?</a>
			</li>
			<li>
				<a href="<?php echo wp_logout_url( '/' ); ?>">
					Выйти
				</a>
			</li>
		</ul>
		<form class="info-cabinet" action="<?php echo get_stylesheet_directory_uri() ?>/includes/profile-update.php" method="POST">
			<h2>
				Мои данные
			</h2>
			<div class="info-cabinet__fio">
				<input name="last_name" value="<?=$curr_user->last_name?>" class="info-cabinet__fio__family" type="text" placeholder="Фамилия"/>
				<input name="first_name" value="<?=$curr_user->first_name?>" class="info-cabinet__fio__name" type="text" placeholder="Имя"/>
				<input name="patronymic" value="<?=$curr_user->patronymic?>" class="info-cabinet__fio__patronymic" type="text" placeholder="Отчество"/>
			</div>
			<div class="info-cabinet__mail">
				<p>
					Ваш e-mail
				</p>
				<input name="email" value="<?=$curr_user->user_email?>" type="tel" placeholder="Ваш e-mail"/>
				<button>
					Изменить
				</button>
			</div>
			<div class="info-cabinet__phone">
				<p>
					Телефон
				</p>
				<input name="phone" value="<?=$curr_user->phone?>" class="jsPhoneMask" type="tel" placeholder="+7 (___) ___-__-__"/>
			</div>
<!--			<div class="info-cabinet__birthday">-->
<!--				<p>День рождения-->
<!--				</p>-->
<!--				<select class="info-cabinet__birthday__number jsBirthday">-->
<!--					--><?php //for ($i =0; $i <= 31;  $i++);?>
<!--					<option>1-->
<!--					</option>-->
<!--				</select>-->
<!--				<select class="info-cabinet__birthday__month jsBirthday">-->
<!--					<option>Январь-->
<!--					</option>-->
<!--					<option>Февраль-->
<!--					</option>-->
<!--					<option>Март-->
<!--					</option>-->
<!--				</select>-->
<!--				<select class="info-cabinet__birthday__year jsBirthday">-->
<!--					<option>1994-->
<!--					</option>-->
<!--					<option>1995-->
<!--					</option>-->
<!--					<option>1996-->
<!--					</option>-->
<!--				</select>-->
<!--			</div>-->
			<div class="info-cabinet__gender">
				<p>Пол
				</p>
				<div class="gender-block">
					<div class="gender-switch jsGenderSwitch <?=($curr_user->sex == 'men') ? '': 'gender-switch-right'?>">
					</div>
					<div class="left-gender">
						<input class="radio" type="radio" name="sex" checked="" id="radio1" value="men"/>
						<label class="jsLeftGender <?=($curr_user->sex == 'men') ? 'gender-active-label': ''?>" for="radio1">
							Мужской
						</label>
					</div>
					<div class="right-gender">
						<input class="radio" type="radio" name="sex" checked=""id="radio2" value="women"/>
						<label class="jsRightGender <?=($curr_user->sex == 'women') ? 'gender-active-label': ''?>" for="radio2">
							Женский
						</label>
					</div>
				</div>
			</div>
			<button type="submit" class="info-cabinet__save">
				Сохранить
			</button>
		</form>
	</div>
</div>
