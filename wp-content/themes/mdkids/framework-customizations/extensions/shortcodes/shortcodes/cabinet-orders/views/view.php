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
global $wpdb;
$table_name = $wpdb->prefix . 'orders';
$basket = $wpdb->get_results( "SELECT * FROM $table_name WHERE `user_id` = ".$curr_user->ID." AND `status` = 0" );
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
				<a class="cabinet-nav-active" href="/cabinet-orders">Мои заказы</a>
			</li>
			<li>
				<a  href="/cabinet-profile">Моя информация</a>
			</li>
			<li>
				<a  href="/cabinet-password">Изменить пароль</a>
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
		<?php if($basket):?>
			<div class="orders">
			<div class="orders__head"><span>Товар</span><span>Цена</span><span>Кол-во</span><span>Итого</span>
			</div>
			<?php foreach ($basket as $item):?>
				<div class="orders-item">
				<div class="orders-item__image">
					<?=get_the_post_thumbnail($item->product_id, '', ['class'=>''])?>
				</div>
				<div class="orders-item__price">
					<div class="orders-item__price__info">
						<p>
							<?=get_the_category( $item->product_id)[0]->name?> "<?= get_the_title( $item->product_id )?>"
						</p>
						<span class="orders-item__price__info__color">цвет<span class="orders-item__price__info__color__circle" style="background-color: #dbdad8;"></span></span>
					</div>
					<div class="orders-item__price__price-summ">
						<p class="jsPriceOrders"><?=preg_replace('/.00/','', $item->price)?>
						</p><span>руб.</span>
					</div>
					<div class="orders-item__price__number">
						<span id="remove" data-id="<?=$item->id?>" data-user="<?=$item->user_id?>"class="minus">-</span>
						<input class="num" type="text" value="<?=$item->count_p?>" disabled="disabled"/>
						<span id="add" data-id="<?=$item->id?>" data-user="<?=$item->user_id?>" class="plus">+</span>
					</div>
					<div class="orders-item__price__allsumm">
						<p class="jsSummOrders"><?=$item->count_p * preg_replace('/.00/','', $item->price)?>
						</p><span>руб.</span>
					</div>
				</div>
				<button id="del" data-id="<?=$item->id?>" data-user="<?=$item->user_id?>" class="jsDeleteOrder">
					<img src="<?php bloginfo('template_url')?>/assets/images/icons/cancel.svg" alt="" role="presentation"/>
				</button>
			</div>
			<?php endforeach;?>
			<div class="orders__total">
				<div class="orders__total__block">
					<p class="jsTotal">
					</p><span>руб.</span>
				</div>
				<button id="send_order" data-user="<?=$curr_user->ID?>">
					Заказать
				</button>
			</div>
		</div>
		<?php else:?>
			<div style="text-align: center;">
				<h2>У Вас нет пока заказов в корзине!</h2>
			</div>
		<?php endif;?>
		<div class="basket_empty" style="display: none; text-align: center;">
			<h2>Ваша корзина пуста!</h2>
		</div>
	</div>
</div>