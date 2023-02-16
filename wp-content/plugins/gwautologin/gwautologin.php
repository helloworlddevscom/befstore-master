<?php
/**
 * Plugin Name: GP Auto Login
 * Description: Automatically log users in after registration.
 * Plugin URI: https://gravitywiz.com/documentation/gravity-forms-auto-login/
 * Version: 2.1
 * Author: Gravity Wiz
 * Author URI: http://gravitywiz.com/
 * License: GPL2
 * Perk: True
 */

define( 'GP_AUTO_LOGIN_VERSION', '2.1' );

require 'includes/class-gp-bootstrap.php';

$gp_auto_login_bootstrap = new GP_Bootstrap( 'class-gp-auto-login.php', __FILE__ );
