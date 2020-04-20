<?php

namespace App\Functions;

class HideCommentsInAdminSidebar
{
    public static function hideCommentsInAdminSidebar()
    {
        add_action('admin_menu', function () {
            remove_menu_page('edit-comments.php');
        });
    }
}
