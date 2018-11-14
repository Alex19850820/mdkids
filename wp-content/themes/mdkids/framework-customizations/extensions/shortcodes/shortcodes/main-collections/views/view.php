<?php if ( ! defined( 'FW' ) ) {
    die( 'Forbidden' );
}
/***
  * Верстка шорткода
  * весь контент лежит в переменной $atts
 *@var $atts array
 *
 **/
$category_products = [];
foreach (get_categories() as $item) {
	if($item->slug != 'news'&&$item->name != 'Без рубрики' ){
		$category_products[$item->slug] = ['name' => $item->name, 'count' => $item->count, 'img' => get_term_thumbnail($item->term_id, $size = 'post-thumbnail', $attr = '')];
	}
}
?>
<div class="collections">
	<div class="head"><hr/>
		<div class="head__circle">
		</div>
		<h2>
			Коллекции
		</h2>
		<div class="head__circle">
		</div><hr/>
	</div>
	<div class="container">
		<div class="collections-items">
			<?php foreach ($category_products as $k => $v):?>
				<a class="collections-items__item" href="/category/<?=$k?>">
					<span class="collections-items__item__image">
						<?=$v['img']?>
					</span>
					<span class="collections-items__item__text">
						<h3>
							<?=$v['name']?>
						</h3>
						<span>
							<?=$v['count']?> продуктов
						</span>
					</span>
				</a>
			<?php endforeach;?>
		</div>
	</div>
</div>