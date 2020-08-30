@extends('layouts.master')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.3.0/paper.css">

<style>
  .watermark {
    opacity: 0.9;
    color: BLACK;
    position: absolute;
    bottom: 0;
    right: 0;
  }

  .darkblue {
    color: #191970 !important;
  }

    .header,
    .header-space,
    .footer,
    .footer-space {
        height: 100px;
        margin: 2px;
    }

    .header {
        position: fixed;
        
    }

    .footer {
        position: fixed;
        height: 100px;
        bottom: 10;
        width: 100%;
    }

    @page {
        size: A4
    }
</style>

@section('content')

<!--main content start-->

<body class="A4 visible-print">
    <section>
  <table >
            <thead class="d-none d-print-block">
                <tr>
                    <td>
                        <div class="form-group row ">
                            <img class="visible-print" width="1100" src="{{asset('/public/img/header.png')}}" alt="E-Lab"
                            style="margin-top: 25px !important;">
                        </div>
                    </td>
                </tr>
            </thead>
      
    <tbody>
      <tr>
        <td>
          <div class="content">
            <div class="col-lg-12" id="content">
              <h4 class="text-left" style="padding-top: 5px !important;">
                <strong>
                  <span class="darkblue">Full Name:</span> {{$patient->patient->fname}}
                </strong>
                <strong style="padding-left: 50px !important;">
                  <span class="darkblue">Gender:</span> {{$patient->patient->gender}}
                </strong>

                <strong style="padding-left: 50px !important;">
                  @if($patient->patient->years == 0 || $patient->patient->years == "")
                  &nbsp;&nbsp;&nbsp;
                  @else
                  <span class="darkblue">Years:</span> {{$patient->patient->years}}
                  @endif

                  @if($patient->patient->months == 0 || $patient->patient->months == "")
                  &nbsp;&nbsp;&nbsp;
                  @else
                  <span class="darkblue">Month:</span> {{$patient->patient->months}}
                  @endif
                </strong>
              </h4>
              <h4 class="text-left" style="padding-top: 10px !important;">
                <strong> <span class="darkblue"> Referral Doctor:</span>
                  {{count($patient->refferal)>0?$patient->refferal->name:""}} <strong
                    style="padding-left: 100px !important;"> <span class="darkblue">Date:</span>
                    {{$patient->created_at->format('d/m/Y')}} </strong></strong>
              </h4>
              <br>
              <br>
              <div class="form-group has-primary ">
                <div class="for-watermark-div visible-print">
                  <img src="{{asset('/public/img/medicell.png')}}">
                </div>
                @foreach ($maintests as $maintest)
                @continue(!in_array($maintest->id, $patient->maintests()))
                <div class="form-group has-primary text-center" style="padding-top: 10px !important;">
                  <label class="control-label text-center">
                    <h2 class=" text-center"><strong style="font-style: italic; color: #191970 !important;">{{$maintest->name}}</strong><h2>
                </div>
                <table class="table table-responsive table-bordered table-striped h4" style="width:750px">
                  <thead>
                    <tr class="bg-info">
                      <th class="col-print-3">Test Name</th>
                      <th class="col-print-1">Result</th>
                      <th class="col-print-4">Normal Range</th>
                    </tr>
                  </thead>
                  @foreach ($patient->subtests->sortby('description') as $subtest)
                  @continue($subtest->maintest->id!=$maintest->id)
                  <tbody>
                    @if($subtest->name=='Urine' || $subtest->name=='Stool' || $subtest->name=='SFA')
                    <tr>
                    </tr>
                    @else
                    <tr>
                    </tr>
                    <tr class="h4">
                      <td> {{$subtest->name}}</td>
                      <td> <strong class="darkblue">{{$subtest->pivot->result}}</strong></td>
                      <td>{{$subtest->normal_range}}</td>
                    </tr>
                    @endif
                  </tbody>
                  @endforeach
                </table>
                <hr style="border: 1px solid silver !important;">
                @endforeach
              </div>
            </div>
            <br>
          </div>
        </td>
      </tr>
    </tbody>
    <tfoot>
      <tr>
        <td>
          <div class="footer-space">&nbsp;</div>
        </td>
      </tr>
    </tfoot>
  </table>

  <div class="footer">
    <img class="visible-print" width="1185" src="{{asset('/public/img/footerr.png')}}" alt=" E-Lab">
  </div>
  </section>
</body>
@endsection
@section('afterFooter')
<script type="text/javascript">
  $(document).ready(function () {
window.print();
window.close();
  });

setTimeout(function () { window.print(); }, 500);
        window.onfocus = function () { setTimeout(function () { window.close(); }, 500); }
</script>
@endsection