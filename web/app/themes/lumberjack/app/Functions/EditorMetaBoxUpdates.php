<?php

namespace App\Functions;

class EditorMetaBoxUpdates
{
    public static function yoastToEditorBottom()
    {
        add_filter('wpseo_metabox_prio', function () {
            return 'low';
        });
    }

    public static function hideUnusedMetaBoxes()
    {
        add_action('admin_init', function () {
            # Removes meta from Posts #
            remove_meta_box('authordiv', 'post', 'normal');
            remove_meta_box('commentsdiv', 'post', 'normal');
            remove_meta_box('commentstatusdiv', 'post', 'normal');
            remove_meta_box('postexcerpt', 'post', 'normal');
            remove_meta_box('slugdiv', 'post', 'normal');
            remove_meta_box('trackbacksdiv', 'post', 'normal');
            # Removes meta from cpt, "projects" #
            remove_meta_box('slugdiv', 'projects', 'normal');
            # Removes meta from pages #
            remove_meta_box('authordiv', 'page', 'normal');
            remove_meta_box('commentsdiv', 'page', 'normal');
            remove_meta_box('commentstatusdiv', 'page', 'normal');
            remove_meta_box('postexcerpt', 'page', 'normal');
            remove_meta_box('slugdiv', 'page', 'normal');
            remove_meta_box('trackbacksdiv', 'page', 'normal');
        });
    }

    public static function hideDefaultEditor()
    {

        add_action('admin_init', function () {
            remove_post_type_support('post', 'author');
            remove_post_type_support('post', 'comments');
            remove_post_type_support('post', 'editor');
            // remove_post_type_support('post', 'excerpt');
            remove_post_type_support('post', 'trackbacks');


            remove_post_type_support('page', 'author');
            remove_post_type_support('page', 'comments');
            remove_post_type_support('page', 'editor');
            // remove_post_type_support('page', 'excerpt');
            remove_post_type_support('page', 'thumbnail');
            remove_post_type_support('page', 'trackbacks');
        });
    }
}
