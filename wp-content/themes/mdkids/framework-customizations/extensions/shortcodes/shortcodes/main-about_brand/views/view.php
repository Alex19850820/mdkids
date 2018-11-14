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
<section class="about-brand">
	<div class="head"><hr/>
		<div class="head__circle">
		</div>
		<h2>
			<?=$atts['h2']?>
		</h2>
		<div class="head__circle">
		</div><hr/>
	</div>
	<div class="container container_flex m-1">
		<div class="about-brand-text">
			<p>
				<?=$atts['title']?>
			</p>
			<span>
                <?=$atts['description']?>
			</span>
		</div>
		<div class="about-brand-image">
			<img src="<?=$atts['img']['url']?>" alt="" role="presentation"/>
		</div>
	</div>
</section>