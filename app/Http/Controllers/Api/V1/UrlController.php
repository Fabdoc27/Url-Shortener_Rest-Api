<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUrlRequest;
use App\Http\Resources\UrlCollection;
use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class UrlController extends Controller
{
    public function index(Request $request)
    {
        $urls = $request->user()->urls()->paginate(10);

        return new UrlCollection($urls);
    }

    public function store(StoreUrlRequest $request)
    {
        $exitingUrl = Url::where('user_id', $request->user()->id)
            ->where('long_url', $request->long_url)
            ->first();

        if ($exitingUrl) {
            return response()->json([
                'success' => true,
                'short_url' => $exitingUrl->short_url,
            ], 200);
        }

        do {
            $shortUrl = Str::random(6);
        } while (Url::where('short_url', $shortUrl)->exists());

        $url = $request->user()->urls()->create([
            'long_url' => $request->long_url,
            'short_url' => $shortUrl,
        ]);

        return response()->json([
            'success' => true,
            'short_url' => $url->short_url,
        ], 201);
    }

    public function destroy(Url $url)
    {
        if (Gate::denies('url-owner', $url)) {
            return response()->json([
                'success' => false,
                'message' => 'You do not have permission to delete this short url',
            ], 403);
        }

        $url->delete();

        return response()->noContent();
    }
}
