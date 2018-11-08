<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mdkids
 */
$arg = [
	'theme_location'  => '',
	'menu'            => 'Menu 1',
	'container'       => '',
	'container_class' => '',
	'container_id'    => '',
	'menu_class'      => 'menu',
	'menu_id'         => '',
	'echo'            => true,
	'fallback_cb'     => 'wp_page_menu',
	'before'          => '',
	'after'           => '',
	'link_before'     => '',
	'link_after'      => '',
	'items_wrap'      => '<ul id="%1$s" class="footer__left">%3$s</ul>',
	'depth'           => 0,
	'walker'          => '',
];

?>
<div class="footer">
	<ul class="footer__left">
		<?php wp_nav_menu($arg);?>
	</ul>
	<a href="contacts">
		Обратная связь
	</a>
	<span>Copyright © 2018 MDkidsjewellery</span>
</div>

<?php wp_footer(); ?>
</body>
</html>
