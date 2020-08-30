<?php

namespace App\Http\Controllers;
use DB;
use App\Patient;
use Illuminate\Http\Request;
use \Intervention\Image\Facades\Image;
use Carbon\Carbon;
class VisitationController extends Controller
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
        $visitation=\App\Visitation::find($id);
        return view('editVisitations',compact('visitation'));
    }

    public function view($id)
    {
        $visitation=\App\Visitation::find($id);
        return view('viewVisitation',compact('visitation'));
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
    
    public function new($patient_id)
    {
         $patient= \App\Patient::findOrFail($patient_id);
            $visitation=new \App\Visitation();
            $visitation->patient_id=$patient->id;
            $visitation->save();
             
            $sr=new \App\SystemReview();
            $sr->visit_id=$visitation->id;
             $sr->patient_id=$patient->id;
            $sr->save();
            
            $ne=new \App\NExam();
             $ne->visit_id=$visitation->id;
            $ne->patient_id=$patient->id;
            $ne->save();
            
            // $in=new \App\Investigation();
            // $in->visit_id=$visitation->id;
            // $in->patient_id=$patient->id;
            // $in->save();

            $di=new \App\Diagnosis();
             $di->visit_id=$visitation->id;
             $di->patient_id=$patient->id;
             $di->save();

            
            $ex= new \App\Exam();
            $ex->visit_id=$visitation->id;
             $ex->patient_id=$patient->id;
            $ex->save();
            
            $te=new \App\TreatmentExtra();
            $te->visit_id=$visitation->id;
            $te->patient_id=$patient->id;
            $te->save();
           return $this->edit($visitation->id);
        
    }
    public function store(Request $request,$id=0,$patient_id)
    {

        //treatment medical should be dynamically received from treatments table
        if($id==0)
        {
            // $visitation=new \App\Visitation();
            // $sr=new \App\SystemReview();
            // $ne=new \App\NExam();
            // $in=new \App\Investigation();
            // $ex= new \App\Exam();
            // $te=new \App\TreatmentExtra();
            // $patient= \App\Patient::find($patient_id);
            return back();

        }
        else
        {
            $visitation=\App\Visitation::find($id);
            $patient= \App\Patient::find($visitation->patient_id);
            $sr= $visitation->sr;
            $ne= $visitation->ne;
            $in= $visitation->in;
            $ex= $visitation->ex;
            $te= $visitation->te;
            $di= $visitation->di;
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
        $patient->married_name=$request['married_name'];
        $patient->age=$request['age'];
        $patient->gender=$request['gender'];
        if($request['occupation']!='0')
        {
            $patient->occupation_id=$request['occupation'];   
        }
        else
        {
            $occ_count=\App\Occupation::where('name',$request['other'])->count();
            if($occ_count==0)
            {
                $occ=new \App\Occupation();
                $occ->name=$request['other'];
                $occ->save();
                $patient->occupation_id=$occ->id; 
            }
            else
            {
                $occ=\App\Occupation::where('name',$request['other'])->first();
                $patient->occupation_id=$occ->id; 

            }
            
        }
        $patient->blood_group=$request['blood_group'];
        $patient->address=$request['address'];
        $patient->weight=$request['weight'];
        $patient->height=$request['height'];

        $patient->marital_status=$request['marital_status'];
        $patient->phone=$request['phone'];
        $patient->race=$request['race'];
        $patient->risk_factor=$request['risk_factor'];
        $patient->save();

        $sr->visit_id=$visitation->id;
        $sr->patient_id=$patient->id;
        $sr->sr_cvs=$request['sr_cvs'];
        $sr->sr_git=$request['sr_git'];
        $sr->sr_ut=$request['sr_ut'];
        $sr->sr_musculosleletal_system=$request['sr_musculosleletal_system'];
        $sr->sr_respiratory_system=$request['sr_respiratory_system'];
        $sr->sr_hematological_system=$request['sr_hematological_system'];
        $sr->sr_craniotomy=$request['sr_craniotomy'];
        $sr->sr_laparatomy=$request['sr_laparatomy'];
        $sr->sr_laminectomy=$request['sr_laminectomy'];
        $sr->sr_thoracotomy=$request['sr_thoracotomy'];
        $sr->sr_orthopedic=$request['sr_orthopedic'];
        $sr->sr_ent=$request['sr_ent'];
        $sr->sr_sh_other=$request['sr_sh_other'];

        $sr->sr_hypertension=$request['sr_hypertension'];
        $sr->sr_stroke=$request['sr_stroke'];
        $sr->sr_ihd=$request['sr_ihd'];
        $sr->sr_diabets_mellitus=$request['sr_diabets_mellitus'];
        $sr->sr_hf=$request['sr_hf'];
        $sr->sr_rf=$request['sr_rf'];
        $sr->sr_mh_other=$request['sr_mh_other'];
        $sr->sr_blood_transfusion=$request['sr_blood_transfusion'];
        $sr->sr_allergy_drugs=$request['sr_allergy_drugs'];
        $sr->sr_long_term_drugs=$request['sr_long_term_drugs'];
        $sr->sr_medical_history=$request['sr_medical_history'];
        $sr->sr_surgical_history=$request['sr_surgical_history'];
        $sr->sr_hcd=$request['sr_hcd'];
        $sr->sr_gynecologic_obsteric_history=$request['sr_gynecologic_obsteric_history'];
        $sr->save();

        
        $ne->visit_id=$visitation->id;
        $ne->patient_id=$patient->id;
        $ne->ne_gcse=$request['ne_gcse'];
        $ne->ne_gcsm=$request['ne_gcsm'];
        $ne->ne_gcsv=$request['ne_gcsv'];
        $ne->ne_karnofsky_score=$request['ne_karnofsky_score'];
        $ne->ne_cranial_nerves=$request['ne_cranial_nerves'];        
        $ne->ne_urmp=$request['ne_urmp'];
        $ne->ne_urmr=$request['ne_urmr'];
        $ne->ne_urTone=$request['ne_urTone'];
        $ne->ne_ursensory=$request['ne_ursensory'];
        $ne->ne_urcerebellarsign=$request['ne_urcerebellarsign'];
        $ne->ne_ulmp=$request['ne_ulmp'];
        $ne->ne_ulmr=$request['ne_ulmr'];
        $ne->ne_ulTone=$request['ne_ulTone'];
        $ne->ne_ulsensory=$request['ne_ulsensory'];
        $ne->ne_ulcerebellarsign=$request['ne_ulcerebellarsign'];
        $ne->ne_lrmp=$request['ne_lrmp'];
        $ne->ne_lrmr=$request['ne_lrmr'];
        $ne->ne_lrTone=$request['ne_lrTone'];
        $ne->ne_lrsensory=$request['ne_lrsensory'];
        $ne->ne_lrcerebellarsign=$request['ne_lrcerebellarsign'];
        $ne->ne_llmp=$request['ne_llmp'];
        $ne->ne_llmr=$request['ne_llmr'];
        $ne->ne_llTone=$request['ne_llTone'];
        $ne->ne_llsensory=$request['ne_llsensory'];
        $ne->ne_llcerebellarsign=$request['ne_llcerebellarsign'];
        $ne->ne_babinski=$request['ne_babinski'];
        $ne->ne_hoffman_sr=$request['ne_hoffman_sr'];
        $ne->ne_hoffman_sl=$request['ne_hoffman_sl'];
        $ne->ne_right_foot=$request['ne_right_foot'];
        $ne->ne_left_foot=$request['ne_left_foot'];
        $ne->save();

        
        $di->chief_complain=$request['chief_complain'];
        $di->diagnosis=$request['diagnosis'];
        $di->history=$request['history'];
        $di->visit_id=$visitation->id;
        $di->patient_id=$patient->id;
        $di->save();

        // $subtests=\App\Subtest::all();
       // DB::table('investigations')->where('visit_id',$visitation->id)->delete();
        $visitation->subtests()->attach($request['subtests'],['patient_id'=>$visitation->patient_id]);
        $visitation->save();
        // foreach ($subtests as $key => $value) {
            
        //     if(isset($request[$value->id]))
        //     {
        //         $in=new \App\Investigation;
        //         $in->visit_id=$visitation->id;
        //         $in->patient_id=$patient->id;
        //         $in->subtest_id=$value->id;
        //         $in->save();
        //     }
        // }
        
        
        $ex->visit_id=$visitation->id;
        $ex->patient_id=$patient->id;
        $ex->e_bp=$request['e_bp'];
        $ex->e_pr=$request['e_pr'];
        $ex->e_rp=$request['e_rp'];
        $ex->e_temperature=$request['e_temperature'];
        $ex->e_cvs=$request['e_cvs'];
        $ex->e_git=$request['e_git'];
        $ex->e_ut=$request['e_ut'];
        $ex->e_musculosleletal_system=$request['e_musculosleletal_system'];
        $ex->e_respiratory_system=$request['e_respiratory_system'];
        $ex->save();

        $te->visit_id=$visitation->id;
        $te->patient_id=$patient->id;
        $te->tr_surgical=$request['tr_surgical'];
        $te->tr_follow_up=$request['tr_follow_up'];
        $te->tr_gcse=$request['tr_gcse'];
        $te->tr_gcsm=$request['tr_gcsm'];
        $te->tr_gcsv=$request['tr_gcsv'];
        $te->tr_karnofsky_score=$request['tr_karnofsky_score'];
        $te->tr_neurologically=$request['tr_neurologically'];
        $te->tr_radiologically=$request['tr_radiologically'];
        $te->save();

        $visitation->treatments()->attach($request['treatments'],['patient_id'=>$visitation->patient_id]);


        $images=$request->file('images');
      if(!empty($images))
      {

        foreach($images as $image)
        {
                $url=$this->uploadImage($image);
                $im= new \App\Image();
                $im->visit_id=$visitation->id;
                $im->patient_id=$patient->id;
                $im->url=$url;
                $im->save();
        }
    }

    $images=$request->file('patient_cv');
      if(!empty($images))
      {

        foreach($images as $image)
        {
                $url=$this->uploadImage($image);
                $im= new \App\PatientCV();
                $im->patient_id=$patient->id;
                $im->url=$url;
                $im->save();
        }
    }
        $visitation->save();
		return redirect('/visitation/edit/'.$visitation->id.'/'.$patient->id);

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
            $patients->where('id',$request['patient_id']);
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
        $patients=$patients->get();
        
        return view('results',compact('patients'));

    }
    public function print($id)
    {
        $patient=\App\Patient::find($id);
        return view('print',compact('patient'));
    }
    
        
    public function investigationPrint($id)
    {
        $patient=\App\Patient::find($id);
        return view('investigationPrint',compact('patient'));
    }
    
    public function radiologistPrint($id)
    {
        $patient=\App\Patient::find($id);
        return view('radiologistPrint',compact('patient'));
    }
    
    public function extra1Print($id)
    {
        $patient=\App\Patient::find($id);
        return view('extra1Print',compact('patient'));
    }
    
    public function treatmentPrint($id)
    {
        $patient=\App\Patient::find($id);
        return view('treatmentPrint',compact('patient'));
    }

    public function dischargePrint($id)
    {
        $patient=\App\Patient::find($id);
        return view('dischargePrint',compact('patient'));
    }
    public function folloup($id)
    {
        $visitation=\App\Visitation::find($id);
        $visitation->updated_at=Carbon::now();
        $visitation->save();
        return back();
    }

    public function today($id=0)
    {
        if($id!=0)
        {
            $visitations=\App\Visitation::where('id',$id)->paginate(1);
        }
        else
        {
            $visitations=\App\Visitation::latest()->paginate(50);
        }
            

        return view('today',compact(['visitations']));
    }
    
    public function deleteTreatment($id)
    {
        DB::table('patient_treatment')->where('id',$id)->delete();
        return back();
    }
    public function deleteSubtest($id)
    {
        DB::table('investigations')->where('id',$id)->delete();
        return back();
    }
    
     public function toggleSubtest($id)
    {
        $result=DB::table('investigations')->where('id',$id)->value('result');
        if( $result=='Positive')
        {
            DB::table('investigations')->where('id',$id)->update(['result'=>'Negative']);
        }
        else
        {
             DB::table('investigations')->where('id',$id)->update(['result'=>'Positive']);
        }
        return back();
    }
    
    public function delete($id)
    {
        $visitation=\App\Visitation::find($id);
        $patient_id=$visitation->patient_id;
        DB::table('investigations')->where('visit_id',$visitation->id)->where('patient_id',$patient_id)->delete();
        DB::table('visitations')->where('id',$visitation->id)->where('patient_id',$patient_id)->delete();
        return $this->today();



    }
}
