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
		<div class="orders">
			<div class="orders__head"><span>Товар</span><span>Цена</span><span>Кол-во</span><span>Итого</span>
			</div>
			<div class="orders-item">
				<div class="orders-item__image"><img src="assets/images/orders_image.png" alt="" role="presentation"/>
				</div>
				<div class="orders-item__price">
					<div class="orders-item__price__info">
						<p>Подвеска “Конёк”
						</p><span class="orders-item__price__info__color">цвет<span class="orders-item__price__info__color__circle" style="background-color: #dbdad8;"></span></span>
					</div>
					<div class="orders-item__price__price-summ">
						<p class="jsPriceOrders">3500
						</p><span>руб.</span>
					</div>
					<div class="orders-item__price__number"><span class="minus">-</span><input class="num" type="text" value="1" disabled="disabled"/><span class="plus">+</span>
					</div>
					<div class="orders-item__price__allsumm">
						<p class="jsSummOrders">3500
						</p><span>руб.</span>
					</div>
				</div>
				<button class="jsDeleteOrder"><img src="<?php bloginfo('template_url')?>/assets/images/icons/cancel.svg" alt="" role="presentation"/>
				</button>
			</div>
			<div class="orders-item">
				<div class="orders-item__image"><img src="<?php bloginfo('template_url')?>/assets/images/orders_image.png" alt="" role="presentation"/>
				</div>
				<div class="orders-item__price">
					<div class="orders-item__price__info">
						<p>Подвеска “Конёк”
						</p><span class="orders-item__price__info__color">цвет<span class="orders-item__price__info__color__circle" style="background-color: #dbdad8;"></span></span>
					</div>
					<div class="orders-item__price__price-summ">
						<p class="jsPriceOrders">3500
						</p><span>руб.</span>
					</div>
					<div class="orders-item__price__number"><span class="minus">-</span><input class="num" type="text" value="1" disabled="disabled"/><span class="plus">+</span>
					</div>
					<div class="orders-item__price__allsumm">
						<p class="jsSummOrders">3500
						</p><span>руб.</span>
					</div>
				</div>
				<button class="jsDeleteOrder"><img src="<?php bloginfo('template_url')?>/assets/images/icons/cancel.svg" alt="" role="presentation"/>
				</button>
			</div>
			<div class="orders-item">
				<div class="orders-item__image"><img src="<?php bloginfo('template_url')?>/assets/images/orders_image.png" alt="" role="presentation"/>
				</div>
				<div class="orders-item__price">
					<div class="orders-item__price__info">
						<p>Подвеска “Конёк”
						</p><span class="orders-item__price__info__color">цвет<span class="orders-item__price__info__color__circle" style="background-color: #dbdad8;"></span></span>
					</div>
					<div class="orders-item__price__price-summ">
						<p class="jsPriceOrders">3500
						</p><span>руб.</span>
					</div>
					<div class="orders-item__price__number"><span class="minus">-</span><input class="num" type="text" value="1" disabled="disabled"/><span class="plus">+</span>
					</div>
					<div class="orders-item__price__allsumm">
						<p class="jsSummOrders">3500
						</p><span>руб.</span>
					</div>
				</div>
				<button class="jsDeleteOrder"><img src="<?php bloginfo('template_url')?>/assets/images/icons/cancel.svg" alt="" role="presentation"/>
				</button>
			</div>
			<div class="orders-item">
				<div class="orders-item__image"><img src="<?php bloginfo('template_url')?>/assets/images/orders_image.png" alt="" role="presentation"/>
				</div>
				<div class="orders-item__price">
					<div class="orders-item__price__info">
						<p>Подвеска “Конёк”
						</p><span class="orders-item__price__info__color">цвет<span class="orders-item__price__info__color__circle" style="background-color: #dbdad8;"></span></span>
					</div>
					<div class="orders-item__price__price-summ">
						<p class="jsPriceOrders">3500
						</p><span>руб.</span>
					</div>
					<div class="orders-item__price__number"><span class="minus">-</span><input class="num" type="text" value="1" disabled="disabled"/><span class="plus">+</span>
					</div>
					<div class="orders-item__price__allsumm">
						<p class="jsSummOrders">3500
						</p><span>руб.</span>
					</div>
				</div>
				<button class="jsDeleteOrder"><img src="<?php bloginfo('template_url')?>/assets/images/icons/cancel.svg" alt="" role="presentation"/>
				</button>
			</div>
			<div class="orders__total">
				<div class="orders__total__block">
					<p class="jsTotal">
					</p><span>руб.</span>
				</div>
				<button>
					Заказать
				</button>
			</div>
		</div>
	</div>
</div>