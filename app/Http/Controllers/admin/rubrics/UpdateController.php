<?php

namespace App\Http\Controllers\admin\rubrics;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\RubricsRequest;
use App\Models\Rubrics;
use Illuminate\Support\Str;

class UpdateController extends Controller
{
    public function __invoke(RubricsRequest $request, int $id)
    {
        $data = $request->validated();
        $data["slug"] = $data["slug"] ? $data["slug"] : Str::slug($data["title"]);

        $rubric = Rubrics::find($id);
        $rubric->update($data);

        return redirect()->back()->with("status", "Раздел новости успешно изменен");
    }
}
