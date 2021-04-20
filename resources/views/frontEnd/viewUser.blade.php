@extends('backEnd.master')
@section('mainContent')

@php
function showPicName($data){
$name = explode('/', $data);
return $name[4];
}
function showJoiningLetter($data){
$name = explode('/', $data);
return $name[3];
}
function showResume($data){
$name = explode('/', $data);
return $name[3];
}
function showOtherDocument($data){
$name = explode('/', $data);
return $name[3];
}

@endphp

@php  $setting = App\SmGeneralSettings::find(1);  if(!empty($setting->currency_symbol)){ $currency = $setting->currency_symbol; }else{ $currency = '$'; }   @endphp 

<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1>Human Resource</h1>
            <div class="bc-pages">
                <a href="{{url('dashboard')}}">Dashboard</a>
                <a href="{{route('staff_directory')}}">Staff List</a>
            </div>
        </div>
    </div>
</section>
<section class="mb-40 student-details">
    @if(session()->has('message-success'))
    <div class="alert alert-success">
        {{ session()->get('message-success') }}
    </div>
    @elseif(session()->has('message-danger'))
    <div class="alert alert-danger">
        {{ session()->get('message-danger') }}
    </div>
    @endif
    <div class="container-fluid p-0">
        <div class="row">
         <div class="col-lg-3">
            <!-- Start Student Meta Information -->
            <div class="main-title">
                <h3 class="mb-20">Staff Details</h3>
            </div>
            <div class="student-meta-box">
                <div class="student-meta-top"></div>
                @if(!empty($staffDetails->staff_photo))
                <img class="student-meta-img img-100" src="{{asset($staffDetails->staff_photo)}}"  alt="">
                @else
                <img class="student-meta-img img-100" src="{{asset('public/uploads/sample.jpg')}}"  alt="">
                @endif
                <div class="white-box">
                    <div class="single-meta mt-10">
                        <div class="d-flex justify-content-between">
                            <div class="name">
                                Staff Name
                            </div>
                            <div class="value">

                                @if(isset($staffDetails)){{$staffDetails->full_name}}@endif

                            </div>
                        </div>
                    </div>
                    <div class="single-meta">
                        <div class="d-flex justify-content-between">
                            <div class="name">
                                Role 
                            </div>
                            <div class="value">
                               @if(isset($staffDetails)){{$staffDetails->roles->name}}@endif
                           </div>
                       </div>
                   </div>
                   <div class="single-meta">
                    <div class="d-flex justify-content-between">
                        <div class="name">
                            Designation
                        </div>
                        <div class="value">
                           @if(isset($staffDetails)){{ !empty($staffDetails->designations)?$staffDetails->designations->title:''}}@endif
                       </div>
                   </div>
               </div>
               <div class="single-meta">
                <div class="d-flex justify-content-between">
                    <div class="name">
                        Department
                    </div>
                    <div class="value">
                        @if(isset($staffDetails)){{$staffDetails->departments->name}}@endif

                    </div>
                </div>
            </div>
            <div class="single-meta">
                <div class="d-flex justify-content-between">
                    <div class="name">
                        EPF No
                    </div>
                    <div class="value">
                       @if(isset($staffDetails)){{$staffDetails->epf_no}}@endif
                   </div>
               </div>
           </div>
           <div class="single-meta">
            <div class="d-flex justify-content-between">
                <div class="name">
                    Basic Salary
                </div>
                <div class="value">
                    @if(isset($staffDetails)){{$staffDetails->basic_salary}}@endif
                </div>
            </div>
        </div>
        <div class="single-meta">
            <div class="d-flex justify-content-between">
                <div class="name">
                    Contarct Type
                </div>
                <div class="value">
                   @if(isset($staffDetails)){{$staffDetails->contract_type}}@endif
               </div>
           </div>
       </div>
       <div class="single-meta">
        <div class="d-flex justify-content-between">
            <div class="name">
                Date of Joining
            </div>
            <div class="value">
                @if(isset($staffDetails))                                    
                    {{$staffDetails->date_of_joining != ""? App\SmGeneralSettings::DateConvater($staffDetails->date_of_joining):''}}
                @endif
            </div>
        </div>
    </div>
</div>
</div>
<!-- End Student Meta Information -->

</div>

<!-- Start Student Details -->
<div class="col-lg-9 staff-details">
    
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" href="#studentProfile" role="tab" data-toggle="tab">profile</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#payroll" role="tab" data-toggle="tab">Payroll</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#leaves" role="tab" data-toggle="tab">Leaves</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#staffDocuments" role="tab" data-toggle="tab">documents</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#staffTimeline" role="tab" data-toggle="tab">timeline</a>
        </li>
        <li class="nav-item edit-button">
            <a href="{{url('edit-staff/'.$staffDetails->id)}}" class="primary-btn small fix-gr-bg">@lang('lang.edit')
            </a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <!-- Start Profile Tab -->
        <div role="tabpanel" class="tab-pane fade show active" id="studentProfile">
            <div class="white-box">
                <h4 class="stu-sub-head">Personal info</h4>
                <div class="single-info">
                    <div class="row">
                        <div class="col-lg-5 col-md-5">
                            <div class="">
                                Mobile No
                            </div>
                        </div>

                        <div class="col-lg-7 col-md-6">
                            <div class="">
                                @if(isset($staffDetails)){{$staffDetails->mobile}}@endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="single-info">
                    <div class="row">
                        <div class="col-lg-5 col-md-6">
                            <div class="">
                               Emergency Mobile
                           </div>
                       </div>

                       <div class="col-lg-7 col-md-7">
                        <div class="">
                         @if(isset($staffDetails)){{$staffDetails->emergency_mobile}}@endif
                     </div>
                 </div>
             </div>
         </div>

         <div class="single-info">
            <div class="row">
                <div class="col-lg-5 col-md-6">
                    <div class="">
                        Email
                    </div>
                </div>

                <div class="col-lg-7 col-md-7">
                    <div class="">
                        @if(isset($staffDetails)){{$staffDetails->email}}@endif
                    </div>
                </div>
            </div>
        </div>

        <div class="single-info">
            <div class="row">
                <div class="col-lg-5 col-md-6">
                    <div class="">
                        Gender
                    </div>
                </div>

                <div class="col-lg-7 col-md-7">
                    <div class="">
                        @if(isset($staffDetails)){{$staffDetails->gender}}@endif 
                    </div>
                </div>
            </div>
        </div>

        <div class="single-info">
            <div class="row">
                <div class="col-lg-5 col-md-6">
                    <div class="">
                        Date of Birth
                    </div>
                </div>

                <div class="col-lg-7 col-md-7">
                    <div class="">
                        @if(isset($staffDetails))                                               
                            {{$staffDetails->date_of_birth != ""? App\SmGeneralSettings::DateConvater($staffDetails->date_of_birth):''}}
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="single-info">
            <div class="row">
                <div class="col-lg-5 col-md-6">
                    <div class="">
                       Marital Status
                   </div>
               </div>

               <div class="col-lg-7 col-md-7">
                <div class="">
                    @if(isset($staffDetails)){{$staffDetails->marital_status}}@endif
                </div>
            </div>
        </div>
    </div>

    <div class="single-info">
        <div class="row">
            <div class="col-lg-5 col-md-6">
                <div class="">
                    Father Name
                </div>
            </div>

            <div class="col-lg-7 col-md-7">
                <div class="">
                    @if(isset($staffDetails)){{$staffDetails->fathers_name}}@endif
                </div>
            </div>
        </div>
    </div>

    <div class="single-info">
        <div class="row">
            <div class="col-lg-5 col-md-6">
                <div class="">
                    Mother Name
                </div>
            </div>

            <div class="col-lg-7 col-md-7">
                <div class="">
                    @if(isset($staffDetails)){{$staffDetails->mothers_name}}@endif
                </div>
            </div>
        </div>
    </div>

    <div class="single-info">
        <div class="row">
            <div class="col-lg-5 col-md-6">
                <div class="">
                    Qualification
                </div>
            </div>

            <div class="col-lg-7 col-md-7">
                <div class="">
                    @if(isset($staffDetails)){{$staffDetails->qualification}}@endif
                </div>
            </div>
        </div>
    </div>

    <div class="single-info">
        <div class="row">
            <div class="col-lg-5 col-md-6">
                <div class="">
                   Work Experience
               </div>
           </div>

           <div class="col-lg-7 col-md-7">
            <div class="">
                @if(isset($staffDetails)){{$staffDetails->experience}}@endif
            </div>
        </div>
    </div>
</div>

<!-- Start Parent Part -->
<h4 class="stu-sub-head mt-40">Addresses</h4>
<div class="single-info">
    <div class="row">
        <div class="col-lg-5 col-md-5">
            <div class="">
                Current Address
            </div>
        </div>

        <div class="col-lg-7 col-md-6">
            <div class="">
                @if(isset($staffDetails)){{$staffDetails->current_address}}@endif
            </div>
        </div>
    </div>
</div>

<div class="single-info">
    <div class="row">
        <div class="col-lg-5 col-md-5">
            <div class="">
             Permanent Address
         </div>
     </div>

     <div class="col-lg-7 col-md-6">
        <div class="">
            @if(isset($staffDetails)){{$staffDetails->permanent_address}}@endif
        </div>
    </div>
</div>
</div>
<!-- End Parent Part -->


         <!-- timeline form modal start-->
        <div class="modal fade admin-query" id="add_timeline_madal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Timeline</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">
                       <div class="container-fluid">
                                                
                             {{ Form::open(['class' => 'form-horizontal', 'files' => true, 'url' => 'staff_timeline_store',
                             'method' => 'POST', 'enctype' => 'multipart/form-data', 'name' => 'document_upload']) }}
                             <div class="row">
                                <div class="col-lg-12">
                                    <input type="hidden" name="staff_student_id" value="{{$staffDetails->id}}">
                                    <div class="row mt-25">
                                        <div class="col-lg-12">
                                            <div class="input-effect">
                                                <input class="primary-input form-control{" type="text" name="title" value="" id="title">
                                                <span class="focus-border"></span>
                                                <label>Title <span>*</span> </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 mt-30">
                                    <div class="no-gutters input-right-icon">
                                        <div class="col">
                                            <div class="input-effect">
                                                <input class="primary-input date form-control{{ $errors->has('date_of_birth') ? ' is-invalid' : '' }}" id="startDate" type="text"
                                                name="date" autocomplete="off" value="{{date('m/d/Y')}}">
                                                <span class="focus-border"></span>
                                                <label>Date <span>*</span> </label>
                                                @if ($errors->has('date_of_birth'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('date_of_birth') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <button class="" type="button">
                                                <i class="ti-calendar" id="start-date-icon"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 mt-30">
                                    <div class="input-effect">
                                        <textarea class="primary-input form-control" cols="0" rows="3" name="description" id="Description"></textarea>
                                        <label>Description<span></span> </label>
                                        <span class="focus-border textarea"></span>
                                    </div>
                                </div>

                                <div class="col-lg-12 mt-30">
                                    <div class="row no-gutters input-right-icon mt-35">
                                        <div class="col">
                                            <div class="input-effect">
                                                <input class="primary-input" id="placeholderFileFourName" type="text"
                                                       placeholder="Document"
                                                       readonly>
                                                <span class="focus-border"></span>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <button class="primary-btn-small-input" type="button">
                                                <label class="primary-btn small fix-gr-bg"
                                                       for="document_file_4">@lang('lang.browse')</label>
                                                <input type="file" class="d-none" id="document_file_4" name="document_file_4">
                                            </button>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-lg-12 mt-30">

                                    <input type="checkbox" id="currentAddressCheck" class="common-checkbox" name="visible_to_student" value="1">
                                    <label for="currentAddressCheck">Visible to this person</label>
                                </div>


                                <!-- <div class="col-lg-12 text-center mt-40">
                                    <button class="primary-btn fix-gr-bg" id="save_button_sibling" type="button">
                                        <span class="ti-check"></span>
                                        save information
                                    </button>
                                </div> -->
                                <div class="col-lg-12 text-center mt-40">
                                    <div class="mt-40 d-flex justify-content-between">
                                        <button type="button" class="primary-btn tr-bg" data-dismiss="modal">Cancel</button>

                                        <button class="primary-btn fix-gr-bg" type="submit">save</button>
                                    </div>
                                </div>
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
<!-- timeline form modal end-->
    </div>
</div>
</section>
@endsection
