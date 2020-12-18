<?php


function realisation_register_post_type()
{
    $labels = [
        'name' => "Réalisations",
        'singular_name' => "Réalisation",
        'add_new' => "Ajouter réalisation",
        'all_items' => 'Toutes les réalisations',
        'add_new_item' => "Ajouter réalisation",
        'edit_item' => "Editer Réalisation",
        'new_item' => "Nouvelle réalisation",
        'view_item' => "Voir réalisation",
        'search_item' => "Chercher Réalisation",
        'not_found_item' => "Pas de réalisations trouvées",
        'not_found_in_trash' => "Pas de réalisations trouvées dans la corbeille",
        'parent_item_colon' => "Parent réalisation",
    ];
    $args = array(
        'public' => true,
        'labels' => $labels,
        'has_archive'  => true,
        'publicly_queryable' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'supports' => ['title', 'editor', 'excerpt', 'thumbnail', 'revisions'],
        'show_in_rest' => true,
        // 'taxonomies' => ['category','post_tag'],
        'menu_position' => 5,
        'exclude_from_search' => false,
        'menu_icon' => 'dashicons-awards',
        'template' => [

            ['core/cover', [
                'className' => 'rossinante_banner',
                'overlayColor' => 'vivid-red',
                'dimRatio' => 0,
            ], [
                ['core/heading', [
                    'placeholder' => 'Titre',
                    'align' => 'center',
                    'level' => 1
                ]]
            ]],

            ['core/columns', ['className' => 'rossinante_realisation-description'], [

                ['core/column', [], [

                    ['core/heading', [
                        'placeholder' => 'Premier titre',
                        'level' => 2
                    ]],
                    ['core/heading', [
                        'placeholder' => 'Deuxième titre',
                        'level' => 3
                    ]],
                    ['core/paragraph', [
                        'className' => 'rossinante_realisation-description--left',
                        'placeholder' => 'Description gauche'
                    ]]
                ]],

                ['core/column', ['className' => 'rossinante_realisation-description--right'], [
                    ['core/paragraph', [                      
                        'placeholder' => 'Description droite'
                    ]]
                ]]
            ]],

            ['core/image', [
                'sizeSlug' => 'full',
                'className' => 'rossinante_realisation-image'
            ]],

            ['core/columns', ['className' => 'rossinante_realisation-content'], [

                ['core/column', [], []],
                ['core/column', [], []]
            ]],
        ],
        //  'template_lock' => 'all', // verrouiller le modèle pour empêcher les modifications
    );
    register_post_type('realisation', $args);
}
add_action('init', 'realisation_register_post_type');
