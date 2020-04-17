<?php
/* 
Template Name: Project List
*/

namespace App;

use App\Http\Controllers\Controller;
use Rareloop\Lumberjack\Http\Responses\TimberResponse;
use Rareloop\Lumberjack\Page;
use App\PostTypes\Project;
use Rareloop\Lumberjack\QueryBuilder;
use Timber\Timber;

class ProjectArchiveController extends Controller
{
    public function handle()
    {
        $context = Timber::get_context();
        $page = new Page();

        $posts = (new QueryBuilder)->wherePostType([
            Project::getPostType(),
        ])
            ->orderBy('date', 'asc')
            ->get();

        $context  = [
            'title' => $page->title,
            'content' => $page->content,
            'projects' => $posts
        ];

        return new TimberResponse('templates/project-archive.twig', $context);
    }
}
