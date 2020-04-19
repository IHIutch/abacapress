<?php
/* 
Template Name: Contact Page 
*/

namespace App;

use App\Http\Controllers\Controller;
use Rareloop\Lumberjack\Http\Responses\TimberResponse;
use Rareloop\Lumberjack\Page;
use Timber\Timber;

class ContactController extends Controller
{
    public function handle()
    {
        $context = Timber::get_context();
        $page = new Page();

        $context  = [
            'title' => $page->title,
            'content' => $page->content,
        ];

        return new TimberResponse('templates/contact.twig', $context);
    }
}
