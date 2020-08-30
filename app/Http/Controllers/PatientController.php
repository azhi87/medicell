<?php

namespace App\Http\Controllers;

use App\Patient;
use Illuminate\Http\Request;
use \Intervention\Image\Facades\Image;
use Carbon\Carbon;
use DB;
class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('patients');
    }

    public function edit($id)
    {
        $patient=\App\Patient::find($id);
        return view('editPatient',compact('patient'));
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

        $this->validate($request,[
            "years"=>"required",
    		"fname"=>"required",

            ]);
        
        //treatment medical should be dynamically received from treatments table
        $id=$request['patient_id'];
        $visitation_id=$request['visitation_id'];
        if($id==0)
        {
            $patient=new \App\Patient();
        }
        else
        {
            $patient= \App\Patient::find($id);
        }
        if($visitation_id==0)
        {
             $visitation=new \App\Visitation();
        }
        else
        {
             $visitation=\App\Visitation::find($visitation_id);
             DB::table('investigations')->where('patient_id',$patient->id)->where('visit_id',$visitation_id)->delete();
        }
        if($request['status'])
        {
            $patient->status=$request['status'];
        }
        else
        {
            $patient->status='0';
        }
        
        $patient->fname=$request['fname'];
        $patient->years=$request['years'];
        $patient->months=$request['months'];
        $patient->gender=$request['gender'];
       
        $patient->blood_group=$request['blood_group'];
        $patient->address=$request['address'];

       // $patient->plan=$request['plan'];
        //$patient->history=$request['history'];
       // $patient->follow_up=$request['follow_up'];

        $patient->marital_status=$request['marital_status'];
        $patient->phone=$request['phone'];
        $patient->save();

       
        $visitation->patient_id=$patient->id;
        $visitation->total=$request['total'];
        $visitation->discount=$request['discount'];
        $visitation->discount_percentage=$request['discount_percentage'];
        $visitation->calculated_paid=$request['total'];
        $visitation->totalBeforeDiscount=$request['totalBeforeDiscount'];        
        $visitation->referral_dr=$request['referral_dr'];
        $visitation->save();
        $count=count($request['subtests']);
       // dd($request['result']);
      // dd($request);
        for ($i=0; $i<=$count; $i++) {
        if(isset($request['subtests'][$i]))
        {
            if(isset($request['result'][$i]))
            {
                $result=$request['result'][$i];
            }
            else
            {
                $result=\App\Subtest::find($request['subtests'][$i])->default_value;
                
            }
            $visitation->subtests()->attach($request['subtests'][$i],
                                            [
                                            'result'=>$result,   
                                            'negative'=>$request['negative'][$i],   
                                            'sale_price'=>\App\Subtest::find($request['subtests'][$i])->sale_price,   
                                            'patient_id'=>$patient->id
                                            ]);
        }
        $visitation->save();
        }
        return redirect('/patients/today/'.$visitation->id);

    }

    public function uploadImage($image)
    {
        $input['image_name'] = $image->getClientOriginalName().'_'.time().'.'.$image->getClientOriginalExtension();
        $destinationPath = 'images';
        $img = Image::make($image->getRealPath());
        //$img->resize($width, $height);
        //$constraint->aspectRatio();
        $img->save($destinationPath.'/'.$input['image_name']);
        return '/public/'.$destinationPath.'/'.$input['image_name'];
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        //
    }
    public function showSearch()
    {
        return view('searchPatient');
    }
    public function search(Request $request)
    {
        $patients=Patient::query();
       
       
        if($request->patient_id)
        {
            $visitations=\App\Visitation::where('patient_id',$request['patient_id'])->get();
            return view('today',compact('visitations'));
        }
         if($request->name)
        {
            $patients->where('fname','like','%'.$request['name'].'%');
        }
        if($request->tel)
        {
            $patients->where('phone',$request['tel']);
        }

        if($request->from)
        {
            $patients->whereDate('created_at','>=',$request['from']);
        }
        if($request->to)
        {
            $patients->whereDate('created_at','<=',$request['to']);
        }
        $patients=$patients->select('id');
        $visitations=\App\Visitation::whereIn('patient_id',$patients)->get();
        return view('today',compact('visitations')); 

    }
    
    public function print($id)
    {
        $patient=\App\Visitation::find($id);
        return view('print',compact('patient'));
    }
    
    public function investigationPrint($id)
    {
       $patient=\App\Visitation::find($id);
        return view('investigationPrint',compact('patient'));
    }
    
    public function radiologistPrint($id)
    {
      $patient=\App\Visitation::find($id);
        return view('radiologistPrint',compact('patient'));
    }
    
    public function emgeegPrint($id)
    {
      $patient=\App\Visitation::find($id);
        return view('emgeegPrint',compact('patient'));
    }
    
    public function extra1Print($id)
    {
        $patient=\App\Visitation::find($id);
        return view('extra1Print',compact('patient'));
    }
    
    public function treatmentPrint($id)
    {
        $patient=\App\Visitation::find($id);
        return view('treatmentPrint',compact('patient'));
    }

    public function dischargePrint($id)
    {
        $patient=\App\Visitation::find($id);
        return view('dischargePrint',compact('patient'));
    }


    public function today()
    {
        $patients=\App\Patient::where('created_at','>=',Carbon::today())->orderBy('created_at','desc')->get();
        return view('today',compact('patients'));
    }
    public function getPatientNameById()
    {
          $patient=\App\Patient::find(Request('id'));
        //$customer=Customer::where('id',Request('id'))->get();
         
             return json_encode(array(
                 "fname" => $patient->fname,
                 "phone" => $patient->phone,
                 "months" => $patient->months,
                 "years" => $patient->years,
                 "marital_status" => $patient->marital_status,
                 "gender" => $patient->gender,

                 )); 
    }
}
