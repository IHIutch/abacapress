<?php

namespace App\Functions;

class HideComments
{
    /**
     * Enqueue scripts
     */
    public static function hideComments()
    {
        add_action('admin_menu', function () {
            remove_menu_page('edit-comments.php');
        });
    }
}
