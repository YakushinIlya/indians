<?php

namespace App\Http\Controllers\admin\rubrics;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\RubricsRequest;
use App\Models\Rubrics;
use Illuminate\Support\Str;

class CreateController extends Controller
{
    public function __invoke(RubricsRequest $request)
    {
        $data = $request->validated();
        $data["slug"] = $data["slug"] ? $data["slug"] : Str::slug($data["title"]);

        Rubrics::create($data);

        return redirect()->route("admin.rubrics.all")->with("status", "Раздел новости успешно добавлен");
    }
}
