<?php

namespace App;

use App\Http\Controllers\Controller;
use Rareloop\Lumberjack\Http\Responses\TimberResponse;
use App\PostTypes\Project;
use Timber\Timber;
use Timber\Site;

class ArchiveProjectsController extends Controller
{
    public function handle()
    {
        $site = new Site();
        $context = Timber::get_context();
        $projects = Project::all(10, 'title', 'asc');

        $context = array_merge($context, [
            'site' => $site,
            'projects' => $projects,
        ]);

        return new TimberResponse('templates/project-archive.twig', $context);
    }
}
