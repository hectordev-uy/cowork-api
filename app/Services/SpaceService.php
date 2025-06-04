<?php

namespace App\Services;

use App\Models\Space;

class SpaceService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function byId(int $id) : Space | null
    {
        return Space::findOrFail($id);
    }
}
