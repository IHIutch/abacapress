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

        $context  = [
            'site' => $site,
            'projects' => $projects,

            'options' => get_field('options'),
            'phone_number' => get_field('phone_number', 'options'),
            'email' => get_field('email', 'options'),
            'address' => get_field('address', 'options'),
            'facebook_link' => get_field('facebook_link', 'options'),
            'instagram_link' => get_field('instagram_link', 'options')
        ];

        return new TimberResponse('templates/project-archive.twig', $context);
    }
}
