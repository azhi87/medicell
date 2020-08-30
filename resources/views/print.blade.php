@extends('layouts.master')
@section('content')
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="form-w3layouts">
            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                        

                                <ul class="navbar-nav">
									<li class="nav-item active" style="margin-right: 50px;">
										<a class="nav-item" href="#Patient_Information" >Patient_Information
										</a>
									</li>

									<li class="nav-item active" style="margin-right: 50px;">
										<a class="nav-item" href="#System_Review" >System Review
										</a>
									</li>

								</ul>
						
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <div class="panel-body">

 <form class="cmxform form-horizontal " id="commentForm" method="post" action="/patient/store/{{$patient->id}}" novalidate="novalidate">
    {{csrf_field()}}
        <br>
		<section class="wthree-row py-sm-5" id="Patient_Information">
<br>
<br>
<br>

<div class="form-group has-primary">
<label for="ccomment" class="control-label col-lg-2 text-danger" style="text-decoration: underline;">Patient Information</label>
</label>
</div>
<br>
                <div class="form-group has-primary">
                        <label class="col-lg-1 control-label">Name</label>
                                    <div class="col-lg-6">
                        <input name="fname" type="text" placeholder="Full Name" value="{{$patient->patient->fname}}" id="f-name" class="form-control" minlength="2" required="">
                                    </div>

                        <label class="col-lg-1 control-label">Age</label>
                                    <div class="col-lg-2">
                        <input name="age" type="number" placeholder="Age" id="l-name" value="{{$patient->age}}" class="form-control" minlength="2" required="">
                                    </div>
                </div>

                <div class="form-group has-primary">
                        <label class="col-sm-3 control-label col-lg-1" for="inputSuccess">Gender</label>
                        <div class="col-lg-2">
                            <select class="form-control m-bot15" name="gender">
                                @if ($patient->gender=='male')
                                    <option value="male" selected>Male</option>
                                    <option value="female">Female</option>
                                @else
                                    <option value="male" >Male</option>
                                <option value="female" selected>Female</option>
                                @endif
                            
                            </select>
                </div>

                        <label class="col-sm-3 control-label col-lg-1" for="inputSuccess">Occupation</label>
                        <div class="col-lg-3">
                            <select class="form-control m-bot15" name="occupation">
                            <option value='{{$patient->occupation_id}}' selected>{{$patient->occ->name}}<option>
                            
                            </select>
                        </div>
                        
                </div>
                
                <div class="form-group has-primary">                
                <label class="col-sm-3 control-label col-lg-1" for="inputSuccess">Marital Status</label>
                        <div class="col-lg-2">
                            <select class="form-control m-bot15" name="marital_status">

                            <option value="{{$patient->gender}}" selected>{{$patient->gender}}</option>
                            <option value="married" selected>Married </option>
                            <option value="single">Single</option>
                            <option value="divorced">Divorced</option>
                
                            </select>
                        </div>
                       
                </div>
                
                <div class="form-group has-primary">
                        <label class="col-lg-1 control-label">Race</label>
                                    <div class="col-lg-2">
                        <input name="race" type="text" placeholder="Race" id="l-name" value="{{$patient->race}}"  class="form-control" minlength="2" >
                                    </div>
                       
                        <label class="col-lg-1 control-label">Handedness</label>
                                    <div class="col-lg-3">
                        <input name="handedness" type="text" placeholder="Handedness" value="{{$patient->handedness}}" id="l-name" class="form-control" minlength="2" >
                                    </div>
                </div>

                <div class="form-group has-primary">
                    <label for="ccomment" class="control-label col-lg-1" style="text-decoration: underline;">Chief Complian</label>
                                        <div class="col-lg-10">
                    <textarea rows="2" cols="50" class="form-control " id="ccomment" name="chief_complain">{{$patient->chief_complain}}</textarea>
                                        </div>
                </div>    
                <br>
                <div class="form-group has-primary">
                
                <label class="col-lg-1 control-label" style="text-decoration: underline;">C.C</label>
                        <label class="col-lg-1 control-label">Duration</label>
                                    <div class="col-lg-4">
                        <input name="cc_duration" type="text" placeholder="Duration" id="f-name" value="{{$patient->cc_duration}}" class="form-control"  >
                                    </div>

                        <label class="col-lg-1 control-label">Onset</label>
                                    <div class="col-lg-4">
                        <input name="cc_onset" type="text" placeholder="Onset" id="l-name" value="{{$patient->cc_onset}}" class="form-control"  >
                                    </div>
                </div>

                <div class="form-group has-primary">
                    <label for="ccomment" class="control-label col-lg-1" style="text-decoration: underline;">HPI</label>
                                        <div class="col-lg-10">
                    <textarea rows="4" cols="50" class="form-control " id="ccomment" name="hpi">{{$patient->hpi}}</textarea>
                                        </div>
                </div>      
                </section>
<hr class="bg-primary">

<section class="wthree-row py-sm-5" id="System_Review">
<br>
<br>
<br>


                <div class="form-group has-primary">    
                    <label class="col-lg-2 control-label text-danger h4" style="text-decoration: underline;">System Review</label>
                   </div>
                <div class="form-group has-primary">   
                    <label  class="control-label col-lg-1 col-lg-offset-1">CVS</label>
                                        <div class="col-lg-9">
                    <textarea rows="2" cols="50" class="form-control " id="ccomment" name="sr_cvs" >{{$patient->sr->sr_cvs}}</textarea>
                                        </div>
                </div>
                <div class="form-group has-primary">  
                    <label class="control-label col-lg-1 col-lg-offset-1">GIT</label>
                                        <div class="col-lg-9">
                    <textarea rows="2" cols="50" class="form-control " id="ccomment" name="sr_git" >{{$patient->sr->sr_git}}</textarea>
                                        </div>
               </div>    

                <div class="form-group has-primary">  
                    <label class="control-label col-lg-1 col-lg-offset-1">UT</label>
                                        <div class="col-lg-9">
                    <textarea rows="2" cols="50" class="form-control " id="ccomment" name="sr_ut">{{$patient->sr->sr_ut}}</textarea>
                </div>
               </div>    

                <div class="form-group has-primary">  
                    <label class="control-label col-lg-2" style="text-align:center;">Musculosleletal System</label>
                                        <div class="col-lg-9">
                    <textarea rows="2" cols="50" class="form-control " id="ccomment" name="sr_musculosleletal_system">{{$patient->sr->sr_musculosleletal_system}}</textarea>
                                        </div>
               </div>    

               <div class="form-group has-primary">  
                    <label class="control-label col-lg-2" style="text-align:center;">Respiratory System </label>
                                        <div class="col-lg-9">
                    <textarea rows="2" cols="50" class="form-control " id="ccomment" name="sr_respiratory_system">{{$patient->sr->sr_respiratory_system}}</textarea>
                                        </div>
               </div> 

                <div class="form-group has-primary">  
                    <label class="control-label col-lg-2" style="text-align:center;">Hematological System</label>
                                        <div class="col-lg-9">
                    <textarea rows="2" cols="50" class="form-control " id="ccomment" name="sr_hematological_system">{{$patient->sr->sr_hematological_system}}</textarea>
                                        </div>
               </div>                  
               <br>
                <div class="form-group has-primary ">
                        <label class="col-sm-3 control-label col-lg-2" for="inputSuccess">Surgical History</label>
                        <div class="col-lg-2">
                            <label class="checkbox-inline">
                                @if($patient->sr->sr_craniotomy=='1')
                                    <input type="checkbox" id="inlineCheckbox1" value="1" name="sr_craniotomy" checked=""> Craniotomy
                                @else
                                    <input type="checkbox" id="inlineCheckbox1" value="1" name="sr_craniotomy"> Craniotomy
                                @endif
                               
                            </label>
                            <label class="checkbox-inline">
                                 @if($patient->sr->sr_laparatomy=='1')
                                <input type="checkbox" id="inlineCheckbox2" value="1" name="sr_laparatomy" checked=""> Laparatomy
                                @else
                                <input type="checkbox" id="inlineCheckbox2" value="1" name="sr_laparatomy"> Laparatomy
                                @endif
                            </label>
                        </div>
                        <div class="col-lg-2">
                            <label class="checkbox-inline" >
                                  @if($patient->sr->sr_laminectomy=='1')
                                <input type="checkbox" id="inlineCheckbox3" value="1" name="sr_laminectomy" checked> Laminectomy
                                @else
                                <input type="checkbox" id="inlineCheckbox3" value="1" name="sr_laminectomy"> Laminectomy
                                @endif
                            </label>
                            <label class="checkbox-inline">
                                @if($patient->sr->sr_thoracotomy=='1')
                                <input type="checkbox" id="inlineCheckbox3" value="1" name="sr_thoracotomy" checked=""> Thoracotomy
                                @else
                                <input type="checkbox" id="inlineCheckbox3" value="1" name="sr_thoracotomy"> Thoracotomy
                                @endif
                            </label>
                        </div>
                        <div class="col-lg-2">
                            <label class="checkbox-inline" >
                                @if($patient->sr->sr_orthopedic=='1')
                                    <input type="checkbox" id="inlineCheckbox4" value="1" name="sr_orthopedic" checked=""> Orthopedic op.
                                @else
                                    <input type="checkbox" id="inlineCheckbox4" value="1" name="sr_orthopedic"> Orthopedic op.
                                @endif
                            </label>
                            <label class="checkbox-inline">
                                @if($patient->sr->sr_ent=='1')
                                    <input type="checkbox" id="inlineCheckbox4" value="1" name="sr_ent" checked=""> ENT op.
                                @else
                                    <input type="checkbox" id="inlineCheckbox4" value="1" name="sr_ent"> ENT op.
                                @endif
                            </label>
                        </div>
                        </div>
                        <div class="form-group">
                        <label class="col-lg-1 control-label col-lg-offset-1">Other</label>
                                    <div class="col-lg-6">

                        <input name="sr_sh_other" type="text" placeholder="Specify Occupation" id="l-name" class="form-control" value="{{$patient->sr->sr_sh_other}}" minlength="2" >
                                    </div>
                </div>
               <br>
                <div class="form-group has-primary ">
                        <label class="col-sm-3 control-label col-lg-2" for="inputSuccess">Medical History</label>
                        <div class="col-lg-2">
                            <label class="checkbox-inline">
                                @if($patient->sr->sr_hypertension=='1')
                                    <input type="checkbox" id="inlineCheckbox1" value="1" name="sr_hypertension" checked=""> Hypertension
                                @else
                                    <input type="checkbox" id="inlineCheckbox1" value="1" name="sr_hypertension"> Hypertension
                                @endif
                            </label>
                            <label class="checkbox-inline">
                                @if($patient->sr->sr_stroke=='1')
                                    <input type="checkbox" id="inlineCheckbox3" value="1" name="sr_stroke" checked=""> Stroke
                                @else
                                    <input type="checkbox" id="inlineCheckbox3" value="1" name="sr_stroke"> Stroke
                                @endif
                            </label>
                        </div>
                        <div class="col-lg-2">
                            <label class="checkbox-inline">
                                @if($patient->sr->sr_ihd=='1')
                                    <input type="checkbox" id="inlineCheckbox3" value="1" name="sr_ihd" checked=""> IHD
                                @else
                                    <input type="checkbox" id="inlineCheckbox3" value="1" name="sr_ihd"> IHD
                                @endif
                            </label>
                            <label class="checkbox-inline">
                                @if($patient->sr->sr_diabets_mellitus=='1')
                                    <input type="checkbox" id="inlineCheckbox2" value="1" name="sr_diabets_mellitus" checked=""> Diabets Mellitus
                                @else
                                    <input type="checkbox" id="inlineCheckbox2" value="1" name="sr_diabets_mellitus"> Diabets Mellitus
                                @endif
                            </label>
                        </div>
                        <div class="col-lg-1">
                            <label class="checkbox-inline">
                                @if($patient->sr->sr_hf=='1')
                                    <input type="checkbox" id="inlineCheckbox4" value="1" name="sr_hf" checked> HF
                                @else
                                    <input type="checkbox" id="inlineCheckbox4" value="1" name="sr_hf"> HF
                                @endif
                            </label>
                            <label class="checkbox-inline">
                                @if($patient->sr->sr_rf=='1')
                                    <input type="checkbox" id="inlineCheckbox4" value="1" name="sr_rf" checked=""> RF
                                @else
                                    <input type="checkbox" id="inlineCheckbox4" value="1" name="sr_rf"> RF
                                @endif
                            </label>
                        </div>
                </div>
                <div class="form-group ">
                        <label class="col-lg-1 control-label col-lg-offset-1">Other</label>
                                    <div class="col-lg-6">
                        <input name="sr_mh_other" type="text" placeholder="Specify Occupation" value="{{$patient->sr->sr_mh_other}}" id="l-name" class="form-control" minlength="2" >
                                    </div>
                </div>
                <br>
                <div class="form-group has-primary ">
                        <label class="col-sm-3 control-label col-lg-2" for="inputSuccess">Drug History</label>
                        <div class="col-lg-9">
                        <label class="checkbox-inline" >
                                @if($patient->sr->sr_blood_transfusion=='1')
                                    <input type="checkbox" id="inlineCheckbox2" value="1" name="sr_blood_transfusion" checked=""> Blood Transfusion
                                @else
                                    <input type="checkbox" id="inlineCheckbox2" value="1" name="sr_blood_transfusion"> Blood Transfusion
                                @endif
                            </label>
                            </div>
                </div>
                <div class="form-group has-primary ">
                        <label class="col-lg-2 control-label col-offset-1" >Allergy to Drugs</label>
                        <div class="col-lg-9">
                <textarea rows="2" cols="50" class="form-control " id="ccomment" name="sr_allergy_drugs">{{$patient->sr->sr_allergy_drugs}}</textarea>
                        </div>
                </div>
                <div class="form-group has-primary ">
                        <label class="col-lg-2 control-label" > Long term Drugs</label>
                        <div class="col-lg-9">
                <textarea rows="2" cols="50" class="form-control " id="ccomment" name="sr_long_term_drugs">{{$patient->sr->sr_long_term_drugs}}</textarea>
                        </div>
                </div>
               
               <br>
            <div class="form-group has-primary ">
                        <label class="col-sm-3 control-label col-lg-2" for="inputSuccess">Family History</label>
                        <div class="col-lg-9">
                            <label class="checkbox-inline">
                                @if($patient->sr->sr_hcd=='1')
                                     <input type="checkbox" id="inlineCheckbox1" value="1" name="sr_hcd" checked=""> HCD 
                               @else
                                     <input type="checkbox" id="inlineCheckbox1" value="1" name="sr_hcd"> HCD 
                                @endif
                               
                            </label>
                        </div>
                </div>
                <br>
            <div class="form-group has-primary">
                    <label for="ccomment" class="control-label col-lg-3" >Gynecologic and Obsteric History</label>
                                        <div class="col-lg-8">
                    <textarea rows="2" cols="50" class="form-control" id="ccomment" name="sr_gynecologic_obsteric_history">{{$patient->sr->sr_gynecologic_obsteric_history}}</textarea>
                                        </div>
            </div>    
</section>
<hr class="bg-primary text-primary">

        <div class="form-group has-primary">
                    <label for="ccomment" class="control-label text-danger col-lg-1" style="text-decoration: underline;">Risk Factor</label>
                                        <div class="col-lg-10">
                    <textarea rows="2" cols="50" class="form-control " id="ccomment" name="risk_factor">{{$patient->sr->risk_factor}}</textarea>
                                        </div>
        </div>    
<hr class="bg-primary text-primary">
         
        <div class="form-group has-primary">    
                    <label class="col-lg-1 control-label text-danger h4" style="text-decoration: underline;">Examination</label>
                    
                    <br>
                    <br>
                    <div class="form-group has-primary">
                    <label class="col-lg-2 control-label" style="text-decoration: underline;">Vital Signs:</label>
                    <br>
              </div>
                 <div class="form-group has-primary">
                        <label class="col-lg-1 control-label col-lg-offset-1" >B.P</label>
                                    <div class="col-lg-4">
                        <input name="e_bp" type="text" placeholder="B.P" id="f-name" value="{{$patient->ex->e_bp}}" class="form-control"  >
                                    </div>

                        <label class="col-lg-1 control-label ">P.R</label>
                                    <div class="col-lg-4">
                        <input name="e_pr" type="text" placeholder="P.R" id="l-name" value="{{$patient->ex->e_pr}}" class="form-control"  >
                                    </div>
                </div>
                <div class="form-group has-primary">    
                        <label class="col-lg-1 control-label col-lg-offset-1">R.P</label>
                                    <div class="col-lg-4">
                        <input name="e_rp" type="text" placeholder="R.P" id="f-name" value="{{$patient->ex->e_rp}}" class="form-control"  >
                                    </div>

                        <label class="col-lg-1 control-label">Temperature</label>
                                    <div class="col-lg-4">
                        <input name="e_temperature" type="text" placeholder="Temperature" id="l-name" value="{{$patient->ex->e_temperature}}" class="form-control"  >
                                    </div>
                </div>

                <div class="form-group has-primary">   
                    <label  class="control-label col-lg-1 col-lg-offset-1">CVS</label>
                                        <div class="col-lg-9">
                    <textarea rows="2" cols="50" class="form-control " id="ccomment"  name="e_cvs">{{$patient->ex->e_cvs}}</textarea>
                                        </div>
                </div>
                <div class="form-group has-primary">  
                    <label class="control-label col-lg-1 col-lg-offset-1">GIT</label>
                                        <div class="col-lg-9">
                    <textarea rows="2" cols="50" class="form-control " id="ccomment" name="e_git">{{$patient->ex->e_git}}</textarea>
                                        </div>
               </div>    
                <div class="form-group has-primary">  
                    <label class="control-label col-lg-1 col-lg-offset-1">UT</label>
                                        <div class="col-lg-9">
                    <textarea rows="2" cols="50" class="form-control " id="ccomment" name="e_ut">{{$patient->ex->e_ut}}</textarea>
                                        </div>
               </div>    
                <div class="form-group has-primary">  
                    <label class="control-label col-lg-2" style="text-align:center;">Musculosleletal System</label>
                                        <div class="col-lg-9">
                    <textarea rows="2" cols="50" class="form-control " id="ccomment" name="e_musculosleletal_system">{{$patient->ex->e_musculosleletal_system}}</textarea>
                                        </div>
               </div>    

               <div class="form-group has-primary">  
                    <label class="control-label col-lg-2" style="text-align:center;">Respiratory System </label>
                                        <div class="col-lg-9">
                    <textarea rows="2" cols="50" class="form-control " id="ccomment" name="e_respiratory_system">{{$patient->ex->e_respiratory_system}}</textarea>
                                        </div>
               </div>                 
               <br>


               <hr class="bg-primary text-primary">

            <div class="form-group has-primary">    
                    <label class="col-lg-2 control-label text-danger h4" style="text-decoration: underline;">Neurological Exam</label>
            </div>          

              <div class="form-group has-primary ">
                        <label class="col-sm-3 control-label col-lg-2" for="inputSuccess">GCS on Admission:</label>
                        <div class="col-lg-9">

                    <label class="control-label col-lg-1 ">E</label>
                        <div class="col-lg-1">
                            <select class="form-control m-bot15" name="ne_gcse">
                            <option value='{{$patient->ne->ne_gcse}}'>{{$patient->ne->ne_gcse}}</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            </select>
                </div>

                <label class="control-label col-lg-1 ">M</label>
                        <div class="col-lg-1">
                            <select class="form-control m-bot15" name="ne_gcsm">
                            <option value='{{$patient->ne->ne_gcsm}}'>{{$patient->ne->ne_gcsm}}</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="4">5</option>
                            <option value="4">6</option>
                            </select>
                </div>

                <label class="control-label col-lg-1 ">V</label>
                        <div class="col-lg-1">
                            <select class="form-control m-bot15" name="ne_gcsv">
                            <option value='{{$patient->ne->ne_gcsv}}'>{{$patient->ne->ne_gcsv}}</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="4">5</option>
                            </select>
                </div>
                        </div>
                </div>
              
                <div class="form-group has-primary">  
                    <label class="control-label col-lg-2" style="text-align:center;">Karnofsky Score on Admission</label>
                                        <div class="col-lg-9">
                    <textarea rows="2" cols="50" class="form-control " id="ccomment" name="ne_karnofsky_score">{{$patient->ne->ne_karnofsky_score}}</textarea>
                                        </div>
               </div>     

            <div class="form-group has-primary">    
                    <label class="col-lg-3 control-label text-primary h4" style="text-decoration: underline;">Upper limb - Right - Motor</label>
            </div>          

               <div class="form-group has-primary">
               <label class="control-label col-lg-1 col-lg-offset-1">Power</label>
                        <div class="col-lg-3">
                            <select class="form-control m-bot15" name="ne_urmp">
                            <option value='{{$patient->ne->ne_urmp}}'>{{$patient->ne->ne_urmp}}</option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            </select>
                </div>

                <label class="col-sm-3 control-label col-lg-1  col-lg-offset-1" for="inputSuccess">Reflexes</label>
                <div class="col-lg-3">
                            <select class="form-control m-bot15" name="ne_urmr">
                            <option value='{{$patient->ne->ne_urmr}}'>{{$patient->ne->ne_urmr}}</option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            </select>
                </div>
                </div>

                <div class="form-group has-primary">
                        <label class="col-lg-1 control-label col-lg-offset-1">Tone</label>
                                    <div class="col-lg-2">
                        <input name="ne_urTone" type="text" value="{{$patient->ne->ne_urTone}}" placeholder="Specify Occupation" id="l-name" class="form-control" minlength="2" >
                                    </div>
                        <label class="col-lg-1 control-label">Sensory</label>
                                    <div class="col-lg-2">
                        <input name="ne_ursensory" type="text" value="{{$patient->ne->ne_ursensory}}" placeholder="Race" id="l-name" class="form-control" minlength="2" >
                                    </div>
                        <label class="col-lg-1 control-label">Cerebellar</label>
                                    <div class="col-lg-2">
                        <input name="ne_urcerebellarsign" type="text" value="{{$patient->ne->ne_urcerebellarsign}}" placeholder="Handedness" id="l-name" class="form-control" minlength="2" >
                                    </div>
                </div>
                <br>

                <div class="form-group has-primary">    
                    <label class="col-lg-3 control-label text-primary h4" style="text-decoration: underline;">Upper limb - Left - Motor</label>
            </div>          

               <div class="form-group has-primary">
               <label class="control-label col-lg-1 col-lg-offset-1">Power</label>
                        <div class="col-lg-3">
                            <select class="form-control m-bot15" name="ne_ulmp">
                            <option value='{{$patient->ne->ne_ulmp}}'>{{$patient->ne->ne_ulmp}}</option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            </select>
                </div>

                <label class="col-sm-3 control-label col-lg-1  col-lg-offset-1" for="inputSuccess">Reflexes</label>
                <div class="col-lg-3">
                            <select class="form-control m-bot15" name="ne_ulmr">
                            <option value='{{$patient->ne->ne_ulmr}}'>{{$patient->ne->ne_ulmr}}</option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            </select>
                </div>
                </div>

                <div class="form-group has-primary">
                        <label class="col-lg-1 control-label col-lg-offset-1">Tone</label>
                                    <div class="col-lg-2">
                        <input name="ne_ulTone" type="text" placeholder="Specify Occupation" id="l-name" value="{{$patient->ne->ne_ulTone}}" class="form-control" minlength="2" >
                                    </div>
                        <label class="col-lg-1 control-label">Sensory</label>
                                    <div class="col-lg-2">
                        <input name="ne_ulsensory" type="text" placeholder="Race" value="{{$patient->ne->ne_ulsensory}}" id="l-name" class="form-control" minlength="2" >
                                    </div>
                        <label class="col-lg-1 control-label">Cerebellar</label>
                                    <div class="col-lg-2">
                        <input name="ne_ulcerebellarsign" type="text" placeholder="Handedness" value="{{$patient->ne->ne_ulcerebellarsign}}" id="l-name" class="form-control" minlength="2" >
                                    </div>
                </div>
                <br>

                <div class="form-group has-primary">    
                    <label class="col-lg-3 control-label text-primary h4" style="text-decoration: underline;">Lower limb - Right - Motor</label>
            </div>          

               <div class="form-group has-primary">
               <label class="control-label col-lg-1 col-lg-offset-1">Power</label>
                        <div class="col-lg-3">
                            <select class="form-control m-bot15" name="ne_lrmp">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            </select>
                </div>

                <label class="col-sm-3 control-label col-lg-1  col-lg-offset-1" for="inputSuccess">Reflexes</label>
                <div class="col-lg-3">
                            <select class="form-control m-bot15" name="ne_lrmr">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            </select>
                </div>
                </div>

                <div class="form-group has-primary">
                        <label class="col-lg-1 control-label col-lg-offset-1">Tone</label>
                                    <div class="col-lg-2">
                        <input name="ne_lrTone" type="text" placeholder="Specify Occupation" id="l-name" class="form-control" minlength="2" >
                                    </div>
                        <label class="col-lg-1 control-label">Sensory</label>
                                    <div class="col-lg-2">
                        <input name="ne_lrsensory" type="text" placeholder="Race" id="l-name" class="form-control" minlength="2" >
                                    </div>
                        <label class="col-lg-1 control-label">Cerebellar</label>
                                    <div class="col-lg-2">
                        <input name="ne_lrcerebellarsign" type="text" placeholder="Handedness" id="l-name" class="form-control" minlength="2" >
                                    </div>
                </div>
                <br>

                <div class="form-group has-primary">    
                    <label class="col-lg-3 control-label text-primary h4" style="text-decoration: underline;">Lower limb - Left - Motor</label>
            </div>          

               <div class="form-group has-primary">
               <label class="control-label col-lg-1 col-lg-offset-1">Power</label>
                        <div class="col-lg-3">
                            <select class="form-control m-bot15" name="ne_llmp">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            </select>
                </div>

                <label class="col-sm-3 control-label col-lg-1  col-lg-offset-1" for="inputSuccess">Reflexes</label>
                <div class="col-lg-3">
                            <select class="form-control m-bot15" name="ne_llmr">
                            <option value='{{$patient->ne->ne_llmr}}'>{{$patient->ne->ne_llmr}}</option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            </select>
                </div>
                </div>

                <div class="form-group has-primary">
                        <label class="col-lg-1 control-label col-lg-offset-1">Tone</label>
                                    <div class="col-lg-2">
                        <input name="ne_llTone" type="text" placeholder="Specify Occupation" value="{{$patient->ne->ne_llTone}}" id="l-name" class="form-control" minlength="2" >
                                    </div>
                        <label class="col-lg-1 control-label">Sensory</label>
                                    <div class="col-lg-2">
                        <input name="ne_llsensory" type="text" placeholder="Race" value="{{$patient->ne->ne_llsensory}}" id="l-name" class="form-control" minlength="2" >
                                    </div>
                        <label class="col-lg-1 control-label">Cerebellar</label>
                                    <div class="col-lg-2">
                        <input name="ne_llcerebellarsign" type="text" placeholder="Handedness" value="{{$patient->ne->ne_llcerebellarsign}}" id="l-name" class="form-control" minlength="2" >
                                    </div>
                </div>
             

<hr class="bg-primary">
                <div class="form-group has-primary">    
                    <label class="col-lg-2 control-label text-danger h4" style="text-decoration: underline;">Investigations</label>
                   </div>

                <div class="form-group has-primary ">
                        <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Hematological Investigation</label>
                </div>       
                <div class="form-group has-primary ">
                        <div class="col-lg-9 col-lg-offset-2">
                            <label class="checkbox-inline" style="width: 200px">
                                @if($patient->in->in_hb=='1')
                                    <input type="checkbox" id="inlineCheckbox1" name="in_hb" checked=""> Hb%
                                @else
                                    <input type="checkbox" id="inlineCheckbox1" name="in_hb"> Hb%
                                @endif
                            </label>
                            <label class="checkbox-inline" style="width: 200px">
                                @if($patient->in->in_wbc_ount=='1')
                                <input type="checkbox" id="inlineCheckbox2" name="in_wbc_ount" checked> WBC Count
                                @else
                                <input type="checkbox" id="inlineCheckbox2" name="in_wbc_ount"> WBC Count
                                @endif
                            </label>
                            <label class="checkbox-inline" style="width: 200px">
                                @if($patient->in->in_rbc_count=='1')
                                <input type="checkbox" id="inlineCheckbox3" value="1" name="in_rbc_count"> RBC Count                            </label>
                                @else
                                <input type="checkbox" id="inlineCheckbox3" value="1" name="in_rbc_count"> RBC Count                            </label>
                                @endif
                            <label class="checkbox-inline" style="width: 200px">
                                @if($patient->in->in_platele_count=='1')
                                    <input type="checkbox" id="inlineCheckbox4" name="in_platele_count" value="1">  Platele Count
                                @else
                                    <input type="checkbox" id="inlineCheckbox4" name="in_platele_count" value="1">  Platele Count
                                @endif
                            </label>
                        </div>
                </div>
               
               <div class="form-group has-primary ">
                        <div class="col-lg-9 col-lg-offset-2">
                            <label class="checkbox-inline" style="width: 200px">
                                @if($patient->in->in_crp=='1')
                                    <input type="checkbox" id="inlineCheckbox1" name="in_crp" value="1" checked=""> CRP
                                @else
                                    <input type="checkbox" id="inlineCheckbox1" name="in_crp" value="1"> CRP
                                @endif
                            </label>
                            <label class="checkbox-inline" style="width: 200px">
                                @if($patient->in->in_pt=='1')
                                    <input type="checkbox" id="inlineCheckbox2" name="in_pt" value="1" checked=""> PT
                                @else
                                    <input type="checkbox" id="inlineCheckbox2" name="in_pt" value="1"> PT
                                @endif
                            </label>
                            <label class="checkbox-inline" style="width: 200px">
                                @if($patient->in->in_ptt=='1')
                                    <input type="checkbox" id="inlineCheckbox3" name="in_ptt" value="1" checked=""> PTT  
                              @else                                                        
                                    <input type="checkbox" id="inlineCheckbox3" name="in_ptt" value="1"> PTT                            
                                @endif
                            <label class="checkbox-inline" style="width: 200px">
                                 @if($patient->in->in_inr=='1')
                                    <input type="checkbox" id="inlineCheckbox4" name="in_inr" value="1" checked="">   INR
                              @else                                                        
                                    <input type="checkbox" id="inlineCheckbox4" name="in_inr" value="1">   INR
                                @endif
                            </label>
                        </div>
                </div>
    
            <div class="form-group has-primary ">
                        <div class="col-lg-9 col-lg-offset-2">
                            <label class="checkbox-inline" style="width: 200px">
                                @if($patient->in->in_bleeding_time=='1')
                                    <input type="checkbox" id="inlineCheckbox1" name="in_bleeding_time" value="1" checked=""> Bleeding Time
                              @else                                                        
                                    <input type="checkbox" id="inlineCheckbox1" name="in_bleeding_time" value="1"> Bleeding Time
                                @endif
                            </label>
                            <label class="checkbox-inline" style="width: 200px">
                                @if($patient->in->in_clotting_time=='1')
                                    <input type="checkbox" id="inlineCheckbox2" name="in_clotting_time" value="1" checked> Clotting Time
                              @else                                                        
                                <input type="checkbox" id="inlineCheckbox2" name="in_clotting_time" value="1"> Clotting Time
                                @endif
                            </label>
                            <label class="checkbox-inline" style="width: 200px">
                                @if($patient->in->in_esr=='1')
                                <input type="checkbox" id="inlineCheckbox3" name="in_esr" value="1" checked> ESR                            
                              @else                                                        
                                <input type="checkbox" id="inlineCheckbox3" name="in_esr" value="1"> ESR                            
                                @endif
                                </label>
                            <label class="checkbox-inline" style="width: 200px">
                                 @if($patient->in->in_blood_film=='1')
                                <input type="checkbox" id="inlineCheckbox4" name="in_blood_film" value="1" checked="">   Blood Film
                              @else                                                        
                                <input type="checkbox" id="inlineCheckbox4" name="in_blood_film" value="1">   Blood Film
                                @endif
                            </label>
                        </div>
            </div>


            <div class="form-group has-primary ">
                        <div class="col-lg-9 col-lg-offset-2">
                      
                            <label class="checkbox-inline" style="width: 200px">
                                 @if($patient->in->in_vitamin_d3=='1')
                                <input type="checkbox" id="inlineCheckbox1" name="in_vitamin_d3" value="1" checked=> Vitamin D3
                              @else                                                        
                                <input type="checkbox" id="inlineCheckbox1" name="in_vitamin_d3" value="1"> Vitamin D3
                                @endif
                            </label>
                            <label class="checkbox-inline" style="width: 200px">
                                 @if($patient->in->in_b12=='1')
                                    <input type="checkbox" id="inlineCheckbox2" name="in_b12" value="1" checked> B12
                              @else                                                        
                                    <input type="checkbox" id="inlineCheckbox2" name="in_b12" value="1"> B12
                                @endif
                            </label>
                              
            </div>
            <br>
            <br>
            <div class="form-group ">
                        <label class="col-lg-1 control-label col-lg-offset-1">Other</label>
                                    <div class="col-lg-8">
                        <input name="in_other" type="text" placeholder="Specify Occupation" value="{{$patient->in->other}}" id="l-name" class="form-control" minlength="2">                    
            </div>
            </div>
            <br>
           
<div class="form-group has-primary">  
                    <label class="control-label col-lg-2">MRI (Native)</label>
                                        <div class="col-lg-8">
                    <textarea rows="2" cols="50" class="form-control " id="ccomment" name="in_mri_native">{{$patient->in->in_mri_native}}</textarea>
                                        </div>
            </div>    
            <div class="form-group has-primary">   
                    <label  class="control-label col-lg-2">MRI (Contrast)</label>
                                        <div class="col-lg-8">
                    <textarea rows="2" cols="50" class="form-control " id="ccomment" name="in_mri_contrast">{{$patient->in->in_mri_contrast}}</textarea>
                                        </div>
            </div>
<br>
<div class="form-group has-primary">  
                    <label class="control-label col-lg-2">EEG</label>
                                        <div class="col-lg-8">
                    <textarea rows="2" cols="50" class="form-control " id="ccomment" name="in_eeg">{{$patient->in->in_eeg}}</textarea>
                                        </div>
            </div>    
            <div class="form-group has-primary">   
                    <label  class="control-label col-lg-2">EMG</label>
                                        <div class="col-lg-8">
                    <textarea rows="2" cols="50" class="form-control " id="ccomment" name="in_emg">{{$patient->in->in_emg}}</textarea>
                                        </div>
            </div>

            <div class="form-group has-primary">   
                    <label  class="control-label col-lg-2">Skull X-Ray</label>
                                        <div class="col-lg-8">
                    <textarea rows="2" cols="50" class="form-control " id="ccomment" name="in_skull_xray">{{$patient->in->in_skull_xray}}</textarea>
                                        </div>
            </div>
            <div class="form-group has-primary">  
                    <label class="control-label col-lg-2">CXR</label>
                                        <div class="col-lg-8">
                    <textarea rows="2" cols="50" class="form-control " id="ccomment" name="in_cxr">{{$patient->in->in_cxr}}</textarea>
                                        </div>
            </div>    

            <div class="form-group has-primary">
                    <label class="col-lg-2 control-label">CT-Scan (Native):</label>
                    <div class="col-lg-8">
                    <textarea rows="2" cols="50" class="form-control " id="ccomment" name="in_ct_scan_native">{{$patient->in->in_ct_scan_native}}</textarea>
                                        </div>
            </div>

         
            <div class="form-group has-primary">  
                    <label class="control-label col-lg-2">CT_Scan (Contrast)</label>
                                        <div class="col-lg-8">
                    <textarea rows="2" cols="50" class="form-control " id="ccomment" name="in_ct_scan_contrast">{{$patient->in->in_ct_scan_native}}</textarea>
                                        </div>
            </div>  
            <div class="form-group has-primary">  
                    <label class="control-label col-lg-2">MRA</label>
                                        <div class="col-lg-8">
                    <textarea rows="2" cols="50" class="form-control " id="ccomment" name="in_mra"{{$patient->in->in_mra}}></textarea>
                                        </div>
            </div>    
            <div class="form-group has-primary">   
                    <label  class="control-label col-lg-2">Angiography</label>
                                        <div class="col-lg-8">
                    <textarea rows="2" cols="50" class="form-control " id="ccomment" name="in_angiography">{{$patient->in->in_angiography}}</textarea>
                                        </div>
            </div>
            <div class="form-group has-primary">  
                    <label class="control-label col-lg-2">DSA</label>
                                        <div class="col-lg-8">
                    <textarea rows="2" cols="50" class="form-control " id="ccomment" name="in_dsa">{{$patient->in->in_dsa}}</textarea>
                                        </div>
            </div>    

            <hr class="bg-primary">
                <div class="form-group has-primary">    
                    <label class="col-lg-2 control-label text-danger h4" style="text-decoration: underline;">Diagnosis</label>
            
                                        <div class="col-lg-8">
                    <textarea rows="2" cols="50" class="form-control " id="ccomment" name="diagnosis">{{$patient->diagnosis}}</textarea>
                                        </div>
            </div>

            <hr class="bg-primary">
                <div class="form-group has-primary">    
                    <label class="col-lg-2 control-label text-danger h4" style="text-decoration: underline;">Treatment</label>
                   </div>

                <div class="form-group has-primary text-primary">
                        <label class="col-sm-3 control-label col-lg-2" for="inputSuccess"  style="text-decoration: underline;">Medical</label>
                </div>       
               
               <div class="form-group has-primary text-primary">
                @foreach ($patient->treatments as $tr)
                    <lable class="col-lg-2 control-label text-danger h4">{{$tr->tr_name}}</lable>
                @endforeach
                <br/>
                <br/>
               
                </div>
                <div class="form-group has-primary  text-primary">
                        <label class="col-sm-3 control-label col-lg-2" for="inputSuccess"  style="text-decoration: underline;">Surgical</label>
                     
                <div class="col-lg-8">
                    <textarea rows="2" cols="50" class="form-control " id="ccomment" name="tr_surgical">{{$patient->te->tr_surgical}}</textarea>
                                        </div>
                </div>

            <div class="form-group has-primary  text-primary">
                        <label class="col-sm-3 control-label col-lg-2" for="inputSuccess"  style="text-decoration: underline;">Follow Up</label>
                </div>       



                <div class="form-group has-primary ">
                        <label class="col-sm-3 control-label col-lg-2" for="inputSuccess">GCS on Discharge:</label>
                        <div class="col-lg-9">

                    <label class="control-label col-lg-1 ">E</label>
                        <div class="col-lg-1">
                            <select class="form-control m-bot15" name="tr_gcse">
                            <option value="{{$patient->te->tr_gcse}}" selected>{{$patient->te->tr_gcse}}</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            </select>
                </div>
                           
              
                <label class="control-label col-lg-1 ">M</label>
                        <div class="col-lg-1">
                            <select class="form-control m-bot15" name="tr_gcsm">
                            <option value="{{$patient->te->tr_gcsm}}" selected="">{{$patient->te->tr_gcsm}}</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="4">5</option>
                            <option value="4">6</option>
                            </select>
                </div>

                <label class="control-label col-lg-1 ">V</label>
                        <div class="col-lg-1">
                            <select class="form-control m-bot15" name="tr_gcsv">
                            <option value="{{$patient->te->tr_gcsv}}" selected="">{{$patient->te->tr_gcsv}}</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="4">5</option>
                            </select>
                </div>
                        </div>
                </div>
              

                <div class="form-group has-primary">  
                    <label class="control-label col-lg-2" style="text-align:center;">Karnofsky Score</label>
                                        <div class="col-lg-9">
                    <textarea rows="2" cols="50" class="form-control " id="ccomment" name="tr_karnofsky_score">{{$patient->te->tr_karnofsky_score}}</textarea>
                                        </div>
               </div>     


               <div class="form-group has-primary">  
                    <label class="control-label col-lg-2" style="text-align:center;">Neurologically</label>
                                        <div class="col-lg-9">
                    <textarea rows="3" cols="50" class="form-control " id="ccomment" name="tr_neurologically">{{$patient->te->tr_neurologically}}</textarea>
                                        </div>
               </div>     


               <div class="form-group has-primary">  
                    <label class="control-label col-lg-2" style="text-align:center;">Radiologically</label>
                                        <div class="col-lg-9">
                    <textarea rows="3" cols="50" class="form-control " id="ccomment" name="tr_radiologically">{{$patient->te->tr_radiologically}}</textarea>
                                        </div>
               </div>     







               </div>                  
               </div>                  
              


                                <div class="form-group">
                                    <div class="col-lg-offset-3 col-lg-6">
                                        <button class="btn btn-primary" type="submit">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
            @endsection
@section('afterFooter')
<script type="text/javascript">
$(document).ready(function() {
    $('.js-example-basic-multiple').select2();

});
</script>
@endsection