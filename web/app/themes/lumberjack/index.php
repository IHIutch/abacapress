<?php

/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists
 */

namespace App;

use App\Http\Controllers\Controller;
use App\Macros\CustomExcerpt;
use Rareloop\Lumberjack\Http\Responses\TimberResponse;
use Rareloop\Lumberjack\Post;
use Timber\Timber;

CustomExcerpt::getCustomExcerpt();

class IndexController extends Controller
{
    public function handle()
    {
        $context = Timber::get_context();

        $posts = Post::builder()
            ->orderBy('date', 'asc')
            ->limit(6)
            ->get();

        $context = array_merge($context, [
            'posts' => $posts
        ]);

        return new TimberResponse('templates/post-archive.twig', $context);
    }
}
