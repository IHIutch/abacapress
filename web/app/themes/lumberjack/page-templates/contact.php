<?php
/* 
Template Name: Contact Page 
*/

namespace App;

use App\Http\Controllers\Controller;
use Rareloop\Lumberjack\Http\Responses\TimberResponse;
use Rareloop\Lumberjack\Page;
use Timber\Timber;
use Timber\Site;

class ContactController extends Controller
{
    public function handle()
    {
        $site = new Site();
        $page = new Page();
        $context = Timber::get_context();

        $context  = [
            'site' => $site,
            'title' => $page->title,
            'content' => $page->content,
        ];

        return new TimberResponse('templates/contact.twig', $context);
    }
}
