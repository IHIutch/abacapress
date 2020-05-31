<?php

namespace App\Macros;

use Rareloop\Lumberjack\Post;

class CustomMeta
{

    public static function getCustomExceprt()
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

    public static function getCustomThumbnail()
    {
        Post::macro('custom_thumbnail', function () {
            $image = '';
            $sections = $this->meta('content');
            if (!empty($sections)) {
                foreach ($sections as $s) {
                    if ($s['acf_fc_layout'] == 'single_column_image' && !empty($s['image']['url'])) {
                        $image = $s['image'];
                        break;
                    } else if ($s['acf_fc_layout'] == 'double_column_image' && !empty($s['group_1']['image']['url'])) {
                        $image = $s['group_1']['image'];
                        break;
                    } else if ($s['acf_fc_layout'] == 'double_column_image' && !empty($s['group_2']['image']['url'])) {
                        $image = $s['group_2']['image'];
                        break;
                    }
                };
            }
            return $image;
        });
    }
}
