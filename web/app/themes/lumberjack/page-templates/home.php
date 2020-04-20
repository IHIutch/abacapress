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
            'text_content' => get_field('text_content'),
            'offerings' => get_field('offerings'),
            'featured' => get_field('featured'),

            'phone_number' => get_field('phone_number', 'options'),
            'email' => get_field('email', 'options'),
            'address' => get_field('address', 'options'),
            'facebook_link' => get_field('facebook_link', 'options'),
            'instagram_link' => get_field('instagram_link', 'options'),
        ];

        return new TimberResponse('templates/home.twig', $context);
    }
}
