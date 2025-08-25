<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveLinkRequest;
use App\Models\Link;
use App\Services\SaveClickService;
use App\Services\SaveLinkService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ShortenerController extends Controller
{
    public function __construct(
        public readonly SaveLinkService $linkService,
        public readonly SaveClickService $clickService,
    ) {}

    public function linkCheck(SaveLinkRequest $request): JsonResponse
    {
        if ($shortUrl = $this->linkService->execute($request->validated())) {
            return response()->json([
                'short_url' => url($shortUrl),
            ]);
        } else {
            return response()->json(['error' => 'Не удалось создать укороченную ссылку'], 400);
        }
    }

    public function redirect($shortUrl, Request $request): RedirectResponse
    {
        $link = Link::where('short_url', $shortUrl)->firstOrFail();

        $this->clickService->execute($request);

        return redirect()->to($link->original_url);
    }
}
