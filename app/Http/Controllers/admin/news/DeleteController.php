<?php

namespace App\Http\Controllers\admin\news;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Support\Facades\Storage;

class DeleteController extends Controller
{
    public function __invoke(int $id)
    {
        $new = News::find($id);
        Storage::delete($new->image);
        $new->delete();

        return redirect()->back()->with("status", "Новость успешно удалена");
    }
}
