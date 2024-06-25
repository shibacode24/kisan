<?php

namespace App\Http\Controllers;

use App\Models\CEO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CEOcontroller extends Controller
{
    public function index()
    {
        $ceos = CEO::
        orderby('ceo.id','desc')
        ->get();
        return view('ceo',['ceos'=>$ceos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $ceo= new ceo;
        $ceo->Name=$request->get('Name');
        $ceo->Mobile_Number=$request->get('Mobile_Number');
        $ceo->Username=$request->get('Username');
        $ceo->Password=$request->get('Password');

        $ceo->save();

        return redirect(route('ceo-index'))->with(['success' => true, 'message' => 'Data Successfully Submitted !']);
    }

  
    public function edit(CEO $ceo,$id)
    {
        $ceo_edit = CEO::find($id); 
        $ceo_all = CEO::
        orderby('ceo.id','desc')
        ->get();
       
        return view('edit_ceo',['ceo_edit'=>$ceo_edit,'ceos'=>$ceo_all]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CEO  $ceo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $ceo = CEO::find($request->id); 

        $ceo->Name=$request->get('Name');
        $ceo->Mobile_Number=$request->get('Mobile_Number');
        $ceo->Username=$request->get('Username');
        $ceo->Password=Hash::make($request->get('Password')) ?? $ceo->Password;

        $ceo->save();

        // CEO::where('id',$request->id)->update(
    	// 	[
    	// 		'Name'=>$request->Name,
        //         'Mobile_Number'=>$request->Mobile_Number,
        //         'Username'=>$request->Username,
        //         'Password'=>$request->Password ?? $ceo_edit->Password,
    	// 	]);
    	return redirect()->route('ceo-index')->with(['success' => true, 'message' => 'Data Successfully Updated !']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CEO  $ceo
     * @return \Illuminate\Http\Response
     */
    public function destroy(CEO $ceo,$id)
    {
        $ceo=CEO::where('id',$id)->delete();
        return redirect(route('ceo-index'))->with(['success' => true, 'message' => 'Data Successfully Deleted !']);
    }
}
