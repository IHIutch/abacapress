<?php

namespace App;

use App\Http\Controllers\Controller;
use App\Macros\CustomExcerpt;
use Rareloop\Lumberjack\Http\Responses\TimberResponse;
use App\PostTypes\Project;
use Timber\Timber;
use Timber\Site;

CustomExcerpt::getCustomExcerpt();

class ArchiveProjectsController extends Controller
{
    public function handle()
    {
        $site = new Site();
        $context = Timber::get_context();

        $projects = Project::builder()
            ->orderBy('date', 'asc')
            ->limit(6)
            ->get();

        $context = array_merge($context, [
            'site' => $site,
            'projects' => $projects,
        ]);

        return new TimberResponse('templates/project-archive.twig', $context);
    }
}
