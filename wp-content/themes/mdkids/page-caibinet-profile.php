<?php
/**
 * Created by PhpStorm.
 * User: Neo
 * Date: 14.11.2018
 * Time: 13:58
 */

/**
 * Template Name: Cabinet Profile
 *
 * Allow users to update their profiles from Frontend.
 *
 */
if(!$current_user->ID) {
	wp_safe_redirect( '/' );
}
get_header();
while ( have_posts() ) : the_post();
	get_template_part( 'template-parts/content', 'page' );
endwhile; // End of the loop.
get_footer();

