<?php

/**
 * Plugin Name: Login and redirect to Referer
 * Description: WordPress login and redirect to referrer pache shortcode Plugin. usage = [login_to_referer class="myclass" label="Login"]
 * Version: 0.1
 * Author: Harvey Botero
 **/

function login_redirect_current_page($atts)
{

    $default = array(
        'class' => '',
        'label' => 'Log In',
    );
    $a = shortcode_atts($default, $atts);

    return '
    <a
        class="login_to_referer ' . $a['class'] . '"
        href="' . esc_url(wp_login_url(get_permalink())) . '"
        alt="' . esc_attr($a['label'], 'platty') . '"
    >
    ' . __($a['label'], 'platty') . '
    </a>
    ';
}
add_shortcode('login_to_referer', 'login_redirect_current_page');
