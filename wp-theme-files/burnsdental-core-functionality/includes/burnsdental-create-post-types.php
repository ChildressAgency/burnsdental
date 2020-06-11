<?php
if(!defined('ABSPATH')){ exit; }

function burnsdental_create_post_types(){
  $service_labels = array(
    'name' => esc_html_x('Services', 'post type name', 'burnsdental'),
    'singular_name' => esc_html_x('Service', 'post type singular name', 'burnsdental'),
    'menu_name' => esc_html_x('Services', 'post type menu name', 'burnsdental'),
    'add_new_item' => esc_html__('Add New Service', 'burnsdental'),
    'search_items' => esc_html__('Search Services', 'burnsdental'),
    'edit_item' => esc_html__('Edit Service', 'burnsdental'),
    'view_item' => esc_html__('View Service', 'burnsdental'),
    'all_items' => esc_html__('All Services', 'burnsdental'),
    'new_item' => esc_html__('New Service', 'burnsdental'),
    'not_found' => esc_html__('No Services Found', 'burnsdental')
  );
  $service_args= array(
    'labels' => $service_labels,
    'capability_type' => 'post',
    'public' => true,
    'menu_position' => 5,
    'menu_icon' => 'dashicons-heart',
    'query_var' => 'service',
    'has_archive' => false,
    'show_in_rest' => true,
    'supports' => array(
      'title',
      'editor',
      'custom-fields',
      'revisions'
    )
  );
  register_post_type('service', $service_args);

  $team_labels = array(
    'name' => esc_html_x('Team Members', 'post type name' , 'burnsdental'),
    'singular_name' => esc_html_x('Team Member', 'post type singular name' , 'burnsdental'),
    'menu_name' => esc_html_x('Team Members', 'post type menu name', 'burnsdental'),
    'add_new_item' => esc_html__('Add New Team Member', 'burnsdental'),
    'search_items' => esc_html__('Search Team Members', 'burnsdental'),
    'edit_item' => esc_html__('Edit Team Member', 'burnsdental'),
    'view_item' => esc_html__('View Team Member', 'burnsdental'),
    'all_items' => esc_html__('All Team Members', 'burnsdental'),
    'new_item' => esc_html__('New team Member', 'burnsdental'),
    'not_found' => esc_html__('No Team Members Found', 'burnsdental')
  );
  $team_args = array(
    'labels' => $team_labels,
    'capability_type' => 'post',
    'public' => true,
    'menu_position' => 5,
    'menu_icon' => 'dashicons-groups',
    'query_var' => 'team_member',
    'has_archive' => false,
    'show_in_rest' => true,
    'supports' => array(
      'title',
      'editor',
      'custom_fields',
      'revisions'
    )
  );
  register_post_type('team_member', $team_args);
}