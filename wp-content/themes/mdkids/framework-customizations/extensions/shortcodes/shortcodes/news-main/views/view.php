<?php if ( ! defined( 'FW' ) ) {
    die( 'Forbidden' );
}
/***
  * Верстка шорткода
  * весь контент лежит в переменной $atts
 *@var $atts array
 *
 **/

$cat_name = get_query_var('name');
?>
<section class="news"><hr class="pages-hr"/>
	<div class="head"><hr/>
		<div class="head__circle">
		</div>
		<h2>Новости</h2>
		<div class="head__circle">
		</div><hr/>
	</div>
	<div class="container">
		<?php
		
		$blogQuery = new WP_Query([
			'category_name' => 'news',
			'posts_per_page' => 1,
			'paged' => $_GET['cur_p'],
		]);
		$contacts = fw_get_db_customizer_option();
		
		?>
		<div class="main-news-items m-1">
			<?php $z = 0; while ( $blogQuery->have_posts() ) { $z++; $blogQuery->the_post();  ?>
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
			<?}?>
		</div>
		<div class="pagination">
			<?php
				$arr = get_the_category($post->ID);
				foreach ($arr as $news) {
					if($news->slug == $cat_name) {
						$count = $news->count;
					}
				}
				if($count) {
					$n = ceil($count/1);
				} else {
					$n = ceil(get_the_category($post->ID)[0]->category_count/1);
				}
			?>
			
			<ul class="pagination__ul">
				<li class="pagination__ul__prev"><a href="#">Предыдущая</a>
				</li>
				<?php for($i=1; $i<= $n; $i++):?>
					<li class="pagination__ul__li">
						<a href="#" id="next" data-page="<?=$i?>" data-cat="<?=$cat_name?>" >
							<?=$i?>
						</a>
					</li>
				<?php endfor;?>
				<li class="pagination__ul__next"><a href="#">Следующая</a>
				</li>
			</ul>
		</div>
	</div>
</section>
<script type="text/javascript">
	changeHash(<?=$_GET['cur_p'] ?? 1?>);
	var button = $('[data-page=<?=$_GET['cur_p'] ?? 1?>]');
	// button.addClass("pagination-active");
	button.parent('li').addClass("pagination-active");
</script>
