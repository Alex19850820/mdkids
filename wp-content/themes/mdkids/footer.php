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
<div class="modal" id="modal">
	<div class="overlay-modal">
	</div>
	<div class="modal-block">
		<div class="modal-close">
			<span></span>
			<span></span>
		</div>
<!--		<form class="modal-login">-->
<!--			<h2>-->
<!--				Авторизация-->
<!--			</h2>-->
<!--			<input type="text" name="email" placeholder="Ваш e-mail"/>-->
<!--			<input type="password" name="pass" placeholder="Ваш пароль"/>-->
<!--			<button type="submit">-->
<!--				Войти-->
<!--			</button>-->
<!--		</form>-->
	<?php
		$args = [
		'echo'           => true,
		'redirect'       => site_url()."/cabinet-profile",
//		'redirect'       => site_url( $_SERVER['REQUEST_URI'] )."/cabinet",
		'form_id'        => 'loginform',
		'label_email' => __( 'Email' ),
		'label_password' => __( 'Password' ),
		'label_remember' => __( 'Remember Me' ),
		'label_log_in'   => __( 'Log In' ),
		'id_email'    => 'user_email',
		'id_password'    => 'user_pass',
		'id_remember'    => 'rememberme',
		'id_submit'      => 'wp-submit',
		'remember'       => true,
		'value_username' => NULL,
		'value_remember' => false
	];
	wp_login_form( $args );?>
		<?php
		echo do_shortcode('[cr_custom_registration]');
		?>
	</div>
</div>
<div class="modal-error js-modalError">
	<div class="modal-error__backdrop js-modalErrorClose">
	</div>
	<div class="modal-block">
		<div class="modal-error__close js-modalErrorClose"><span></span><span></span>
		</div>
		<p>Введите корретные данные.
		</p>
	</div>
</div>
<?php wp_footer(); ?>
	<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
		<!-- Background of PhotoSwipe. It's a separate element, as animating opacity is faster than rgba(). -->
		<div class="pswp__bg"></div>
		<!-- Slides wrapper with overflow:hidden. -->
		<div class="pswp__scroll-wrap">
			<!-- Container that holds slides. PhotoSwipe keeps only 3 slides in DOM to save memory. -->
			<!-- don't modify these 3 pswp__item elements, data is added later on. -->
			<div class="pswp__container">
				<div class="pswp__item"></div>
				<div class="pswp__item"></div>
				<div class="pswp__item"></div>
			</div>
			<!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
			<div class="pswp__ui pswp__ui--hidden">
				<div class="pswp__top-bar">
					<!--  Controls are self-explanatory. Order can be changed. -->
					<div class="pswp__counter"></div>
					<button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
					<button style='display: none;' class="pswp__button pswp__button--share" title="Share"></button>
					<button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
					<button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
					<!-- Preloader demo https://codepen.io/dimsemenov/pen/yyBWoR -->
					<!-- element will get class pswp__preloader--active when preloader is running -->
					<div class="pswp__preloader">
						<div class="pswp__preloader__icn">
							<div class="pswp__preloader__cut">
								<div class="pswp__preloader__donut"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
					<div class="pswp__share-tooltip"></div>
				</div>
				<button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
				</button>
				<button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
				</button>
				<div class="pswp__caption">
					<div class="pswp__caption__center"></div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>
