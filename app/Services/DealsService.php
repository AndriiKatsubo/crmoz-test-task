<?php

namespace App\Services;

class DealsService
{
    /**
     * Returns possible stages for a deal
     */
    public static function getStages()
    {
        $stages = ['Stage 1', 'Stage 2'];
        return collect($stages);
    }
}