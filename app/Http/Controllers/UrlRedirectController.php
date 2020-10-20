<?php

namespace App\Http\Controllers;

use App\Models\Url;

class UrlRedirectController extends Controller
{
    public function index(string $shortner)
    {
        $url = Url::where('minify', $shortner)->firstOrFail();

        $url->update([
           'redirected' => $url->redirected + 1,
        ]);

        return redirect($url->url);
    }
}
