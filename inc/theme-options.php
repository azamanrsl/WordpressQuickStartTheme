<?php
/**
 * Initialize the options before anything else.
 */
add_action('admin_init', 'ppm_quickstart_custom_theme_options', 1);

/**
 * Theme Mode demo code of all the available option types.
 *
 * @return void
 *
 * @since     2.0
 */
function ppm_quickstart_custom_theme_options()
{

  /**
   * Get a copy of the saved settings array.
   */
    $saved_settings = get_option('option_tree_settings', []);

    /**
     * Create a custom settings array that we pass to
     * the OptionTree Settings API Class.
     */
    $custom_settings = [
    'contextual_help' => [
      'content'       => [
        [
          'id'        => 'general_help',
          'title'     => 'General',
          'content'   => '<p>Help content goes here!</p>',
        ],
      ],
      'sidebar'       => '<p>Sidebar content goes here!</p>',
    ],
    'sections'        => [
      [
        'title'       => 'General',
        'id'          => 'general_default',
      ],
    ],
    'settings'        => [
      [
        'label'       => 'News page Banner',
        'id'          => 'news_page_banner',
        'type'        => 'upload',
        'section'     => 'general_default',
      ],
    ],
  ];

    /* allow settings to be filtered before saving */
    $custom_settings = apply_filters('option_tree_settings_args', $custom_settings);

    /* settings are not the same update the DB */
    if ($saved_settings !== $custom_settings) {
        update_option('option_tree_settings', $custom_settings);
    }
}
