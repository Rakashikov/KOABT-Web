<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Playbill;
use App\Models\Event;
use App\Models\Cast;
use App\Models\ActorRole;
use App\Models\Role;
use App\Models\Actor;
use App\Http\Requests\Playbill\Index;
use App\Http\Requests\Playbill\Show;
use App\Http\Requests\Playbill\Create;
use App\Http\Requests\Playbill\Store;
use App\Http\Requests\Playbill\Edit;
use App\Http\Requests\Playbill\Update;
use App\Http\Requests\Playbill\Destroy;
use stdClass;
use Carbon\Carbon;


/**
 * Description of PlaybillController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class PlaybillController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Index  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Index $request)
    {
        $res = [];
        $playbills = Playbill::orderBy('date_and_time')->get();
        foreach ($playbills as $playbill_key => $playbill){
            // dd(Carbon::parse($playbill->date_and_time) -> toDateTimeString());
            if(Carbon::parse($playbill->date_and_time)->toDateTimeString() < Carbon::now()->toDateTimeString()) continue;
            $tmp_playbill = new stdClass;
            $tmp_playbill-> date = $playbill->date_and_time;
            $tmp_playbill-> title = Event::where("id", $playbill->event_id)->value('title');
            $tmp_playbill-> time =  Carbon::parse(Event::where("id", $playbill->event_id)->value('duration'))->format('H:i:s');
            $tmp_playbill-> cast = [];
            foreach(Cast::where("id", $playbill->cast_id)->get() as $cast_key => $cast){
                $tmp_cast = new stdClass;
                $tmp_aroles = ActorRole::where("id", $cast->aroles_id)->get();
                $tmp_cast-> role = Role::where("id", $tmp_aroles[0]->role_id)->value('character_name');
                $tmp_cast-> actor = Actor::where("id", $tmp_aroles[0]->actor_id)->value('last_name');
                $tmp_playbill->cast[$cast_key] = $tmp_cast;
            }
            $res[$playbill_key] = $tmp_playbill;
        }

        // dd($res);

        return view('main', compact('res'));
    }    /**
     * Display the specified resource.
     *
     * @param  Show  $request
     * @param  Playbill  $playbill
     * @return \Illuminate\Http\Response
     */
    // public function show(Show $request, Playbill $playbill)
    // {
    //     return view('pages.playbill.show', [
    //             'record' =>$playbill,
    //     ]);

    // }    
    /**
     * Show the form for creating a new resource.
     *
     * @param  Create  $request
     * @return \Illuminate\Http\Response
     */
    // public function create(Create $request)
    // {
	// 	$events = Event::all(['id']);
	// 	$casts = Cast::all(['id']);

    //     return view('pages.playbill.create', [
    //         'model' => new Playbill,
	// 		"events" => $events,
	// 		"casts" => $casts,

    //     ]);
    // }    
    /**
     * Store a newly created resource in storage.
     *
     * @param  Store  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Store $request)
    // {
    //     $model=new Playbill;
    //     $model->fill($request->all());

    //     if ($model->save()) {
            
    //         session()->flash('app_message', 'Playbill saved successfully');
    //         return redirect()->route('playbill.index');
    //         } else {
    //             session()->flash('app_message', 'Something is wrong while saving Playbill');
    //         }
    //     return redirect()->back();
    // } 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  Edit  $request
     * @param  Playbill  $playbill
     * @return \Illuminate\Http\Response
     */
    // public function edit(Edit $request, Playbill $playbill)
    // {
	// 	$events = Event::all(['id']);
	// 	$casts = Cast::all(['id']);

    //     return view('pages.playbill.edit', [
    //         'model' => $playbill,
	// 		"events" => $events,
	// 		"casts" => $casts,

    //         ]);
    // }    
    /**
     * Update a existing resource in storage.
     *
     * @param  Update  $request
     * @param  Playbill  $playbill
     * @return \Illuminate\Http\Response
     */
    // public function update(Update $request,Playbill $playbill)
    // {
    //     $playbill->fill($request->all());

    //     if ($playbill->save()) {
            
    //         session()->flash('app_message', 'Playbill successfully updated');
    //         return redirect()->route('playbill.index');
    //         } else {
    //             session()->flash('app_error', 'Something is wrong while updating Playbill');
    //         }
    //     return redirect()->back();
    // }    
    /**
     * Delete a  resource from  storage.
     *
     * @param  Destroy  $request
     * @param  Playbill  $playbill
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    // public function destroy(Destroy $request, Playbill $playbill)
    // {
    //     if ($playbill->delete()) {
    //             session()->flash('app_message', 'Playbill successfully deleted');
    //         } else {
    //             session()->flash('app_error', 'Error occurred while deleting Playbill');
    //         }

    //     return redirect()->back();
    // }
}
