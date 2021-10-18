<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Troupe;
use App\Http\Requests\Troupes\Index;
use App\Http\Requests\Troupes\Show;
use App\Http\Requests\Troupes\Create;
use App\Http\Requests\Troupes\Store;
use App\Http\Requests\Troupes\Edit;
use App\Http\Requests\Troupes\Update;
use App\Http\Requests\Troupes\Destroy;


/**
 * Description of TroupeController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class TroupeController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Index  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Index $request)
    {
        return view('pages.troupes.index', ['records' => Troupe::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Show  $request
     * @param  Troupe  $troupe
     * @return \Illuminate\Http\Response
     */
    public function show(Show $request, Troupe $troupe)
    {
        return view('pages.troupes.show', [
                'record' =>$troupe,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Create  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Create $request)
    {

        return view('pages.troupes.create', [
            'model' => new Troupe,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Store  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {
        $model=new Troupe;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'Troupe saved successfully');
            return redirect()->route('troupes.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving Troupe');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Edit  $request
     * @param  Troupe  $troupe
     * @return \Illuminate\Http\Response
     */
    public function edit(Edit $request, Troupe $troupe)
    {

        return view('pages.troupes.edit', [
            'model' => $troupe,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Update  $request
     * @param  Troupe  $troupe
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request,Troupe $troupe)
    {
        $troupe->fill($request->all());

        if ($troupe->save()) {
            
            session()->flash('app_message', 'Troupe successfully updated');
            return redirect()->route('troupes.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating Troupe');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Destroy  $request
     * @param  Troupe  $troupe
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Destroy $request, Troupe $troupe)
    {
        if ($troupe->delete()) {
                session()->flash('app_message', 'Troupe successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting Troupe');
            }

        return redirect()->back();
    }
}
