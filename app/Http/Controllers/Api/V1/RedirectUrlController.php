<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Url;

class RedirectUrlController extends Controller
{
    public function __invoke(string $url)
    {
        $redirection = Url::where('short_url', $url)->firstOrFail();

        return redirect()->away($redirection->long_url);
    }
}
