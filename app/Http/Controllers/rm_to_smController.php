<?php

namespace App\Http\Controllers;
use App\Models\rm_to_sm;
use App\Models\RegionalManager;
use App\Models\Salemanager;
use Illuminate\Http\Request;

class rm_to_smController extends Controller
{
    public function index()
    {
        $this->data['rm_to_sm'] = rm_to_sm::join('regional_manager', 'regional_manager.id', '=', 'rm_to_sm.rm_id')
            ->orderby('rm_to_sm.id', 'desc')
            ->select('regional_manager.Name', 'rm_to_sm.*')

            ->get();
        $this->data['sms'] = Salemanager::get();

        $this->data['rm'] = RegionalManager::get();


        return view('rm_to_sm', $this->data);
    }

    public function create(Request $request)
    {

        $rm_to_sm = new rm_to_sm;
        $rm_to_sm->rm_id = $request->rm;
        $rm_to_sm->sm_id = implode(',', $request->sm);


        // $rm_to_sm->City=('Wardha');
        // $rm_to_sm->State=('Maharashtra');
        $rm_to_sm->save();

        return redirect(route('rm_to_sm-index'))->with(['success' => true, 'message' => 'Data Successfully Submitted !']);
    }

    public function edit($id)
    {
        $rm_to_sm_edit = rm_to_sm::find($id);
        $this->data['rm_to_sm'] = rm_to_sm::join('regional_manager', 'regional_manager.id', '=', 'rm_to_sm.rm_id')
        ->orderby('rm_to_sm.id', 'desc')
        ->select('regional_manager.Name', 'rm_to_sm.*')

            ->get();
        $this->data['sms'] = Salemanager::get();

        $this->data['rm'] = RegionalManager::get();




        return view('edit_rm_to_sm', $this->data,['rm_to_sm_edit'=>$rm_to_sm_edit]);
    }

    public function update(Request $request)
    {
        rm_to_sm::where('id', $request->id)->update(
            [
            'rm_id'=>$request->rm,
            'sm_id' => implode(',', $request->sm)
        
            ]
        );
        return redirect()->route('rm_to_sm-index')->with(['success' => true, 'message' => 'Data Successfully Updated !']);
    }
    public function delete(Request $request)
    {    
        // dd($request->id);
        rm_to_sm::where('id', $request->id)->delete();

        return back()->with(['success' => true, 'message' => 'Data Successfully Deleted !']);
    }
}
