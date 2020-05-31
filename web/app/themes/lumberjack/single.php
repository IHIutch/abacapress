<?php

/**
 * The Template for displaying all single posts
 */

namespace App;

use App\Http\Controllers\Controller;
use App\Macros\CustomExcerpt;
use Rareloop\Lumberjack\Http\Responses\TimberResponse;
use Rareloop\Lumberjack\Post;
use Timber\Timber;

CustomExcerpt::getCustomExcerpt();

class SingleController extends Controller
{
    public function handle()
    {
        $context = Timber::get_context();
        $post = new Post();

        $more_posts = Post::builder()
            ->orderBy('date', 'asc')
            ->limit(6)
            ->get();

        $context['post'] = $post;
        $context['title'] = $post->title;
        $context['content'] = $post->content;
        $context['more_posts'] = $more_posts;

        return new TimberResponse('templates/general.twig', $context);
    }
}
