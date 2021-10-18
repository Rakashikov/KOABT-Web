<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TypesOfRehearsal;
use App\Http\Requests\TypesOfRehearsals\Index;
use App\Http\Requests\TypesOfRehearsals\Show;
use App\Http\Requests\TypesOfRehearsals\Create;
use App\Http\Requests\TypesOfRehearsals\Store;
use App\Http\Requests\TypesOfRehearsals\Edit;
use App\Http\Requests\TypesOfRehearsals\Update;
use App\Http\Requests\TypesOfRehearsals\Destroy;


/**
 * Description of TypesOfRehearsalController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class TypesOfRehearsalController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Index  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Index $request)
    {
        return view('pages.types_of_rehearsals.index', ['records' => TypesOfRehearsal::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Show  $request
     * @param  TypesOfRehearsal  $typesofrehearsal
     * @return \Illuminate\Http\Response
     */
    public function show(Show $request, TypesOfRehearsal $typesofrehearsal)
    {
        return view('pages.types_of_rehearsals.show', [
                'record' =>$typesofrehearsal,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Create  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Create $request)
    {

        return view('pages.types_of_rehearsals.create', [
            'model' => new TypesOfRehearsal,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Store  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {
        $model=new TypesOfRehearsal;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'TypesOfRehearsal saved successfully');
            return redirect()->route('types_of_rehearsals.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving TypesOfRehearsal');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Edit  $request
     * @param  TypesOfRehearsal  $typesofrehearsal
     * @return \Illuminate\Http\Response
     */
    public function edit(Edit $request, TypesOfRehearsal $typesofrehearsal)
    {

        return view('pages.types_of_rehearsals.edit', [
            'model' => $typesofrehearsal,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Update  $request
     * @param  TypesOfRehearsal  $typesofrehearsal
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request,TypesOfRehearsal $typesofrehearsal)
    {
        $typesofrehearsal->fill($request->all());

        if ($typesofrehearsal->save()) {
            
            session()->flash('app_message', 'TypesOfRehearsal successfully updated');
            return redirect()->route('types_of_rehearsals.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating TypesOfRehearsal');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Destroy  $request
     * @param  TypesOfRehearsal  $typesofrehearsal
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Destroy $request, TypesOfRehearsal $typesofrehearsal)
    {
        if ($typesofrehearsal->delete()) {
                session()->flash('app_message', 'TypesOfRehearsal successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting TypesOfRehearsal');
            }

        return redirect()->back();
    }
}
