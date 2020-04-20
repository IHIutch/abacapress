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

        $context = array_merge($context, [
            'site' => $site,
            'title' => $page->title,
        ]);

        return new TimberResponse('templates/contact.twig', $context);
    }
}
