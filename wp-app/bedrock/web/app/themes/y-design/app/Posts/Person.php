<?php

namespace App\Posts;

use App\Posts\Base\PostBuilder;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Person extends PostBuilder
{
    public const NAME = 'person';
    public const DEPARTMENT_TAX = 'department';
    protected $gutenberg_enabled = false;
    protected $fields;

    public function __construct()
    {
        $this->fields = new FieldsBuilder(static::NAME);
    }

    public function registerPost()
    {
        $args = [
            'label'                 => __('Personen', 'sage'),
            'description'           => __('Personen', 'sage'),
            'labels'                => [
                'name'                  => __('Personen', 'sage'),
                'singular_name'         => __('Person', 'sage'),
                'menu_name'             => __('Personen', 'sage'),
                'name_admin_bar'        => __('Person', 'sage'),
                'archives'              => __('Person Archives'),
                'attributes'            => __('Person Attributes'),
                'parent_item_colon'     => __('Parent Item:'),
                'all_items'             => __('Person', 'sage'),
                'add_new_item'          => __('Person hinzufügen', 'sage'),
                'add_new'               => __('Neue Person', 'sage'),
                'new_item'              => __('Neue Person', 'sage'),
                'edit_item'             => __('Person bearbeiten', 'sage'),
                'update_item'           => __('Person aktualisieren', 'sage'),
                'view_item'             => __('Person anzeigen', 'sage'),
                'view_items'            => __('Personen anzeigen', 'sage'),
            ],
            'supports'              => ['title', 'content', 'thumbnail', 'revisions'],
            'taxonomies'            => [],
            // 'menu_icon'             => $this->getIcon('group.svg'),
            'rewrite'      => [
                'slug' => 'person',
                'with_front' => true,
            ],
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 4,
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => false,
            'can_export'            => true,
            'has_archive'           => false,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'post',
            // "cptp_permalink_structure" => "/%department%/person/%postname%/",
            'show_in_rest' => true, // Gutenberg support
        ];
        register_post_type(static::NAME, $args);

        /* var_dump('tssta'); */

        register_taxonomy(
            self::DEPARTMENT_TAX,
            self::NAME,
            [
                'label' => __('Abteilung', 'sage'),
                'labels' => [
                    'name'              => _x('Abteilungen', 'taxonomy general name', 'sage'),
                    'singular_name'     => _x('Abteilung', 'taxonomy singular name', 'sage'),
                    'search_items'      => __('Abteilung suchen', 'sage'),
                    'all_items'         => __('Alle Abteilungen', 'sage'),
                    'view_item'         => __('Abteilung zeigen', 'sage'),
                    'parent_item'       => __('Übergeordnete Abteilung', 'sage'),
                    'parent_item_colon' => __('Übergeordnete Abteilung:', 'sage'),
                    'edit_item'         => __('Abteilung bearbeiten', 'sage'),
                    'update_item'       => __('Abteilung aktualisieren', 'sage'),
                    'add_new_item'      => __('Neue Abteilung hinzufügen', 'sage'),
                    'new_item_name'     => __('Neuer Abteilungsname', 'sage'),
                    'not_found'         => __('Keine Abteilungen gefunden', 'sage'),
                    'back_to_items'     => __('Zurück zu den Abteilungen', 'sage'),
                    'menu_name'         => __('Abteilungen', 'sage'),
                ],
                // 'rewrite' => [
                //     'slug' => 'personen/abteilung',
                //     "with_front" => true,
                //     'hierarchical' => true,
                // ],
                'hierarchical'              => true,
                'public'                    => true,
                'show_ui'                   => true,
                'show_admin_column'         => true,
                'show_in_nav_menus'         => true,
                'has_archive'               => true,
                'show_in_quick_edit'        => true,
            ]
        );
    }

    public function registerFields()
    {
        $this->fields
        ->addTab(static::NAME, [
            'label' => __('Inhalt', 'sage'),
        ])
            ->addWysiwyg('wysiwyg_field', [
                'label' => 'WYSIWYG Field',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => [],
                'wrapper' => [
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ],
                'default_value' => '',
                'tabs' => 'all',
                'toolbar' => 'full',
                'media_upload' => 1,
                'delay' => 0,
            ])

        ; // Hier schließt sich der block

        $this->fields->setLocation("post_type", "==", static::NAME);

        acf_add_local_field_group($this->fields->build());
    }
}