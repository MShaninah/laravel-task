<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

class ArticleController extends Controller
{
    /**
     * Show the form for creating a new articles
     *
     * @return Application|Factory|View
     */

    public function index() {

        $articles = Article::all();
        return view('articles.blogView')->with('articles', $articles);
    }

    /**
     * Show the form for creating a new articles
     *
     * @return Application|Factory|View
     */
    public function create() : View {
        return view('articles.create');
    }

    /**
     * Show the form for creating a new articles
     *
     * @param Request $request
     * @return Application|Redirector|RedirectResponse
     */
    public function store(Request $request) : RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,png'
        ]);

        $imageName = time() . '_' . $request->title . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        Article::create([
            'title' => $request->input('title'),
            'body' => $request->input('description'),
            'image_path' => $imageName
        ]);

        return redirect('/articles');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $article = Article::find($id);
        return view('articles.show')->with('article', $article);
    }

    /**
     * Show the form for editing an articles
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit(int $id) : View {
        $article = Article::find($id);

        return view('articles.edit')->with('article', $article);
    }

    /**
     * Show the form for editing an articles
     *
     * @param int $id
     * @param Request $request
     * @return Application|Redirector|RedirectResponse
     */
    public function update(Request $request, int $id) : RedirectResponse {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,png'
        ]);
        $imageName = time() . '_' . $request->title . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        Article::where('id', $id)
            ->update([
                'title' => $request->input('title'),
                'body' => $request->input('description'),
                'image_path' => $imageName
        ]);
        return redirect('/articles');
    }

    /**
     * Show the form for editing an articles
     *
     * @param int $id
     * @return Application|Redirector|RedirectResponse
     */
    public function destroy(int $id) : RedirectResponse {

        $article = Article::find($id);
        $article->delete();
        return redirect('/articles');
    }


}
