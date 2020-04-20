<?php
/* 
Template Name: Home Page 
*/

namespace App;

use App\Http\Controllers\Controller;
use Rareloop\Lumberjack\Http\Responses\TimberResponse;
use Rareloop\Lumberjack\Page;
use Timber\Timber;
use Timber\Site;

class HomeController extends Controller
{
    public function handle()
    {
        $site = new Site();
        $page = new Page();
        $context = Timber::get_context();

        $context  = [
            'site' => $site,
            'title' => $page->title,
            'content' => $page->content,
            'text_content' => get_field('text_content'),
            'offerings' => get_field('offerings'),
            'featured' => get_field('featured'),
        ];

        return new TimberResponse('templates/home.twig', $context);
    }
}
