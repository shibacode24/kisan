<?php

namespace App\Http\Controllers;
use App\Models\RegionalManager;
use App\Models\state;
use App\Models\tehsil;
use App\Models\Distric;
use App\Models\city;
use App\Models\Region;
use Illuminate\Http\Request;
use Hash;

class regional_managerController extends Controller
{
    public function index()
    {


        $regionalmanager = RegionalManager::join('state', 'state.id', '=', 'regional_manager.State_id')
            ->leftjoin('distric', 'distric.id', '=', 'regional_manager.District_id')
            ->leftjoin('tehsil', 'tehsil.id', '=', 'regional_manager.Tahsil_id')
            ->leftjoin('city', 'city.id', '=', 'regional_manager.City_id')
            ->leftjoin('region', 'region.id', '=', 'regional_manager.Region_id')
            ->orderby('regional_manager.id', 'desc')
            ->select('regional_manager.*', 'state.State_Name', 'distric.District', 'tehsil.Tehsil', 'city.City', 'region.Region')
            ->get();


        $state = state::all();
        $districs = Distric::all();
        $tehsils = tehsil::all();
        $citys = city::all();
        $regions = Region::all();

        return view('regional_manager', ['regionalmanagers' => $regionalmanager, 'states' => $state, 'districs' => $districs, 'tehsils' => $tehsils, 'citys' => $citys, 'regions' => $regions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $request->validate([
            'emp_id' => 'required|max:8',
            'name' => 'required|max:20',
            'mobile_no' => 'required|min:10',
            'email' => 'required|max:30',
            'address' => 'required|max:50',
            'pincode' => 'required|min:6',
            'Username' => 'required|max:20',
            'Password' => 'required',
            'city'   => 'required',
            'state'  => 'required',
            'distric'  => 'required',
            'tehsil'  => 'required',
            'region' => 'required'
        ]);

        $regionalmanager = new regionalmanager();
        $regionalmanager->Emp_id = $request->get('emp_id');
        $regionalmanager->Name = $request->get('name');
        $regionalmanager->Mobile_Number = $request->get('mobile_no');
        $regionalmanager->Email_id = $request->get('email');
        $regionalmanager->Address = $request->get('address');
        $regionalmanager->City_id = $request->get('city');
        $regionalmanager->Region_id = $request->get('region');
        $regionalmanager->State_id = $request->get('state');
        $regionalmanager->Pincode = $request->get('pincode');
        $regionalmanager->District_id = $request->get('distric');
        $regionalmanager->Tahsil_id = $request->get('tehsil');
        $regionalmanager->Username = $request->get('Username');
        $regionalmanager->Password = Hash::make($request->get('Password'));
        $regionalmanager->save();

        return redirect()->back()->with(['success' => true, 'message' => 'Data Successfully Submitted !']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RegionalManager  $regionalmanager
     * @return \Illuminate\Http\Response
     */
    public function show(RegionalManager $regionalmanager)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RegionalManager  $regionalmanager
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $regionalmanager_edit = RegionalManager::find($id);
        $regionalmanager_all = RegionalManager::join('state', 'state.id', '=', 'regional_manager.State_id')
            ->leftjoin('distric', 'distric.id', '=', 'regional_manager.District_id')
            ->leftjoin('tehsil', 'tehsil.id', '=', 'regional_manager.Tahsil_id')
            ->leftjoin('city', 'city.id', '=', 'regional_manager.City_id')
            ->leftjoin('region', 'region.id', '=', 'regional_manager.Region_id')
            ->orderby('regional_manager.id', 'desc')
            ->select('regional_manager.*', 'state.State_Name', 'distric.District', 'tehsil.Tehsil', 'city.City', 'region.Region')
            ->get();

        $state = state::all();
        $districs = Distric::all();
        $tehsils = tehsil::all();
        $citys = city::all();
        $regions = region::all();

        return view('regional_manager_edit', ['regionalmanager_edit' => $regionalmanager_edit, 'regionalmanagers' => $regionalmanager_all, 'states' => $state, 'districs' => $districs, 'tehsils' => $tehsils, 'citys' => $citys, 'regions' => $regions]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RegionalManager  $regionalmanager
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $regionalmanager = RegionalManager::where('id',$request->id)->first();
        RegionalManager::where('id', $request->id)->update(
            [
                'Emp_id' => $request->emp_id,
                'Name' => $request->name,
                'Mobile_Number' => $request->Mobile_Number,
                'Email_id' => $request->email,
                'Address' => $request->address,
                'City_id' => $request->city,
                'Region_id' => $request->region,
                'State_id' => $request->state,
                'Pincode' => $request->pincode,
                'District_id' => $request->distric,
                'Tahsil_id' => $request->tt,
                'Username' => $request->username,
                'Password' => $request->password ? Hash::make($request->get('password')) : $regionalmanager->password
            ]
        );
        return redirect()->route('regional_manager-index')->with(['success' => true, 'message' => 'Data Successfully Updated !']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RegionalManager  $regionalmanager
     * @return \Illuminate\Http\Response
     */
    public function destroy(RegionalManager $regionalmanager, $id)
    {
        $regionalmanager = RegionalManager::where('id', $id)->delete();
        return redirect(route('regional_manager-index'))->with(['success' => true, 'message' => 'Data Successfully Deleted !']);
    }
function get_district_by_id(Request $request)
    {
        $data = Distric::where('State_id', $request->id)
        ->orderby('District', 'asc')->get();
        return response()->json($data);
    }
    
    function get_all_id(Request $request)
    {
        $data['district'] = Distric::where('State_id', $request->id)
        ->orderby('District', 'asc')->get();


         $data['tehsil'] = tehsil::where('District_id',$data['district'][0]['id'])
         ->orderby('Tehsil', 'asc')->get();
         
         $data['city'] = city::where('Tehsil_id',$data['tehsil'][0]['id'])
         ->orderby('City', 'asc')->get();

         $data['region'] = Region::where('State_id',$request->id)
         ->orderby('Region', 'asc')->get();

        return response()->json($data);
    }

    function get_tehsil_by_id(Request $request)
    {
        $data['tehsil1'] = tehsil::where('District_id', $request->id)->orderby('Tehsil', 'asc')->get();
        return response()->json($data);

        $data['city1'] = city::where('Tehsil_id',$data['tehsil1'][0]['id'])
        ->orderby('City', 'asc')->get();
    }
    function get_city_by_id(Request $request)
    {
        $data = city::where('Tehsil_id', $request->id)->orderby('city', 'asc')->get();
        return response()->json($data);
    }

    function get_region_by_id(Request $request)
    {
        $data = Region::where('State_id', $request->id)->orderby('region', 'asc')->get();
        return response()->json($data);
    }

    function all(Request $request)
    {
        // $data['district'] = Distric::where('State_id', $request->id)
        // ->orderby('District', 'asc')->get();


         $data['tehsil'] = tehsil::where('District_id',$request->id)
         ->orderby('Tehsil', 'asc')->get();
         
         $data['city'] = city::where('Tehsil_id',$data['tehsil'][0]['id'])
         ->orderby('City', 'asc')->get();

         return response()->json($data);

    }
}
