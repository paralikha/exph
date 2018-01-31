<?php

namespace Travel\Controllers;

use Experience\Models\Experience;
use Frontier\Controllers\AdminController;
use Illuminate\Http\Request;
use Travel\Models\User;
use Travel\Models\Wishlist;

class WishlistController extends AdminController
{
    public function index(Request $request, $handlename)
    {
        $resource = User::whereUsername($handlename)->firstOrFail();
        $resources = $resource->wishlists;

        return view("Theme::profiles.wishlists")->with(compact('resource', 'resources'));
    }

    public function store(Request $request)
    {
        $wishlist = Wishlist::findOrNew(['id' => $request->input('experience_id')]);
        if ($wishlist->exists()) {
            $wishlist->delete();
        } else {
            $wishlist->experience()->associate(Experience::find($request->input('experience_id')));
            $wishlist->user()->associate(User::find(user()->id));
            $wishlist->save();
        }

        return back();
    }
}
