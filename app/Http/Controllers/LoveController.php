<?php

namespace App\Http\Controllers;

use App\Love;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LoveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->input('metaonly')){
            $loves = Love::all();

            return [ 'count' => $loves->count() ];
        }else{
            $loves = Love::where('ip', $request->ip())->get();

            if($loves->count())
                return response('', 200);

            return response('', 404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $loves = Love::where('ip', $request->ip())->get();

        if($loves->count())
            return response(['message' => 'already exist'], 412)
                ->header('Content-Type', 'application/json');

        $love = new Love;

        $love->ip = $request->ip();

        $love->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }
}
