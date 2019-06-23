<?php

function custom_shortcode($atts)
{
    extract(shortcode_atts([
        'expand' => '',
    ], $atts));

    $q = new WP_Query(
        ['posts_per_page' => '4', 'post_type' => 'cpt', 'orderby' => 'menu_order', 'order' => 'ASC']
        );

    $list = '<div class="wishlist_item_list">';
    while ($q->have_posts()) : $q->the_post();
    $idd = get_the_ID();
    $wishlist_email = get_post_meta($idd, 'wishlist_email', true);
    $order_number = get_post_meta($idd, 'order_number', true);
    $list .= '
		<div class="single_wishlist">
			<div class="wishlist_top">
				<p>'.do_shortcode(get_the_title()).' <a href="mailto:'.$wishlist_email.'">'.$wishlist_email.'</a></p>
			</div>
			
			<div class="wishlist_bottom">
				'.do_shortcode(get_the_content()).'
			</div>
		</div>
		';
    endwhile;
    $list .= '</div>';
    wp_reset_query();

    return $list;
}
add_shortcode('custom', 'custom_shortcode');

function core_list_shortcode($atts, $content = null)
{
    extract(shortcode_atts([
        'id' => '',
    ], $atts));

    return '
        '.do_shortcode($content).'
    ';
}
add_shortcode('core', 'core_list_shortcode');
