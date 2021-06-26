<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryDelController extends Controller
{
    public function destroy($categoryid)
    {
        $category = Category::findOrFail($categoryid);
        dd($category);
        $category->delete();
        return redirect()->route('categories.index');
    }
}
