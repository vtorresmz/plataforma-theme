<?php
function registrar_cpt_hero() {

    $labels = array(
        'name'                  => 'hero',
        'singular_name'         => 'hero',
        'menu_name'             => 'hero',
        'name_admin_bar'        => 'hero',
        'add_new'               => 'Añadir nuevo',
        'add_new_item'          => 'Añadir nueva Bicicleta',
        'new_item'              => 'Nuevo hero',
        'edit_item'             => 'Editar hero',
        'view_item'             => 'Ver hero',
        'all_items'             => 'Todas las hero',
        'search_items'          => 'Buscar hero',
        'not_found'             => 'No se encontraron hero',
        'not_found_in_trash'    => 'No se encontraron hero en la papelera',
        'featured_image'        => 'Imagen destacada',
        'set_featured_image'    => 'Asignar imagen destacada',
        'remove_featured_image' => 'Quitar imagen destacada',
        'use_featured_image'    => 'Usar como imagen destacada',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'menu_icon'          => 'dashicons-edit',
        'rewrite'            => array('slug' => 'hero'),
        'show_in_rest'       => true,
        'supports'           => array( 'title','editor', 'excerpt', 'thumbnail', 'page-attributes'),
        'menu_position'      => 5,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'capability_type'    => 'post',
    );

    register_post_type('hero', $args);
}
add_action('init', 'registrar_cpt_hero');
