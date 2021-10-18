<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Position;
use App\Http\Requests\Positions\Index;
use App\Http\Requests\Positions\Show;
use App\Http\Requests\Positions\Create;
use App\Http\Requests\Positions\Store;
use App\Http\Requests\Positions\Edit;
use App\Http\Requests\Positions\Update;
use App\Http\Requests\Positions\Destroy;


/**
 * Description of PositionController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class PositionController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Index  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Index $request)
    {
        return view('pages.positions.index', ['records' => Position::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Show  $request
     * @param  Position  $position
     * @return \Illuminate\Http\Response
     */
    public function show(Show $request, Position $position)
    {
        return view('pages.positions.show', [
                'record' =>$position,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Create  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Create $request)
    {

        return view('pages.positions.create', [
            'model' => new Position,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Store  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {
        $model=new Position;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'Position saved successfully');
            return redirect()->route('positions.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving Position');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Edit  $request
     * @param  Position  $position
     * @return \Illuminate\Http\Response
     */
    public function edit(Edit $request, Position $position)
    {

        return view('pages.positions.edit', [
            'model' => $position,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Update  $request
     * @param  Position  $position
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request,Position $position)
    {
        $position->fill($request->all());

        if ($position->save()) {
            
            session()->flash('app_message', 'Position successfully updated');
            return redirect()->route('positions.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating Position');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Destroy  $request
     * @param  Position  $position
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Destroy $request, Position $position)
    {
        if ($position->delete()) {
                session()->flash('app_message', 'Position successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting Position');
            }

        return redirect()->back();
    }
}
