<?php

namespace App\Http\Controllers;

use App\Http\Requests\UrlRequest;
use App\Http\Resources\UrlResource;
use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UrlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return UrlResource
     */
    public function store(UrlRequest $request)
    {
        $url = Url::create([
           'name' =>  $request->name,
            'url' => $request->url,
            'minify' => $this->generateNewUrl()
        ]);

        return new UrlResource($url);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Url  $url
     * @return UrlResource
     */
    public function show($url)
    {
        $url = Url::where('minify', $url)->first();
        return new UrlResource($url);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Url  $url
     * @return \Illuminate\Http\Response
     */
    public function edit(Url $url)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Url  $url
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Url $url)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Url  $url
     * @return \Illuminate\Http\Response
     */
    public function destroy(Url $url)
    {
        //
    }

    private function if_exists(string $minifyUrl) :bool
    {
        return (Url::where('minify', $minifyUrl)->count() > 0);
    }

    private function generateNewUrl()
    {
        $newUrl = '';
        do {
            $newUrl = Str::random(10);
        } while($this->if_exists($newUrl));

        return $newUrl;
    }
}
