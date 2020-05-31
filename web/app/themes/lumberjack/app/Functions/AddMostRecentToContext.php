<?php

namespace App\Functions;

use Rareloop\Lumberjack\Post;

class AddMostRecentToContext
{
    public static function mostRecentBlogToContext()
    {
        add_filter('timber_context', function ($context) {
            $posts = Post::builder()
                ->orderBy('date', 'asc')
                ->limit(1)
                ->get();

            $context['most_recent_blog'] = $posts[0];
            return $context;
        });
    }
}
