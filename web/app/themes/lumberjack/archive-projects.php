<?php

namespace App;

use App\Http\Controllers\Controller;
use Rareloop\Lumberjack\Http\Responses\TimberResponse;
use App\PostTypes\Project;
use Rareloop\Lumberjack\QueryBuilder;
use Timber\Timber;

class HomeController extends Controller
{
    public function handle()
    {
        $context = Timber::get_context();
        $posts = (new QueryBuilder)->wherePostType([
            Project::getPostType(),
        ])->orderBy('date', 'asc')->get();

        $context  = [
            'posts' => $posts,
        ];

        return new TimberResponse('templates/project-archive.twig', $context);
    }
}
