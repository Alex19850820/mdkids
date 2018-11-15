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
}?>