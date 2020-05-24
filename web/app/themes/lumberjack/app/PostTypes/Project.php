<?php

namespace App\PostTypes;

use Rareloop\Lumberjack\Post;

class Project extends Post
{
    /**
     * Return the key used to register the post type with WordPress
     * First parameter of the `register_post_type` function:
     * https://codex.wordpress.org/Function_Reference/register_post_type
     *
     * @return string
     */
    public static function getPostType()
    {
        return 'projects';
    }

    /**
     * Return the config to use to register the post type with WordPress
     * Second parameter of the `register_post_type` function:
     * https://codex.wordpress.org/Function_Reference/register_post_type
     *
     * @return array|null
     */
    protected static function getPostTypeConfig()
    {
        return [
            'labels' => [
                'name' => __('Projects'),
                'singular_name' => __('Project'),
                'add_new_item' => __('Add New Project'),
            ],
            'menu_icon' => __('dashicons-format-image'),
            'public' => true,
            'has_archive'   => true,
            'supports' => ['title', 'thumbnail', 'excerpt']
        ];
    }

    public function custom_excerpt()
    {
        $excerpt = '';
        $sections = $this->meta('content');
        foreach ($sections as $s) {
            if ($s['acf_fc_layout'] == 'text_area' && !empty($s['text_area'])) {
                $excerpt = $s['text_area'];
                break;
            }
        };
        return $excerpt;
    }
}
