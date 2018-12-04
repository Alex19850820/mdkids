<?php
/**
 * Created by PhpStorm.
 * User: Neo
 * Date: 02.10.2017
 * Time: 14:22
 */
add_action( 'wp_ajax_get_next_page', 'get_next_page' );
add_action( 'wp_ajax_get_next_product', 'get_next_product' );
add_action( 'wp_ajax_nopriv_get_next_page', 'get_next_page' );
add_action( 'wp_ajax_sendForm', 'sendForm' );
add_action( 'wp_ajax_nopriv_sendForm', 'sendForm' );
add_action( 'wp_ajax_addBasket', 'addBasket' );
add_action( 'wp_ajax_nopriv_addBasket', 'addBasket' );
add_action( 'wp_ajax_delBasket', 'delBasket' );
add_action( 'wp_ajax_nopriv_delBasket', 'delBasket' );
add_action( 'wp_ajax_removeBasket', 'removeBasket' );
add_action( 'wp_ajax_nopriv_removeBasket', 'removeBasket' );
add_action( 'wp_ajax_addCurBasket', 'addCurBasket' );
add_action( 'wp_ajax_nopriv_addCurBasket', 'addCurBasket' );
add_action( 'wp_ajax_sendOrder', 'sendOrder' );
add_action( 'wp_ajax_nopriv_sendOrder', 'sendOrder' );
add_action( 'wp_ajax_settingsUser', 'settingsUser' );
add_action( 'wp_ajax_nopriv_settingsUser', 'settingsUser' );
//
function get_next_page () {
	 $blogQuery = new WP_Query( [
		'category_name'  => $_POST['cat'],
		'posts_per_page' => $_POST['per_page'],
		'paged'          => $_POST['page'],
	] );
	 $z = 0; while ( $blogQuery->have_posts() ) { $z++; $blogQuery->the_post(); ?>
	<div class="main-news-items__item">
		<div class="main-news-items__item__image">
			<img src="<?php the_post_thumbnail_url(); ?>" alt="" role="presentation"/>
		</div>
		<p>
			<?php the_title(); ?>
		</p>
		<span class="mainNewsDot">
						<?=fw_get_db_post_option($blogQuery->post->ID, 'description')?>
                    </span>
		<div class="main-news-items__item__links">
			<a href="<?php the_permalink(); ?>">Подробрее
				<img src="<?php bloginfo('template_url')?>/assets/images/icons/right-arrow.svg" alt="" width="12" height="8" role="presentation"/>
			</a>
			<time><?=get_the_date('d.m.Y')?></time>
			<a href="">
				<img src="<?php bloginfo('template_url')?>/assets/images/icons/share.svg" alt="" width="25" height="25" role="presentation"/>
			</a>
		</div>
	</div>
<?php }
}?>
<?php
function get_next_product () {
	$blogQuery = new WP_Query( [
	'category_name'  => $_POST['cat'],
	'posts_per_page' => 1,
	'paged'          => $_POST['page'],
	] );
	$z = 0; while ( $blogQuery->have_posts() ) : $z++; $blogQuery->the_post();  ?>
	<a class="collections-items__item" href="<?php the_permalink(); ?>">
						<span class="collections-items__item__image">
							<img src="<?php the_post_thumbnail_url(); ?>" alt="" role="presentation"/>
						</span>
		<span class="collections-items__item__text">
							<h3>
								<?php the_title(); ?>
							</h3>
							<span class="price-block">
								<span class="old-price">
									<?php if(fw_get_db_post_option($blogQuery->post->ID, 'price_old')):?>
										<?=fw_get_db_post_option($blogQuery->post->ID, 'price_old')?>
									<?endif;?>
								</span>
								<span class="real-price">
								   <?php if(fw_get_db_post_option($blogQuery->post->ID, 'price_new')):?>
									   <?=fw_get_db_post_option($blogQuery->post->ID, 'price_new')?>
								   <?endif;?>
								</span>
							</span>
						</span>
	</a>
<?php endwhile; };
function sendForm() {
	if (isset($_POST )) {
		// обрабатываем запрос
		$adminEmail = get_option('admin_email');
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$text = $_POST['text'];
		
		$message = '<h2>Заявка с '.get_bloginfo('description').' '.get_bloginfo('url').'</h2><br>';
		$message .= 'Имя: ' . $name . '<br>';
		$message .= 'Телефон: ' . $phone . '<br>';
		$message .= 'E-mail: ' . $email . '<br>';
		$message .= 'Сообщение: ' . $text . '<br>';
		
		if (wp_mail($adminEmail,'Заявка на обратный звонок c '.get_bloginfo('description').' '.get_bloginfo('url'), $message, 'content-type: text/html')) {
			$result = [
				'result' => 'success',
				'message' => 'Ваше запрос отправлен!'
			];
		} else {
			$result = [
				'result' => 'error',
				'message' => 'Возникла ошибка при отправке запроса. Попробуйте позже!'
			];
		}
		// возвращаем результат
		wp_send_json($result);
	}
	wp_die();
}
function addBasket() {
	global $wpdb;
	if($_POST['user_id']) {
		$table_name = $wpdb->prefix . 'orders';
		//Проверяем на существование таблицы
		if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
			// тут мы добавляем таблицу в базу данных
			$sql = "	CREATE TABLE " . $table_name . " (
					id int(10) unsigned NOT NULL AUTO_INCREMENT,
					user_id int(10) unsigned NOT NULL,
					product_id int(10) unsigned NOT NULL,
					count_p int(10) unsigned NOT NULL,
					status tinyint(3) unsigned NOT NULL default  '0',
					price DECIMAL(8,2) UNSIGNED NOT NULL,
					dt_add TIMESTAMP NOT NULL default CURRENT_TIMESTAMP,
					PRIMARY KEY  (id),
					UNIQUE KEY id (id)
				);";
			require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
			dbDelta($sql);
//		fw_print($wpdb->last_error);
		}
		$result = $wpdb->get_results( "SELECT * FROM $table_name WHERE `product_id` = ".$_POST['product_id']." AND `status` = 0 AND `user_id` = ".$_POST['user_id']." " );
		if($result) {
			$wpdb->update($table_name, ['count_p' => $result[0]->count_p + 1], ['user_id' => $_POST['user_id'], 'product_id' => $_POST['product_id'], 'status' => 0, 'price' => $_POST['price']] );
		}else {
			$wpdb->insert( $table_name, ['user_id' => $_POST['user_id'], 'status' => 0, 'product_id' => $_POST['product_id'], 'count_p' => 1, 'price' => $_POST['price']], ['%d', '%d', '%d', '%d', '%f']);
		}
		$count = $wpdb->get_results("SELECT SUM(`count_p`) as count FROM $table_name WHERE `user_id` =".$_POST['user_id']." AND `status` = 0 ");
		$res = [
			'result' => 'success',
			'message' => 'Товар добавлен в корзину!',
			'count' => $count[0]->count,
		];
	} else {
		$res = [
			'result' => 'error',
			'message' => 'Возникла ошибка при отправке запроса. Попробуйте позже!'
		];
	}
	// возвращаем результат
	wp_send_json($res);
	wp_die();
}
function delBasket() {
	global $wpdb;
	if($_POST['user_id']) {
		$table_name = $wpdb->prefix . 'orders';
		$result = $wpdb->get_results( "SELECT * FROM $table_name WHERE `id` = ".$_POST['id']." AND `status` = 0 AND `user_id` = ".$_POST['user_id']." " );
		if($result) {
			$wpdb->update($table_name, ['status' => 3], ['user_id' => $_POST['user_id'], 'id' => $_POST['id'], 'status' => 0] );
		}
		$count = $wpdb->get_results("SELECT SUM(`count_p`) as count FROM $table_name WHERE `user_id` =".$_POST['user_id']." AND `status` = 0 ");
		$res = [
			'result' => 'success',
			'message' => 'Товар удален из корзины!',
			'count' => $count[0]->count ?? 0,
		];
	} else {
		$res = [
			'result' => 'error',
			'message' => 'Возникла ошибка при отправке запроса. Попробуйте позже!'
		];
	}
	// возвращаем результат
	wp_send_json($res);
	wp_die();
}
function removeBasket() {
	global $wpdb;
	if($_POST['user_id']) {
		$table_name = $wpdb->prefix . 'orders';
		$result = $wpdb->get_results( "SELECT * FROM $table_name WHERE `id` = ".$_POST['id']." AND `status` = 0 AND `user_id` = ".$_POST['user_id']." " );
		if($result) {
			if ($result[0]->count_p - 1 == 0) {
				$res = [
					'result' => 'error',
					'message' => 'Ощибка! Количество не может быть меньше 1!'
				];
				// возвращаем результат
				wp_send_json($res);
				wp_die();
			} else {
				$wpdb->update($table_name, ['count_p' => $result[0]->count_p - 1], ['user_id' => $_POST['user_id'], 'id' => $_POST['id'], 'status' => 0] );
			}
		}
		$count = $wpdb->get_results("SELECT SUM(`count_p`) as count FROM $table_name WHERE `user_id` =".$_POST['user_id']." AND `status` = 0 ");
		$res = [
			'result' => 'success',
			'message' => 'Товар удален из корзины!',
			'count' => $count[0]->count,
		];
	} else {
		$res = [
			'result' => 'error',
			'message' => 'Возникла ошибка при отправке запроса. Попробуйте позже!'
		];
	}
	// возвращаем результат
	wp_send_json($res);
	wp_die();
}
function addCurBasket() {
	global $wpdb;
	if($_POST['user_id']) {
		$table_name = $wpdb->prefix . 'orders';
		$result = $wpdb->get_results( "SELECT * FROM $table_name WHERE `id` = ".$_POST['id']." AND `status` = 0 AND `user_id` = ".$_POST['user_id']." " );
		if($result) {
			$wpdb->update($table_name, ['count_p' => $result[0]->count_p + 1], ['user_id' => $_POST['user_id'], 'id' => $_POST['id'], 'status' => 0] );
		}
		$count = $wpdb->get_results("SELECT SUM(`count_p`) as count FROM $table_name WHERE `user_id` =".$_POST['user_id']." AND `status` = 0 ");
		$res = [
			'result' => 'success',
			'message' => 'Товар добавлен в корзину!',
			'count' => $count[0]->count,
		];
	} else {
		$res = [
			'result' => 'error',
			'message' => 'Возникла ошибка при отправке запроса. Попробуйте позже!'
		];
	}
	// возвращаем результат
	wp_send_json($res);
	wp_die();
}
function sendOrder() {
	global $wpdb;
	if($_POST['user_id']) {
		$user_meta = get_user_meta( $_POST['user_id'] );
		$user = get_user_by('id', $_POST['user_id'] );
		$table_name = $wpdb->prefix . 'orders';
		$result = $wpdb->get_results( "SELECT * FROM $table_name WHERE `user_id` = ".$_POST['user_id']." AND `status` = 0 " );
		if($result) {
			$wpdb->update($table_name, ['status' => 1], ['user_id' => $_POST['user_id'], 'status' => 0] );
		}
		$count = $wpdb->get_results("SELECT SUM(`count_p`) as count FROM $table_name WHERE `user_id` =".$_POST['user_id']." AND `status` = 0 ");
		$order = '<h2>Заказ:<h2>
					<table border="1">
					<thead>
					<td>Название товара</td>
					<td>Количество</td>
					<td> Сумма</td>
					</thead>
					<tbody>';
		$sum = 0;
		foreach ( $result as $item ) {
			
			$order .=  "<td>".get_the_category( $item->product_id)[0]->name."</td>
						<td>". $item->count_p. "</td><td> ". $item->price * $item->count_p." руб.</td><tr>";
			$sum += ($item->price * $item->count_p);
		}
		$order .="</tbody></table><br><h2>Итого: ". $sum. "руб.";
		// обрабатываем запрос
		$adminEmail = get_option('admin_email').', '.$user->data->user_email;
		$name = $user_meta['first_name'];
		$phone = $user_meta['phone'];
		$email = $user->data->user_email;
		$text = $order;
		
		$message = '<h2>Заявка  на заказ товара с '.get_bloginfo('description').' '.get_bloginfo('url').'</h2><br>';
		$message .= 'Имя: ' . $name . '<br>';
		$message .= 'Телефон: ' . $phone . '<br>';
		$message .= 'E-mail: ' . $email . '<br>';
		$message .= 'Сообщение: ' . $text . '<br>';
		
		if (wp_mail($adminEmail,'Заявка на заказ товара '.get_bloginfo('description').' '.get_bloginfo('url'), $message, 'content-type: text/html')) {
			$result = [
				'result' => 'success',
				'message' => 'Ваш заказ отправлен!Ожидайте с Вами скоро свяжутся!',
				'count' => $count[0]->count,
			];
		} else {
			$result = [
				'result' => 'error',
				'message' => 'Возникла ошибка при отправке заказа. Попробуйте позже!'
			];
		}
		// возвращаем результат
		wp_send_json($result);
	}
	wp_die();
}
function settingsUser() {
	global $wpdb;
	if($_POST['user_id']) {
		$table_name = $wpdb->prefix . 'user_settings';
		//Проверяем на существование таблицы
		if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
			// тут мы добавляем таблицу в базу данных
			$sql = "	CREATE TABLE " . $table_name . " (
					`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
					`user_id` int(10) unsigned NOT NULL,
					`key` varchar(255) NOT NULL,
					`value` varchar(255) NOT NULL,
					PRIMARY KEY  (id),
					UNIQUE KEY id (id)
				);";
			require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
			dbDelta($sql);
//		fw_print($wpdb->last_error);
		}
		$result = $wpdb->get_results( "SELECT * FROM $table_name WHERE `user_id` = ".$_POST['user_id']." AND `key` = '".$_POST['key']."' ");
		
		if($result) {
			$wpdb->update($table_name, ['value' => $_POST['value']], ['user_id' => $_POST['user_id'], 'key' => $_POST['key']] );
		}else {
			$wpdb->insert( $table_name, ['user_id' => $_POST['user_id'],  'key' => $_POST['key'], 'value' => $_POST['value']], ['%d', '%s', '%s']);
		}
		$res = [
			'result' => 'success',
			'message' => 'Настройка добавлена!',
			'value' => $_POST['value'],
		];
	} else {
		$res = [
			'result' => 'error',
			'message' => 'Возникла ошибка при отправке запроса. Попробуйте позже!'
		];
	}
	// возвращаем результат
	wp_send_json($res);
	wp_die();
}
?>