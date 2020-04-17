<?php

namespace App;

use App\Http\Controllers\Controller;
use Rareloop\Lumberjack\Http\Responses\TimberResponse;
use App\PostTypes\Project;
use Timber\Timber;

class ArchiveProjectsController extends Controller
{
    public function handle()
    {
        $context = Timber::get_context();
        $projects = Project::all(10, 'title', 'asc');

        $context  = [
            'projects' => $projects,
        ];

        return new TimberResponse('templates/project-archive.twig', $context);
    }
}
