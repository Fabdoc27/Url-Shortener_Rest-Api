<?php

namespace App\Http\Controllers\Api\V2;

use App\Http\Controllers\Controller;
use App\Models\Url;

/**
 * @tags Redirect User
 */
class RedirectUrlController extends Controller
{
    /**
     *  Redirect Url v2
     */
    public function __invoke(string $url)
    {
        $redirection = Url::where('short_url', $url)->firstOrFail();

        $redirection->increment('views');

        return redirect()->away($redirection->long_url);
    }
}
