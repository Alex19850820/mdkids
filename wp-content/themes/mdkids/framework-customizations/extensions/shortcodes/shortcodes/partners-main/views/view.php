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
<section class="partners"><hr class="pages-hr"/>
	<div class="head"><hr/>
		<div class="head__circle">
		</div>
		<h2>Партнеры
		</h2>
		<div class="head__circle">
		</div><hr/>
	</div>
	<div class="container m-1">
		<?php foreach ($atts['partners'] as $partner):?>
			<div class="partners-item">
				<img src="<?=$partner['img']['url']?>" alt="" role="presentation"/>
				<div class="partners-item__text">
					<h3>
						<?=$partner['h3']?>
					</h3>
					<p>
						<?=$partner['text']?>
					</p>
				</div>
			</div>
		<?php endforeach;?>
	</div>
</section>
