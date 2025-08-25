<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveLinkRequest;
use App\Services\SaveClickService;
use App\Services\SaveLinkService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

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

    public function redirect($shortUrl): RedirectResponse
    {
        $originalUrl = $this->clickService->execute($shortUrl);

        return redirect()->to($originalUrl);
    }
}
