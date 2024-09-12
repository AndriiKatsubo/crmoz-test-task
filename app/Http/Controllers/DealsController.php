<?php

namespace App\Http\Controllers;

use App\Services\DealsService;

class DealsController extends Controller
{
    // Returns possible stages for a deal
    public static function getStages()
    {
        return DealsService::getStages()->toJson();
    }
}
