<?php

namespace App\Http\Controllers\admin\news;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\NewsRequest;
use Illuminate\Support\Str;
use App\Models\News;

class CreateController extends Controller
{
    public function __invoke(NewsRequest $request)
    {
        $data = $request->validated();
        $data["slug"] = $data["slug"] ? $data["slug"] : Str::slug($data["title"]);

        if ($request->hasFile('image')) {
            $data["image"] = "/storage/".$request->image->store('images', 'public');
        }

        $new = News::create($data);
        $new->rubric()->attach($data["rubric"]);

        return redirect()->route("admin.news.all")->with("status", "Новость успешно добавлена");
    }
}
