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
            'projects' => $projects,

            'phone_number' => get_field('phone_number', 'options'),
            'email' => get_field('email', 'options'),
            'address' => get_field('address', 'options'),
            'facebook_link' => get_field('facebook_link', 'options'),
            'instagram_link' => get_field('instagram_link', 'options'),
        ];

        return new TimberResponse('templates/project-archive.twig', $context);
    }
}
