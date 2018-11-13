<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mdkids
 */
$contacts = fw_get_db_customizer_option();
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
			<a href="tel:<?=$contacts['phone']?>">
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
		<div class="header-contacts__right">
			<a href="#">Вход</a>
			<hr/>
			<a href="#">Регистрация</a>
		</div>
	</div>
	<hr/>
	<div class="nav-menu">
		<div class="mob-menu jsMobMenu"><span></span><span></span><span></span>
		</div>
		<div class="overlay">
		</div>
		<ul class="nav-menu__left jsMenu">
			<li class="mob-login"><a href="#">Вход</a>
			</li>
			<li class="mob-login"><a href="#">Регистрация</a>
			</li>
			<li class="pc-item"><a href="about-brand">о бренде</a>
			</li>
			<li class="mob-item jsParentDropMenu">
				<p class="jsDropOpen">о компании<img src="<?php bloginfo('template_url')?>/assets/images/arrow.png" alt=""/>
				</p>
				<ul class="drop-menu jsDropClose">
					<li><a href="about-brand">о бренде</a>
					</li>
					<li><a href="partners">партнеры</a>
					</li>
					<li><a href="news">новости</a>
					</li>
				</ul>
			</li>
			<li class="jsParentDropMenu">
				<p class="hover-menu jsDropOpen">коллекции<img src="<?php bloginfo('template_url')?>/assets/images/arrow.png" alt=""/><img src="<?php bloginfo('template_url')?>/assets/images/icons/down-arrow.svg" alt=""/>
				</p>
				<ul class="drop-menu jsDropClose">
					<li><a href="category">Серьги</a>
					</li>
					<li><a href="category">Подвески</a>
					</li>
					<li><a href="category">Браслеты</a>
					</li>
					<li><a href="category">Цепочки</a>
					</li>
					<li><a href="category">Гайтаны</a>
					</li>
				</ul>
			</li>
			<li class="pc-item"><a href="partners">партнеры</a>
			</li>
			<li class="pc-item"><a href="news">новости</a>
			</li>
			<li><a href="contacts">контакты</a>
			</li>
		</ul><a href="/"><img src="<?php bloginfo('template_url')?>/assets/images/icons/logo.svg" alt="" role="presentation"/></a>
		<div class="nav-menu__right">
			<div class="nav-menu__right__land">
				<select>
					<option>Rus
					</option>
					<option>En
					</option>
				</select>
			</div>
			<div class="nav-menu__right__search">
				<div class="search-block jsSearchBlock"><span class="search-block__search-open jsSearchOpen"></span><input type="text" placeholder="Поиск"/><a href="#"><img src="<?php bloginfo('template_url')?>/assets/images/icons/search.svg" alt=""/></a>
				</div>
				<!--+b('img')(src='<?php bloginfo('template_url')?>/assets/images/icons/magnifying-glass.svg' alt='').jsSearch-->
			</div>
			<div class="nav-menu__right__basket"><a href="#"><img src="<?php bloginfo('template_url')?>/assets/images/icons/cart.svg" alt=""/><span>(3)</span></a>
			</div>
		</div>
	</div>
</header>