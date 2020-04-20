<?php

namespace App;

use App\Http\Controllers\Controller;
use App\PostTypes\Project;
use Rareloop\Lumberjack\Http\Responses\TimberResponse;
use Rareloop\Lumberjack\QueryBuilder;
use Rareloop\Lumberjack\Page;
use Timber\Timber;
use Timber\Site;

class ProjectArchiveController extends Controller
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
            ->get();

        $context  = [
            'site' => $site,
            'title' => $page->title,
            'content' => $page->content,
            'projects' => $projects
        ];

        return new TimberResponse('templates/project-archive.twig', $context);
    }
}
