
@extends('layouts.master')
@section('content')

<br/>
<br/>
<br/>
<div class="row bordered-2" >
    
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
        <strong><p style="font-size: 38px;"></p> </strong>
    </div>
    </div>


<div class="row col-lg-12 col-sm-12 col-xs-12 col-md-12" >
        <div class="table-responsive">

    <table class="table table-bordered table-responsive table-striped table-text-center" style="font-color:white;">
    <thead class="text-info" >
        <tr class="bg-info">
           <th>Patient ID</th>
           <th>Patient name</th>
           <th>Patient phone</th>
          <th>Patient CVs</th>
            <th>visitations</th>
        </tr>
    </thead>
   @foreach ($patients as $patient)
@if($patient->private == 1)
    <tr class="h4 bg-info" style="font-weight: bold;">
@else
    <tr class="h4" style="font-weight: bold;">
@endif

    <td class="bg- color-brown">{{$patient->id}}</td>
    <td class="bg-">{{$patient->fname}}</td>
    <td class="text-primary">{{$patient->phone}}</td>

    <td class="text-primary">
        @foreach ($patient->patientCVs as $im)
                    <a href="{{$im->url}}" target="_blank"><span class="h3"><strong>{{$loop->iteration}}</strong></span></a>
        @endforeach
    </td>

<td class="text-primary">
    <table class="table table-bordered">
    @foreach ($patient->visitations as $visit)
    <tr>
        <td>
            @if($loop->last)
             <a href="\visitation\edit\{{$visit->id}}\{{$patient->id}}" target="_blank" class="btn btn-primary"> 
             <span class="h5"><strong>{{$visit->created_at->format('d/m/Y')}}</strong></span></a>
            @else
             <a href="\visitation\view\{{$visit->id}}\{{$patient->id}}" target="_blank" class="btn btn-success"> 
             <span class="h5"><strong>{{$visit->created_at->format('d/m/Y')}}</strong></span></a>
            @endif
        </td>
        <td>
            @foreach ($visit->images as $image)
                <a href="{{$image->url}}" target="_blank"><span class="h3"><strong>{{$loop->iteration}}</strong></span></a>
            @endforeach
        </td>
    <tr/>
    @endforeach
    <tr>
    <td><a href="\visitation\new\{{$patient->id}}" class="btn btn-danger"><span class="h5"><strong>New Visit</strong></span></a></td>
    </tr>
    </table>
</td>
</tr>
@endforeach
</table>
</div>
</div>
</div>

@endsection
