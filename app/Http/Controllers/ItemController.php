<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Item::orderBy('created_at','DESC')->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newitem=new Item;
        $newitem->name=$request->name;
        $newitem->save();
        return $newitem;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $exetingitem=Item::find($id);
        if($exetingitem){
            $exetingitem->completed=$request->completed ? true : false;
            $exetingitem->completed_at=$request->completed ? Carbon::now() :null;
            $exetingitem->save();
            return $exetingitem;
        }
        return "item not found";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $exetingitem=Item::find($id);
        if($exetingitem){
            $exetingitem->delete();
            return 'item deleted';
        }
        return 'item not found';
    }
}
