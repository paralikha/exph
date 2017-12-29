<?php

namespace Comment\Controllers;

use Frontier\Controllers\AdminController;
use Illuminate\Http\Request;
use Comment\Models\Comment;
use Comment\Requests\CommentRequest;
use User\Models\User;

class CommentController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $resources = Comment::paginate();

        return view("Theme::comments.index")->with(compact('resources'));
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

        return view("Theme::comments.show");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view("Theme::comments.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Comment\Requests\CommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request)
    {
        $comment = new Comment();
        $comment->body = $request->input('body');
        $comment->delta = $request->input('delta');
        $comment->approved = $request->input('approved');
        $comment->upvotes = $request->input('upvotes');
        $comment->user()->associate(User::find(user()->id));
        $comment->save();

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

        return view("Theme::comments.edit");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Comment\Requests\CommentRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CommentRequest $request, $id)
    {
        $comment = Comment::findOrFail($id);
        $comment->body = $request->input('body');
        $comment->delta = $request->input('delta');
        $comment->approved = $request->input('approved');
        $comment->upvotes = $request->input('upvotes');
        $comment->user()->associate(User::find(user()->id));
        $comment->save();

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
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return redirect()->route('comments.index');
    }

    /**
     * Display a listing of the trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trash()
    {
        $resources = Comment::onlyTrashed()->paginate();

        return view("Theme::comments.trash")->with(compact('trashed'));
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param  \Comment\Requests\CommentRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore(CommentRequest $request, $id)
    {
        $comment = Comment::onlyTrashed()->findOrFail($id);
        $comment->restore();

        return back();
    }

    /**
     * Delete the specified resource from storage permanently.
     *
     * @param  \Comment\Requests\CommentRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(CommentRequest $request, $id)
    {
        $comment = Comment::withTrashed()->findOrFail($id);
        $comment->forceDelete();

        return redirect()->route('comments.trash');
    }
}
