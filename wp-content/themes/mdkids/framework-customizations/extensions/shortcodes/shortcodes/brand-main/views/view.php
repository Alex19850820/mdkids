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
<section class="brand"><hr class="pages-hr"/>
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
		<div class="brand-block m-1">
			<img class="brand-block__image-left" src="<?=$atts['img_left']['url']?>" alt="" role="presentation"/>
			<h3 class="brand-block__head">
				<?=$atts['h3']?>
			</h3>
			<p class="brand-block__text">
				<?=$atts['text_right']?>
			</p><img class="brand-block__image-right" src="<?=$atts['img_right']['url']?>" alt="" role="presentation"/>
			<p class="brand-block__text">
				<?=$atts['text_left']?>
			</p>
		</div>
	</div>
</section>
