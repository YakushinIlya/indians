<?php

namespace App\Http\Controllers\admin\news;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\NewsRequest;
use App\Models\News;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class UpdateController extends Controller
{
    public function __invoke(NewsRequest $request, int $id)
    {
        $data = $request->validated();
        $data["slug"] = $data["slug"] ? $data["slug"] : Str::slug($data["title"]);

        $new  = News::find($id);

        if ($request->hasFile('image')) {
            File::delete(public_path().$new->image);
            $data["image"] = "/storage/".$request->image->store('images', 'public');
        }

        $new->update($data);

        if($data["rubric"]) {
            $new->rubric()->detach();
            $new->rubric()->attach($data["rubric"]);
        }

        return redirect()->back()->with("status", "Новость успешно изменена");
    }
}
