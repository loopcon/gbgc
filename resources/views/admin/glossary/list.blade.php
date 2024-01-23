@extends('layouts.adminheader')
<style>
.switch {
  position: relative;
  display: inline-block;
  width: 90px;
  height: 34px;
}

.switch input {display:none;}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: gray;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #4099ff;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(55px);
  -ms-transform: translateX(55px);
  transform: translateX(55px);
}

/*------ ADDED CSS ---------*/
.on
{
  display: none;
}

.on, .off
{
  color: white;
  position: absolute;
  transform: translate(-50%,-50%);
  top: 50%;
  left: 50%;
  font-size: 10px;
  font-family: Verdana, sans-serif;
}

input:checked+ .slider .on
{display: block;}

input:checked + .slider .off
{display: none;}

/*--------- END --------*/

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;}
  </style>

@section('content')
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-inbox bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Glossaries</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="../index.html"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('adminindex')}}">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('adminreport')}}">Glossary</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row align-items-end mt-4">
            <div class="col-lg-2">
                <div class="d-inline">
                    <h4>Currency</h4>
                    <label class="switch">
                        <input type="checkbox" id="togBtn">
                        <div class="slider round">
                        <!--ADDED HTML -->
                        <span class="on">Standard</span>
                        <span class="off">Local</span>
                        <!--END-->
                        </div>
                    </label>   
                </div>
            </div>
            <div class="col-lg-2">
                <div class="d-inline">
                    <h4>View</h4>
                    <label class="switch">
                        <input type="checkbox" id="togBtn">
                        <div class="slider round">
                        <!--ADDED HTML -->
                        <span class="on">Standardised</span>
                        <span class="off">Local</span>
                        <!--END-->
                        </div>
                    </label>   
                </div>
            </div>
            <div class="col-lg-3">
                <div class="d-inline">
                    <h4>Jurisdiction</h4>
                    <label>
                    <select id="redion_id" class="form-control select2" name="redion_id">
                        <option value="" selected disabled>--Select--</option>
                        @if($regions->count())
                            @foreach($regions as $region)
                                <option value="{{$region->id}}" >{{ucfirst($region->name)}}</option>
                            @endforeach
                        @endif
                    </select> 
                    </lable>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="d-inline">
                    
                    <div class="row">
                        <div class="col-4">
                            <label> <h4>Year From</h4>
                            <select id="ddlYearsfrom" class="form-control select2">
                                <option value="" hidden>{{__('-- select --')}}</option>
                            </select>
                            </lable>
                        </div>
                        <div class="col-4">
                            <label> <h4>Year To</h4>
                            <select id="ddlYearsto" class="form-control select2">
                                <option value="" hidden>{{__('-- select --')}}</option>
                            </select>
                            </lable>
                        </div>   
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="row">
                                    <div class="col-12">
                                        @if ($message = Session::get('success'))
                                            <div class="alert alert-dismissible" role="alert" style="border-color:#4099ff;color:#4099ff">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                                <div class="alert-message">
                                                    {{ $message }}
                                                </div>
                                            </div>
                                        @endif
                                        @if ($message = Session::get('error'))
                                            <div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                                <div class="alert-message">
                                                    {{ $message }}
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <?php /*<div class="card-header">
                                    <div class="form-row">
                                        <div class="col-md-12 text-right">
                                            <div class="col-md-12 text-right"><a href="{{route('faq-create')}}" class="btn btn-success"><i class="align-middle" data-feather="plus"></i>{{__('Add')}}</a></div>
                                        </div>
                                    </div>
                                </div>*/ ?>
                                <div class="card-block p-b-0">
                                    <div class="table-responsive">
                                        <table class="table table-hover m-b-0">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Glossary</th>
                                                    <th>Customer</th>
                                                    <th>Status</th>
                                                    <th>Rating</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Sofa</td>
                                                    <td>#PHD001</td>
                                                    <td><a href="https://demo.dashboardpack.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="ec8d8e8fac8b818d8580c28f8381">[email&#160;protected]</a></td>
                                                    <td><label class="label label-danger">Out Stock</label></td>
                                                    <td>
                                                        <a href="#!"><i class="fa fa-star f-12 text-c-yellow"></i></a>
                                                        <a href="#!"><i class="fa fa-star f-12 text-c-yellow"></i></a>
                                                        <a href="#!"><i class="fa fa-star f-12 text-c-yellow"></i></a>
                                                        <a href="#!"><i class="fa fa-star f-12 text-default"></i></a>
                                                        <a href="#!"><i class="fa fa-star f-12 text-default"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Computer</td>
                                                    <td>#PHD002</td>
                                                    <td><a href="https://demo.dashboardpack.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="3655525576515b575f5a1855595b">[email&#160;protected]</a></td>
                                                    <td><label class="label label-success">In Stock</label></td>
                                                    <td>
                                                        <a href="#!"><i class="fa fa-star f-12 text-c-yellow"></i></a>
                                                        <a href="#!"><i class="fa fa-star f-12 text-c-yellow"></i></a>
                                                        <a href="#!"><i class="fa fa-star f-12 text-default"></i></a>
                                                        <a href="#!"><i class="fa fa-star f-12 text-default"></i></a>
                                                        <a href="#!"><i class="fa fa-star f-12 text-default"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Mobile</td>
                                                    <td>#PHD003</td>
                                                    <td><a href="https://demo.dashboardpack.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="45353437052228242c296b262a28">[email&#160;protected]</a></td>
                                                    <td><label class="label label-danger">Out Stock</label></td>
                                                    <td>
                                                        <a href="#!"><i class="fa fa-star f-12 text-c-yellow"></i></a>
                                                        <a href="#!"><i class="fa fa-star f-12 text-c-yellow"></i></a>
                                                        <a href="#!"><i class="fa fa-star f-12 text-c-yellow"></i></a>
                                                        <a href="#!"><i class="fa fa-star f-12 text-c-yellow"></i></a>
                                                        <a href="#!"><i class="fa fa-star f-12 text-default"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Coat</td>
                                                    <td>#PHD004</td>
                                                    <td><a href="https://demo.dashboardpack.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="4022233300272d21292c6e232f2d">[email&#160;protected]</a></td>
                                                    <td><label class="label label-success">In Stock</label></td>
                                                    <td>
                                                        <a href="#!"><i class="fa fa-star f-12 text-c-yellow"></i></a>
                                                        <a href="#!"><i class="fa fa-star f-12 text-c-yellow"></i></a>
                                                        <a href="#!"><i class="fa fa-star f-12 text-c-yellow"></i></a>
                                                        <a href="#!"><i class="fa fa-star f-12 text-default"></i></a>
                                                        <a href="#!"><i class="fa fa-star f-12 text-default"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Watch</td>
                                                    <td>#PHD005</td>
                                                    <td><a href="https://demo.dashboardpack.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="ccafa8af8caba1ada5a0e2afa3a1">[email&#160;protected]</a></td>
                                                    <td><label class="label label-success">In Stock</label></td>
                                                    <td>
                                                        <a href="#!"><i class="fa fa-star f-12 text-c-yellow"></i></a>
                                                        <a href="#!"><i class="fa fa-star f-12 text-c-yellow"></i></a>
                                                        <a href="#!"><i class="fa fa-star f-12 text-default"></i></a>
                                                        <a href="#!"><i class="fa fa-star f-12 text-default"></i></a>
                                                        <a href="#!"><i class="fa fa-star f-12 text-default"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Shoes</td>
                                                    <td>#PHD006</td>
                                                    <td><a href="https://demo.dashboardpack.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="a5d5d4d7e5c2c8c4ccc98bc6cac8">[email&#160;protected]</a></td>
                                                    <td><label class="label label-danger">Out Stock</label></td>
                                                    <td>
                                                        <a href="#!"><i class="fa fa-star f-12 text-c-yellow"></i></a>
                                                        <a href="#!"><i class="fa fa-star f-12 text-c-yellow"></i></a>
                                                        <a href="#!"><i class="fa fa-star f-12 text-c-yellow"></i></a>
                                                        <a href="#!"><i class="fa fa-star f-12 text-c-yellow"></i></a>
                                                        <a href="#!"><i class="fa fa-star f-12 text-default"></i></a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="styleSelector">
        </div>
    </div>
@endsection
@section('javascript')
<script>
    $(document).ready(function() {
        $(document).on('click', '.delete', function() {
            var href = $(this).data('href');
            swal({
                title: "",
                text: "{{__('Are you sure? Delete this FAQ!')}}",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-info",
                confirmButtonText: "{{__('Yes, delete it!')}}",
                cancelButtonText: "{{__('Cancel')}}",
                closeOnConfirm: true
            },
            function(){
                location.href = href;
            });
        });
    });

    window.onload = function () {
        //Reference the DropDownList.
        var ddlYearsfrom = document.getElementById("ddlYearsfrom");
        var ddlYearsto = document.getElementById("ddlYearsto");

 
        //Determine the Current Year.
        var currentYear = (new Date()).getFullYear();
 
        //Loop and add the Year values to DropDownList.
        for (var i = 1950; i <= currentYear; i++) {
            var option = document.createElement("OPTION");
            option.innerHTML = i;
            option.value = i;
            ddlYearsfrom.appendChild(option);
        }
        ddlYearsfrom.onchange = function() {
            for (var i = 1950; i <= currentYear; i++) {
                var option = document.createElement("OPTION");
                option.innerHTML = i;
                option.value = i;
                ddlYearsto.appendChild(option);
            }
        }
    };
</script>
@endsection