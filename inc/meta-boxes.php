<?php

add_action('admin_init', 'ppm_quickstart_custom_meta_boxes');

function ppm_quickstart_custom_meta_boxes()
{
    $event_meta_box = [
    'id'          => 'event_meta_box',
    'title'       => 'Event Information',
    'desc'        => '',
    'pages'       => ['event-items'],
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => [
      [
        'label'       => 'Event Show',
        'id'          => 'event_show',
        'type'        => 'text',
      ],
    ],
  ];
    ot_register_meta_box($event_meta_box);
}
