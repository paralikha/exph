<?php

namespace Story\Controllers;

use Catalogue\Models\Catalogue;
use Category\Models\Category;
use Frontier\Controllers\AdminController;
use Illuminate\Http\Request;
use Pluma\Controllers\Controller;
use Story\Models\Story;
use Story\Requests\StoryRequest;
use Template\Models\Template;
use User\Models\User;

class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $resources = Story::paginate();

        return view("Theme::stories.index")->with(compact('resources'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //

        return view("Theme::stories.show");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $templates = Template::getTemplatesFromFiles();
        $catalogues = Catalogue::mediabox();
        $categories = Category::type('stories')->pluck('name', 'id');

        return view("Theme::stories.create")->with(compact('templates', 'catalogues', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Story\Requests\StoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoryRequest $request)
    {
        $story = new Story();
        $story->title = $request->input('title');
        $story->code = $request->input('code');
        $story->feature = $request->input('feature');
        $story->body = $request->input('body');
        $story->delta = $request->input('delta');
        $story->template = $request->input('template');
        $story->user()->associate(User::find($request->input('user')));
        $story->category()->associate(Category::find($request->input('category')));
        $story->save();

        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $resource = Story::findOrFail($id);
        $templates = Template::getTemplatesFromFiles();
        $catalogues = Catalogue::mediabox();
        $categories = Category::type('stories')->pluck('name', 'id');

        return view("Theme::stories.edit")->with(compact('resource', 'templates', 'catalogues', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Story\Requests\StoryRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoryRequest $request, $id)
    {
        $story = Story::findOrFail($id);
        $story->title = $request->input('title');
        $story->code = $request->input('code');
        $story->feature = $request->input('feature');
        $story->body = $request->input('body');
        $story->delta = $request->input('delta');
        $story->template = $request->input('template');
        $story->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $story = Story::findOrFail($id);
        $story->delete();

        return redirect()->route('stories.index');
    }

    /**
     * Display a listing of the trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trash()
    {
        //

        return view("Theme::stories.trash");
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param  \Story\Requests\StoryRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore(StoryRequest $request, $id)
    {
        //

        return back();
    }

    /**
     * Delete the specified resource from storage permanently.
     *
     * @param  \Story\Requests\StoryRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(StoryRequest $request, $id)
    {
        //

        return redirect()->route('stories.trash');
    }
}
