<?php

namespace App\Http\Controllers\fertilizer;

use App\Http\Controllers\Controller;
use App\Models\fertilizer\category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function index(): View
    {
        return view('fertilizer.category', [
            'categories' => category::query()
                ->latest()
                ->get()
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validate = $request->validate(['name' => 'required|unique:categories']);
        category::create($validate);
        toast("Category (वर्ग) थप्न सफल भयो ", "success");
        return redirect()->back();
    }

    public function update(category $category, Request $request): RedirectResponse
    {
        $validate = $request->validate([
            'name' => [
                'required',
                Rule::unique('categories')
                    ->ignore($category)
            ]
        ]);

        $category->update($validate);
        toast("Category (वर्ग) सच्याउन सफल भयो ", "success");
        return redirect()->back();
    }
}
