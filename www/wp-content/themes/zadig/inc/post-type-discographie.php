<?php


function discographie_register_post_type()
{
    $labels = [
        'name' => "Discographie",
        'singular_name' => "Discographie",
        'add_new' => "Ajouter disque",
        'all_items' => 'Toutes les disques',
        'add_new_item' => "Ajouter disque",
        'edit_item' => "Editer disque",
        'new_item' => "Nouveau disque",
        'view_item' => "Voir disque",
        'search_item' => "Chercher disque",
        'not_found_item' => "Pas de disques trouvés",
        'not_found_in_trash' => "Pas de disques trouvés dans la corbeille",
        'parent_item_colon' => "Parent disque",
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

            /*    ['core/cover', [
                'className' => 'zadig_banner',
                'overlayColor' => 'vivid-red',
                'dimRatio' => 0,
            ], [
                ['core/heading', [
                    'placeholder' => 'Titre',
                    'align' => 'center',
                    'level' => 1
                ]]
            ]], */

            [
                'core/column', ['className' => 'zadig_discographie'], [



                    ['core/image', ['className' => 'zadig_discographie_pochette'], []],


                    [
                        'core/column', [], [

                            ['core/heading', [
                                'placeholder' => 'Titre',
                                'level' => 3
                            ]],
                            ['core/heading', [
                                'placeholder' => 'Programme',
                                'level' => 4
                            ]],
                            ['core/paragraph', [
                                'placeholder' => 'sous titre',
                            ]],
                            ['core/paragraph', [
                                'className' => 'zadig_discographie_description',
                                'placeholder' => 'Description'
                            ]],


                            [
                                'core/columns', ['className' => 'zadig_discographie_link'], [

                                    ['core/column', [], [

                                        ['core/button', [
                                            'placeholder' => 'Ecouter extrait',
                                        ]],
                                    ]],
                                    [
                                        'core/column', [], [

                                            ['core/button', [
                                                'placeholder' => 'Acheter',
                                            ]],




                                        ]
                                    ]
                                ]
                            ]
                        ],


                    ]
                ],
            ]
            /*   ['core/columns', ['className' => 'zadig_realisation-description'], [

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
                        'className' => 'zadig_realisation-description--left',
                        'placeholder' => 'Description gauche'
                    ]]
                ]],

                ['core/column', ['className' => 'zadig_realisation-description--right'], [
                    ['core/paragraph', [                      
                        'placeholder' => 'Description droite'
                    ]]
                ]]
            ]], */

            /*    ['core/image', [
                'sizeSlug' => 'full',
                'className' => 'zadig_realisation-image'
            ]],

            ['core/columns', ['className' => 'zadig_realisation-content'], [

                ['core/column', [], []],
                ['core/column', [], []]
            ]], */
        ],
        //  'template_lock' => 'all', // verrouiller le modèle pour empêcher les modifications
    );
    register_post_type('discographie', $args);
}
add_action('init', 'discographie_register_post_type');
