<?php

namespace App\Macros;

use Rareloop\Lumberjack\Post;

class CustomExcerpt
{
    public static function getCustomExcerpt()
    {
        Post::macro('custom_excerpt', function () {
            $excerpt = '';
            $sections = $this->meta('content');
            if (!empty($sections)) {
                foreach ($sections as $s) {
                    if ($s['acf_fc_layout'] == 'text_area' && !empty($s['text_area'])) {
                        $excerpt = $s['text_area'];
                        break;
                    }
                };
            }
            return $excerpt;
        });
    }
}
