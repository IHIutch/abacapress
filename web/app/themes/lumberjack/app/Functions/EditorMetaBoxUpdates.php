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
            remove_meta_box('postcustom', 'post', 'normal');
            remove_meta_box('trackbacksdiv', 'post', 'normal');
            remove_meta_box('commentstatusdiv', 'post', 'normal');
            remove_meta_box('commentsdiv', 'post', 'normal');
            remove_meta_box('slugdiv', 'post', 'normal');
            remove_meta_box('authordiv', 'post', 'normal');
            # Removes meta from pages #
            remove_meta_box('postcustom', 'page', 'normal');
            remove_meta_box('trackbacksdiv', 'page', 'normal');
            remove_meta_box('commentstatusdiv', 'page', 'normal');
            remove_meta_box('commentsdiv', 'page', 'normal');
            remove_meta_box('slugdiv', 'page', 'normal');
            remove_meta_box('authordiv', 'page', 'normal');
        });
    }
}
