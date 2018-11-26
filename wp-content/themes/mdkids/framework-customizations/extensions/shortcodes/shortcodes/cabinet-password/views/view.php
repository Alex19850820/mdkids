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
function login ($login, $pass) {
	$profile = [];
	$profile['user_login'] = $login;
	$profile['user_password'] = $pass;
	$profile['remember'] = true;
	
	$user = wp_signon( $profile, false );
	
	if ( is_wp_error($user) ) {
		echo $user->get_error_message();
	}
}
if(isset($_GET['status'])) {
	$mess = $_GET['status'];
	$arr = [
		'short' => 'Новый пароль слишком короткий, минимум 8 символов!',
		'wrong' => 'Не правильно введен пароль',
		'mismatch' => 'Пароли не совпадают',
		'required' => 'Не все заполнены поля',
		'ok' => 'Пароль изменен',
	];
	if($arr[$mess]) {
		echo $arr[$mess];
	}
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
				<a  href="/cabinet-profile">Моя информация</a>
			</li>
			<li>
				<a class="cabinet-nav-active" href="/cabinet-password">Изменить пароль</a>
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
		<form class="pass-cabinet" action="<?php echo get_stylesheet_directory_uri() ?>/includes/change-pass.php" method="POST" method="post">
			<h2>
				Изменение пароля
			</h2>
			<div class="pass-cabinet__inputs">
				<input type="password" name="pwd1" placeholder="Текущий пароль" value="<?=$_POST['pwd1'] ?? ''?>" required/>
				<input type="password" name="pwd2" placeholder="Новый пароль" value="<?=$_POST['pwd2'] ?? ''?>" required/>
				<input type="password" name="pwd3" placeholder="Повторите пароль" value="<?=$_POST['pwd3'] ?? ''?>" required/>
				<button>
					Изменить
				</button>
			</div>
		</form>
	</div>
</div>