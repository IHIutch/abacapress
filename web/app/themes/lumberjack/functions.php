<?php

use App\Http\Lumberjack;
use App\Functions\EnqueueAssets;
use App\Functions\HideCommentsInAdminSidebar;
use App\Functions\AddAcfOptionsPage;
use App\Functions\EditorMetaBoxUpdates;

// Create the Application Container
$app = require_once('bootstrap/app.php');

// Bootstrap Lumberjack from the Container
$lumberjack = $app->make(Lumberjack::class);
$lumberjack->bootstrap();

// Custom Functions
EnqueueAssets::enqueueAssets();
HideCommentsInAdminSidebar::hideCommentsInAdminSidebar();
AddAcfOptionsPage::addAcfOptionsPage();
AddAcfOptionsPage::accessAcfOptionsGlobally();
EditorMetaBoxUpdates::yoastToEditorBottom();
EditorMetaBoxUpdates::hideUnusedMetaBoxes();

// Import our routes file
require_once('routes.php');

// Set global params in the Timber context
add_filter('timber_context', [$lumberjack, 'addToContext']);

// add_filter('timber_context', 'mytheme_timber_context');

// function mytheme_timber_context($context)
// {
//     $context['options'] = get_fields('options');
//     return $context;
// }
