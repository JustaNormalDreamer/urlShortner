<?php

namespace App\Http\Controllers;

use App\Models\Url;

class UrlRedirectController extends Controller
{
    public function index(string $shortner)
    {
        $url = Url::where('minify', $shortner)->first();
        return redirect($url->url);
    }
}
