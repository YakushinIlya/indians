<?php

namespace App\Http\Controllers\admin\pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\PagesRequest;
use App\Models\Pages;
use Illuminate\Support\Str;

class UpdateController extends Controller
{
    public function __invoke(PagesRequest $request, int $id)
    {
        $data = $request->validated();
        $data["slug"] = $data["slug"] ? $data["slug"] : Str::slug($data["title"]);

        $page = Pages::find($id);
        $page->update($data);

        return redirect()->back()->with("status", "Страница успешно изменена");
    }
}
