<?php

namespace App\Http\Controllers\API;

use App\Sample;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SampleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Sample::latest()->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'subject' => 'required',
            'scontent' => 'required',
            'type' => 'required',
            'format' => 'required'
        ]);
        $sample= new Sample();
        $sample -> title = $request->title;
        $sample -> subject  = $request->subject;
        $sample -> type  = $request->type;
        $sample -> content = $request->scontent;
        $sample -> format = $request->format;
        $sample->save();
        return response(['status' => 'success'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $details = Sample::where('id', $id)->first();
        return ['details' => $details];
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sample = Sample::findOrFail($id);
        $sample->delete();
        return ['message'=> 'sample deleted'];
    }
}
