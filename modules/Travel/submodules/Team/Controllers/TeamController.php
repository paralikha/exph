<?php

namespace Team\Controllers;

use Frontier\Controllers\AdminController;
use Illuminate\Http\Request;
use Team\Models\Team;
use Team\Requests\TeamRequest;

class TeamController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

        return view("Theme::teams.index");
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

        return view("Theme::teams.show");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view("Theme::teams.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Team\Requests\TeamRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeamRequest $request)
    {
        //

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
        //

        return view("Theme::teams.edit");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Team\Requests\TeamRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TeamRequest $request, $id)
    {
        //

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
        //

        return redirect()->route('teams.index');
    }

    /**
     * Display a listing of the trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trash()
    {
        //

        return view("Theme::teams.trash");
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param  \Team\Requests\TeamRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore(TeamRequest $request, $id)
    {
        //

        return back();
    }

    /**
     * Delete the specified resource from storage permanently.
     *
     * @param  \Team\Requests\TeamRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(TeamRequest $request, $id)
    {
        //

        return redirect()->route('teams.trash');
    }
}
