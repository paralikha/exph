<?php

namespace Test\Controllers;

use Frontier\Controllers\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Test\Models\Test;
use Test\Requests\TestRequest;

class TestController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd($resources);
        $resources = Test::paginate();
        // $trashed = Test::onlyTrashed()->count();

        return view("Theme::tests.index")->with(compact('resources'));
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
        $resource = Test::findOrFail($id);
        $trashed = Test::onlyTrashed()->count();

        return view("Theme::tests.show")->with(compact('resource', 'trashed'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // $posts = DB::table('kdg_posts')->get();
        // foreach ($posts as $post) {
        //     $story = \Story\Models\Story::firstOrNew(['code' => $post->post_name]);
        //     if (! $story->exists) {
        //         $story->title = $post->post_title;
        //         $story->code = $post->post_name;
        //         $story->feature = $post->guid;
        //         $story->body = $post->post_content;
        //         $story->delta = '';
        //         $story->template = 'generic';
        //         $story->user_id = user()->id;
        //         $story->category_id = null;
        //         $story->rating = 5;
        //         $story->save();
        //     }
        // }

        return view("Theme::tests.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Test\Requests\TestRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TestRequest $request)
    {
        dd($request);
        $test = new Test();
        // $test->user()->associate(User::find($request->input('user')));
        $test->body = $request->input('body');
        $test->delta = $request->input('delta');
        $test->approved = $request->input('approved');
        $test->upvotes = $request->input('upvotes');

        $test->save();

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
        $resource = Test::findOrFail($id);

        return view("Theme::tests.edit")->with(compact('resource'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Test\Requests\TestRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TestRequest $request, $id)
    {
        $test = Test::findOrFail($id);
        $test->body = $request->input('body');
        $test->delta = $request->input('delta')->nullable();
        $test->approved = $request->input('approved');
        $test->upvotes = $request->input('upvotes');
        $test->save();

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
        $test = Test::findOrFail($id);
        $test->delete();

        return redirect()->route('tests.index');
    }

    /**
     * Display a listing of the trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trash()
    {
        $resources = Test::onlyTrashed()->paginate();

        return view("Theme::tests.trash")->with(compact('resources'));
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param  \Test\Requests\TestRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore(Request $request, $id)
    {
        $test = Test::onlyTrashed()->findOrFail($id);
        $test->restore();

        return back();
    }

    /**
     * Delete the specified resource from storage permanently.
     *
     * @param  \Test\Requests\TestRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id)
    {
        $test = Test::withTrashed()->findOrFail($id);
        $test->forceDelete();

        return redirect()->route('tests.trash');
    }
}
