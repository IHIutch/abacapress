<?php
/* 
Template Name: Home Page 
*/

namespace App;

use App\Http\Controllers\Controller;
use App\PostTypes\Project;
use Rareloop\Lumberjack\Http\Responses\TimberResponse;
use Rareloop\Lumberjack\Page;
use Rareloop\Lumberjack\QueryBuilder;
use Timber\Timber;
use Timber\Site;

class HomeController extends Controller
{
    public function handle()
    {
        $site = new Site();
        $page = new Page();
        $context = Timber::get_context();

        $projects = (new QueryBuilder)->wherePostType([
            Project::getPostType(),
        ])
            ->orderBy('date', 'asc')
            ->limit(6)
            ->get();

        $context = array_merge($context, [
            'site' => $site,
            'title' => $page->title,
            'text_content' => get_field('text_content'),
            'offerings' => get_field('offerings'),
            'featured' => get_field('featured'),
            'projects' => $projects
        ]);

        return new TimberResponse('templates/home.twig', $context);
    }
}
