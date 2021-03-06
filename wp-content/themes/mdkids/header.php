<?php
//var_dump($_SERVER['HTTP_REFERER']);
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mdkids
 */
// получаем объект пользователя с необходимыми данными
$user_ID = get_current_user_id();
$contacts = fw_get_db_customizer_option();
if($_GET['language']) {
	$lang = ($_GET['language'] == 'ru') ? 'ru_RU' : 'en_US';
	switch_to_locale($lang);
}
$category = [];
foreach (get_categories() as $item) {
	if($item->slug != 'news'&&$item->name != 'Без рубрики' ){
		$category[$item->slug] = $item->name;
	}
}
$table_name = $wpdb->prefix . 'orders';
global $wpdb;
$basket = $wpdb->get_results("SELECT SUM(`count_p`) as count FROM $table_name WHERE `user_id` =".$user_ID." AND `status` = 0 ");
if(isset($_GET['login']) && $_GET['login'] == 'failed')
{
	?>
	<div id="login-error" style="background-color: #FFEBE8;border:1px solid #C00;padding:5px;">
		<p><?php esc_html_e('Login failed: Login or password entered incorrectly. Try again.', 'mdkids')?></p>
	</div>
	<?php
}
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php the_title()?></title>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="header">
	<div class="header-contacts">
		<div class="header-contacts__left">
			<a href="tel:<?=preg_replace('![^0-9+]+!', '', $contacts['phone'])?>">
				<?=$contacts['phone']?>
				<img src="<?php bloginfo('template_url')?>/assets/images/icons/call-answer.svg" alt="" role="presentation"/>
			</a>
			<a href="mailto:<?=$contacts['email']?>"><?=$contacts['email']?>
				<img src="<?php bloginfo('template_url')?>/assets/images/icons/mail.svg" alt="" role="presentation"/></a>
			<a href="<?=$contacts['instagram']?>">
				Instagtam
				<img src="<?php bloginfo('template_url')?>/assets/images/icons/insta.svg" alt="" role="presentation"/>
			</a>
		</div>
		<?php if(!$user_ID):?>
			<div class="header-contacts__right">
				<a href="#" class="jsLogin">
					<?php esc_html_e('Enter', 'mdkids')?>
				</a>
				<hr/>
				<a href="#" class="jsReg">
					<?php esc_html_e('Signup', 'mdkids')?>
				</a>
			</div>
		<?php endif;?>
		<?php if($user_ID):?>
			<a class="login pc-login" href="/cabinet-profile">
				<?php esc_html_e('Cabinet Profile', 'mdkids')?>
				<img src="assets/images/icons/black-male-user-symbol.svg" alt="" role="presentation"/>
			</a>
		<?php endif;?>
	</div>
	<hr/>
	<div class="nav-menu">
		<div class="mob-menu jsMobMenu"><span></span><span></span><span></span>
		</div>
		<div class="overlay">
		</div>
		<ul class="nav-menu__left jsMenu">
			<?php if($user_ID):?>
				<li class="mob-login">
					<a class="login" href="/cabinet-profile">
						<?php esc_html_e('Cabinet Profile', 'mdkids')?>
						<img src="assets/images/icons/black-male-user-symbol.svg" alt="" role="presentation"/>
					</a>
				</li>
			<?php endif;?>
			<?php if(!$user_ID):?>
				<li class="mob-login">
					<a href="#" class="jsLogin">
						<?php esc_html_e('Enter', 'mdkids')?>
					</a>
				</li>
				<li class="mob-login">
					<a href="#" class="jsReg">
						<?php esc_html_e('Signup', 'mdkids')?>
					</a>
				</li>
			<?php endif;?>
			<li class="pc-item">
				<a href="/about-brand">
					<?php esc_html_e('about brand','mdkids')?>
				</a>
			</li>
			<li class="mob-item jsParentDropMenu">
				<p class="jsDropOpen">
					<?php esc_html_e('about company','mdkids')?>
					<img src="<?php bloginfo('template_url')?>/assets/images/arrow.png" alt=""/>
				</p>
				<ul class="drop-menu jsDropClose">
					<li><a href="/about-brand"><?php esc_html_e('about brand','mdkids')?></a>
					</li>
					<li><a href="/partners"><?php esc_html_e('partners','mdkids')?></a>
					</li>
					<li><a href="/news"><?php esc_html_e('news','mdkids')?></a>
					</li>
				</ul>
			</li>
			<li class="jsParentDropMenu">
				<p class="hover-menu jsDropOpen">
					коллекции
					<img src="<?php bloginfo( 'template_url' ) ?>/assets/images/arrow.png" alt=""/>
					<img src="<?php bloginfo( 'template_url' ) ?>/assets/images/icons/down-arrow.svg" alt=""/>
				</p>
				<ul class="drop-menu jsDropClose">
					<?php foreach ($category as $key => $value):?>
						<li>
							<a href="/category/<?=$key?>"><?=$value?></a>
						</li>
					<?php endforeach;?>
				</ul>
			</li>
			<li class="pc-item"><a href="/partners"><?php esc_html_e('partners','mdkids')?></a>
			</li>
			<li class="pc-item"><a href="/news"><?php esc_html_e('news','mdkids')?></a>
			</li>
			<li><a href="/contacts"><?php esc_html_e('contacts','mdkids')?></a>
			</li>
		</ul><a href="/"><img src="<?php bloginfo('template_url')?>/assets/images/icons/logo.svg" alt="" role="presentation"/></a>
		<div class="nav-menu__right">
			<div class="nav-menu__right__land">
				<select id="curLang" data-user="<?=$user_ID?>">
					<option  <?=($_GET['language'] == 'ru') ? 'selected' : ''?> class="select-opt" value="ru">
						Rus
					</option>
					<option  <?=($_GET['language'] == 'en') ? 'selected' : ''?> class="select-opt" value="en">
						En
					</option>
				</select>
			</div>
			<div class="nav-menu__right__search">
				<div class="search-block jsSearchBlock"><span class="search-block__search-open jsSearchOpen"></span><input type="text" placeholder="Поиск"/><a href="#"><img src="<?php bloginfo('template_url')?>/assets/images/icons/search.svg" alt=""/></a>
				</div>
				<!--+b('img')(src='<?php bloginfo('template_url')?>/assets/images/icons/magnifying-glass.svg' alt='').jsSearch-->
			</div>
			<?php if($user_ID):?>
				<div class="nav-menu__right__basket">
					<a href="/cabinet-orders">
						<img src="<?php bloginfo('template_url')?>/assets/images/icons/cart.svg" alt=""/>
						<span id="basket_count">(<?=$basket[0]->count ?? 0?>)</span>
					</a>
				</div>
			<?php endif;?>
		</div>
	</div>
</header>