<?php
/**
 * Created by PhpStorm.
 * User: Neo
 * Date: 14.11.2018
 * Time: 13:58
 */

/**
 * Template Name: User Profile
 *
 * Allow users to update their profiles from Frontend.
 *
 */
 
/* Get user info. */
?>
<table>
 <tr>
 <td class="avatar">
 <?php echo get_avatar( $current_user->ID, 60 ); ?>
 </td>
 <td class="short_user_info">
 <?php
 echo '<h2>'.$current_user->user_firstname.' '.$current_user->user_lastname."</h2>\n";
 echo '<b>Сайт:</b> <a href="'.$current_user->user_url.'" target="_blank">'.$current_user->user_url."</a><br />\n";
 
 echo "<br />";
 ?>
 </td>
 </tr>
 </table>
 <?php echo "<br /><b>Биография:</b> \n<blockquote>".$current_user->user_description."</blockquote>\n"; ?>

