<?php

/**
 * Plugin Name: Custom Login Page by Rez
 * Plugin URI: https://wordpress.org/plugins/custom_login_page_by_rez/
 * Description: This plugin is used for going top of the page
 * Version: 1.0.0
 * Requires at least: 5.8
 * Tested up to: 6.2
 * Author:Rezwanul Haque
 * WC requires at least: 6.0
 * Author URI:https://rezwanul.com
 *Text Domain: clpbr
 *update url:https://github.com/REZWANUL1/custom-login-page-by-rez_by_rez
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */

// #######
//##### loading css for Admin#####
// #######

add_action("admin_enqueue_scripts", "clpbr_admin_panel_css");
function clpbr_admin_panel_css()
{
   wp_enqueue_style('clpbr_custom_login-style', plugins_url('/css/clpbr-admin-style.css', __FILE__), false, '1.0.0');
}
// #######
//###### option page function######
// #######

add_action('admin_menu', 'clpbr_add_theme_page');
function clpbr_add_theme_page()
{
   add_menu_page('Custom Login page', 'Login Option', 'manage_options', 'clpbr-options-option', 'clpbr_create_page', 'dashicons-image-flip-vertical', 101);
}
// #######
//###### option page function callback######
// #######

function clpbr_create_page()
{
?>
   <div class="clpbr_main_area">
      <div class="clpbr_body_area">
         <div class="clpbr_option_page_container">
            <div class="clpbr_main_area clpbr_common">
               <h3 id="title"><?php esc_attr_e("Login page customizer");  ?></h3>
               <form action="options.php" method="post">
                  <?php wp_nonce_field('update-options'); ?>
                  <!-- ######## -->
                  <!-- Primary Color -->
                  <!-- ######## -->

                  <label for="clpbr-primary-color" name="clpbr-primary-color">
                     <?php esc_attr_e("Primary Color");  ?> </label>
                  <input type="color" name="clpbr-primary-color" value="<?php print get_option('clpbr-primary-color'); ?>">
                  <!-- ######## -->
                  <!-- Secondary Color -->
                  <!-- ######## -->

                  <label for="clpbr-secondary-color" name="clpbr-secondary-color">
                     <?php esc_attr_e("Secondary Color");  ?> </label>
                  <input type="color" name="clpbr-secondary-color" value="<?php print get_option('clpbr-secondary-color'); ?>">

                  <!-- ######## -->
                  <!-- Main  logo -->
                  <!-- ######## -->

                  <label for="clpbr-logo-image-url" name="clpbr-logo-image-url">
                     <?php esc_attr_e("Main Logo ");  ?> </label>
                  <input type="text" name="clpbr-logo-image-url" placeholder="Paste Your Logo Url " value="<?php print get_option('clpbr-logo-image-url'); ?>">
                  <!-- ######## -->
                  <!-- Background Brightness -->
                  <!-- ######## -->

                  <label for="clpbr-image-brightness" name="clpbr-image-brightness">
                     <?php esc_attr_e("Background  Image Opacity (Between:1-9)");  ?> </label>
                  <input type="number" name="clpbr-image-brightness" placeholder="Background Brightness" value="<?php print get_option('clpbr-image-brightness'); ?>">

                  <!-- ######## -->
                  <!-- Background Image -->
                  <!-- ######## -->

                  <label for="clpbr-background-image-url" name="clpbr-background-image-url">
                     <?php esc_attr_e("Background Image  ");  ?> </label>
                  <input type="text" name="clpbr-background-image-url" placeholder="Paste Your Image Url " value="<?php print get_option('clpbr-background-image-url'); ?>">

                  <input type="hidden" name="action" value="update">
                  <input type="hidden" name="page_options" value="clpbr-primary-color,clpbr-secondary-color,clpbr-logo-image-url,clpbr-background-image-url,clpbr-image-brightness">
                  <input type="submit" class="button button-primary" value="<?php _e('Save changes', 'clpbr') ?>">
               </form>
            </div>
            <div class="clpbr_sidebar_area clpbr_common">
               <h3 id="title"><?php esc_attr_e("About Author");  ?></h3>
               <p> I'm <strong><a href="https://web.facebook.com/rezwanulhaque.mukto" target="_blank">
                        Rezwanul Haque Mukto
                     </a></strong> A Full stack Developer and WordPress Expert. I make web related product to make your life easy </p>

            </div>
         </div>
      </div>

   </div>
<?php

}
// ########
//##### enqueue css for login page#####
// ########

add_action("login_enqueue_scripts", "clpbr_custom_login_enqueue");
function clpbr_custom_login_enqueue()
{
   wp_enqueue_style('clpbr_custom_login-style', plugins_url('/css/clpbr_style.css', __FILE__), false, '1.0.0');
}


// ########
//##### changing login form logo#####
// ########

add_action('login_enqueue_scripts', 'clpbr_login_logo_change');
function clpbr_login_logo_change()
{
?>
   <style>
      /* ########### */
      /*#### logo image #### */
      /* ########### */

      #login h1 a,
      .login h1 a {

         background-image: url(<?php print get_option("clpbr-logo-image-url", "/img/my.jpeg");  ?> ) !important;

      }


      /* ########### */
      /*#### Background image #### */
      /* ########### */

      body.login {
         background-image: url('<?php print get_option("clpbr-background-image-url"); ?>') !important;

      }

      /* ########### */
      /*#### primary color #### */
      /* ########### */
      .login #login_error,
      .login .message,
      .login .success {
         border-left: 4px solid <?php print get_option("clpbr-primary-color") ?> !important;
      }

      input#user_login,
      input#user_pass {
         border-left: 4px solid <?php print get_option("clpbr-primary-color") ?> !important;

      }

      #login form p.submit input {
         background-color: <?php print get_option("clpbr-primary-color") ?> !important;
      }


      /* ########### */
      /*#### Secondary color #### */
      /* ########### */
      .login #backtoblog a {
         background-color: <?php print get_option("clpbr-secondary-color")  ?> !important;

      }


      /* ########### */
      /*#### Background opacity #### */
      /* ########### */
      body.login::after {

         opacity: .<?php print get_option("clpbr-image-brightness") ?> !important;

      }
   </style>
<?php
}
/* ########### */
//#### changing login form url####
/* ########### */


add_filter('login_headerurl', 'clpbr_login_logo_url_change');
function clpbr_login_logo_url_change()
{
   return home_url();
}
