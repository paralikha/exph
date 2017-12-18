<?php

namespace Experience\Controllers;

use Catalogue\Models\Catalogue;
use Category\Models\Category;
use Experience\Models\Experience;
use Experience\Requests\ExperienceRequest;
use Frontier\Controllers\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use User\Models\User;

class ExperienceController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $resources = Experience::paginate();

        if (null !== $request->get('date_from') && null !== $request->get('date_to')) {
            $resources = Experience::whereBetween('date_start', [$request->get('date_from'), $request->get('date_to')])->paginate();
        }

        // echo "<pre>";
        //     var_dump( (5*0 + 4*1 + 3*0 + 2*0 + 1*1) / (0+1+0+0+1) ); die();
        // echo "</pre>";

        // $categories = Categories::pluck('name', 'id');

        return view("Theme::experiences.index")->with(compact('resources'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catalogues = Catalogue::mediabox();
        $categories = Category::type('experience')->pluck('name', 'id');
        $managers = User::all()->toArray() ;

        return view("Theme::experiences.create")->with(compact('catalogues', 'categories', 'managers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Experience\Requests\ExperienceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExperienceRequest $request)
    {
        echo "<pre>";
            var_dump( $request->all() ); die();
        echo "</pre>";

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

        return view("Theme::experiences.edit");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Experience\Requests\ExperienceRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ExperienceRequest $request, $id)
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

        return redirect()->route('experiences.index');
    }

    /**
     * Display a listing of the trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trash()
    {
        //

        return view("Theme::experiences.trash");
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param  \Experience\Requests\ExperienceRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore(ExperienceRequest $request, $id)
    {
        //

        return back();
    }

    /**
     * Delete the specified resource from storage permanently.
     *
     * @param  \Experience\Requests\ExperienceRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(ExperienceRequest $request, $id)
    {
        //

        return redirect()->route('experiences.trash');
    }
}
