<?php

namespace App\Services;

use App\Models\Link;
use Illuminate\Support\Str;

class SaveLinkService
{
    public function execute(array $data)
    {
        if ($link = Link::where('original_url', $data['url'])->first()) {
            return $link->short_url;
        } else {
            do {
                $short_url = Str::random(6);
            } while (Link::where('short_url', $short_url)->exists());

            Link::create([
                'original_url' => $data['url'],
                'short_url' => $short_url,
            ]);

            return $short_url;
        }
    }
}
