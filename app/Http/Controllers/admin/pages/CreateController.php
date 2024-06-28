<?php

namespace App\Http\Controllers\admin\pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\PagesRequest;
use Illuminate\Support\Str;
use App\Models\Pages;

class CreateController extends Controller
{
    public function __invoke(PagesRequest $request)
    {
        $data = $request->validated();
        $data["slug"] = $data["slug"] ? $data["slug"] : Str::slug($data["title"]);

        Pages::create($data);

        return redirect()->route("admin.pages.all")->with("status", "Страница успешно добавлена");
    }
}
