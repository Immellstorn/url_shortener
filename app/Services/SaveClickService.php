<?php

namespace App\Services;

use App\Models\Click;
use Illuminate\Http\Request;

class SaveClickService
{
    public function execute(Request $request): void
    {
        Click::create([
            'ip' => $request->ip(),
            'user_agent' => $request->header('User-Agent'),
            'clicked_at' => now(),
        ]);
    }
}
