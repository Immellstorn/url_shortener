<?php

namespace App\Services;

use App\Models\Click;
use App\Models\Link;

class SaveClickService
{
    public function execute($shortUrl): string
    {
        $link = Link::where('short_url', $shortUrl)->firstOrFail();

        Click::create([
            'ip' => request()->ip(),
            'user_agent' => request()->header('User-Agent'),
            'clicked_at' => now(),
            'link_id' => $link->id,
        ]);

        return $link->original_url;
    }
}
