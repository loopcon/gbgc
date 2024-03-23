@extends('layouts.dashboardheader')
@section('title')
<title>GBGC - Dashboard</title>
@endsection
@section('content')
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
.bold{
    font-weight: bold;
}

  </style>
    <div class="page-header card">
        <div class="row align-items-end user-report-breadcum-main">
            <div class="col-12 col-md-6 col-lg-8">
                <div class="page-header-title user-breadcum-box">
                    <i class="feather icon-inbox bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Reports</h5>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="../index.html"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('adminindex')}}">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('adminreport')}}">Reports</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
                <div class="col-6 col-sm-4 col-md-4 col-xl-2">
                    <h3 class="sub-title">View</h3>
                    <label class="switch">
                        <input type="checkbox" id="togBtnview" checked>
                        <div class="slider round">
                        <!--ADDED HTML -->
                        <span class="on">Standard</span>
                        <span class="off">Local</span>
                        <!--END-->
                        </div>
                    </label>   
                </div>

                <div class="col-6 col-sm-4 col-md-4 col-xl-2">
                    <h3 class="sub-title">Currency</h3>
                    <label class="switch">
                        <input type="checkbox" id="togBtncurrency" checked>
                        <div class="slider round">
                        <!--ADDED HTML -->
                        <span class="on">USD</span>
                        <span class="off">LocalCurr</span>
                        <!--END-->
                        </div>
                    </label>   
                </div>

                <div class="col-12 col-sm-4 col-md-4 col-xl-2">
                    <h3 class="sub-title">Jurisdiction</h3>
                    <select class="js-example-basic col-sm-12 form-control"  id="country" placholder="Jurisdiction">
                    <option value="" hidden>{{__('Year From')}}</option>
                    </select>
                </div>

                <div class="col-12 col-sm-4 col-md-4 col-xl-2">
                    <h3 class="sub-title">Year From</h3>
                    <select class="form-control js-example col-sm-12" id="ddlYearsfrom" name="year">
                        <option value="">{{__('Year From')}}</option>
                    </select>
                </div>

                <div class="col-12 col-sm-4 col-md-4 col-xl-2">
                    <h3 class="sub-title">Year To</h3>
                    <select class="form-control js-example col-sm-12" id="ddlYearsto">
                        <option value="0" hidden>{{__('Year To')}}</option>
                    </select>
                </div>

                <div class="col-12 col-sm-6 col-md-4 col-xl-2">
                    <h3 class="user-reset-btn">Year To</h3>
                    <a href="{{route('frontreport')}}" class="btn btn-primary">Reset</a>
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
                                    
                                </div>
                               
                            <div class="card-block">
                                <div class="dt-responsive table-responsive">
                                <table id="order-table" class="table table-bordered nowrap dashboard-table-responsive">
                                <thead>
                                <tr>
                                <th>Level 1</th>
                                <th>Level 2</th>
                                <th>Level 3</th>
                                <th>Level 4</th>
                                <th class="bold">2007</th>
                                <th class="bold">2008</th>
                                <th class="bold">2009</th>
                                <th class="bold">2010</th>
                                <th class="bold">2011</th>
                                <th class="bold">2012</th>
                                <th class="bold">2013</th>
                                <th class="bold">2014</th>
                                <th class="bold">2015</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td rowspan="11" class="bold">Domestically Regulated</td>
                                        <td rowspan="11" class="bold">Remote</td>
                                        <td rowspan="4" class="bold">Lottery</td>
                                        <td>State</td>
                                        <td>2306.95</td>
                                        <td>2688.30</td>
                                        <td>2735.88</td>
                                        <td>2542.64</td>
                                        <td>2755.31</td>
                                        <td>2785.16</td>
                                        <td>2655.14</td>
                                        <td>2607.70</td>
                                        <td>2458.00</td>
                                    </tr>
                                     <tr>
                                        <td>Other</td>
                                        <td>3673.60</td>
                                        <td>3896.20</td>
                                        <td>4599.45</td>
                                        <td>4275.75</td>
                                        <td>3495.11</td>
                                        <td>2188.51</td>
                                        <td>1885.75</td>
                                        <td>1636.25</td>
                                        <td>1560.01</td>
                                    </tr>
                                     <tr>
                                        <td>Charity</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                     <tr>
                                        <th class="bold">Total Remote Lottery</th>
                                        <td class="bold">5980.55</td>
                                        <td class="bold">6584.50</td>
                                        <td class="bold">7335.52</td>
                                        <td class="bold">6818.38</td>
                                        <td class="bold">6250.42</td>
                                        <td class="bold">4973.67</td>
                                        <td class="bold">4540.89</td>
                                        <td class="bold">4243.94</td>
                                        <td class="bold">4018.04</td>
                                    </tr>
                                     <tr>
                                        <td rowspan="6" class="bold">Betting</td>
                                        
                                    </tr>
                                    <tr>
                                        <td>Horseracing</td>
                                        <td>825.00</td>
                                        <td>658.94</td>
                                        <td>569.21</td>
                                        <td>491.40</td>
                                        <td>393.23</td>
                                        <td>281.83</td>
                                        <td>226.23</td>
                                        <td>184.52</td>
                                        <td>166.00</td>
                                    </tr>
                                    <tr>
                                        <td>Greyhounds</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Sports & other event</td>
                                        <td>648.80</td>
                                        <td>786.26</td>
                                        <td>781.23</td>
                                        <td>819.84</td>
                                        <td>701.24</td>
                                        <td>532.27</td>
                                        <td>589.18</td>
                                        <td>580.55</td>
                                        <td>517.00</td>
                                    </tr>
                                    <tr>
                                        <td>Virtuals</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>3.00</td>
                                        <td>179.60</td>
                                        <td>171.90</td>
                                    </tr>
                                    <tr>
                                        <td class="bold">Total LB Betting</td>
                                        <td class="bold">1473.60</td>
                                        <td class="bold">1445.20</td>
                                        <td class="bold">1350.94</td>
                                        <td class="bold">1310.88</td>
                                        <td class="bold">1094.47</td>
                                        <td class="bold">814.10</td>
                                        <td class="bold">818.40</td>
                                        <td class="bold">944.67</td>
                                        <td class="bold">854.90</td>
                                    </tr>
                                     
                                     <tr>
                                         <td class="bold">Gaming</td>
                                         <td>Keno and numbers</td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td>740.15</td>
                                         <td>949.95</td>
                                         <td>1102.35</td>
                                         <td>1176.90</td>
                                     </tr>
                                </tbody>
                                </table>

                                <div class="mb-2 mt-3" style="float: inline-end;">
                                
                                <nav aria-label="...">
                                  <ul class="pagination">
                                    <li class="page-item pageremove"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item page"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item page"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item page"><a class="page-link" href="#">Next</a></li>
                                  </ul>
                                </nav>
                              <!--   <nav aria-label="Page navigation">
                                      <ul class="pagination">
                                        <li class="page-item pageremove"><a class="page-link" href="javascript:void(0)">1</a></li>
                                        <li class="page-item page"><a class="page-link" href="javascript:void(0)">2</a></li>
                                        <li class="page-item page"><a class="page-link" href="javascript:void(0)">3</a></li>
                                        <li class="page-item page"><a class="page-link" href="javascript:void(0)">Next</a></li>
                                      </ul>
                                </nav> -->
                                </div>

                                </div>
                                </div>
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
        <meta name="csrf-token" content="{{ csrf_token() }}" />
    </div>
<!-- Modal -->
<div class="modal fade" id="freetopromodel" tabindex="-1" role="dialog" aria-labelledby="scoreImportModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-lg">
        <div class="modal-content">

            <div class="modal-header">
              <h5 class="modal-title" id="sizeOptionModalLabel">Free to Pro</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
             <div class="row m-0">
                    <div class="col-12 col-md-12 p-0">
                        <div class="login-register-form-box">
                            <div>
                                <form method="post" id="freetoproform">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$customer->id}}">
                                    <div class="row mb-3">
                                        <div class="col-12 col-md-4 ">
                                            <div class="input-group">
                                                <input type="text" id="name" name="name" class="form-control" placeholder="Name" value="{{$customer->name}}">
                                            </div>
                                            <div id="nameerror"></div>
                                        </div>

                                        <div class="col-12 col-md-4">
                                            <div class="input-group">
                                                <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="{{$customer->email}}" readonly> 
                                            </div>
                                            <div id="emailerror"></div>
                                        </div> 

                                        <div class="col-12 col-md-4" >
                                            <div class="input-group">
                                                <input  class="form-control" maxlength="10"  type="text" oninput="this.value=this.value.replace(/[^0-9]/g,'');" placeholder="Phone Number" id="phone" name="phone" value="{{$customer->phone}}" readonly>
                                            </div> 
                                            <div id="phoneerror"></div>  
                                        </div>

                                    </div>

                                    <div class="row mb-3">
                                    
                                        <div class="col-12 col-md-6">
                                            <div class="input-group ">
                                                <input type="text" id="job_title" name="job_title"  class="form-control" placeholder="Job Title" value="{{$customer->job_title}}">
                                            </div>
                                            <div id="jobtitleerror"></div>
                                        </div>
                                     
                                        <div class="col-12 col-md-6">
                                            <div class="input-group">
                                                <input type="text" id="bussiness_name" name="bussiness_name" class="form-control" placeholder="Business Name" value="{{$customer->bussiness_name}}"> 
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-12 col-md-12">
                                            <div class="input-group">
                                                <input class="form-control" placeholder="If Your Business is Part of a Wider Group Please let us  Know" class="form-control" name="business_wider_group" value="{{$customer->business_wider_group}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-12 col-md-12">
                                            <div class="input-group">
                                                <textarea class="form-control" placeholder="Biling Address" class="form-control" name="billing_address" placeholder="Biling Address">{{$customer->billing_address}}</textarea> 
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                           <div class="col-12 col-md-12">
                                            <div class="input-group ">
                                                <input type="text" id="additional_user_no" name="additional_user_no"  class="form-control" placeholder="Number of Additional User" value="" oninput="this.value=this.value.replace(/[^0-9]/g,'');">
                                            </div>
                                            <div id="jobtitleerror"></div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-12 col-md-12">
                                            <div class="input-group">
                                                <textarea class="form-control"class="form-control" name="additional_details" placeholder="Is there is Anything You Require Additional on Your Invoice"></textarea> 
                                            </div>
                                        </div>
                                    </div>

                                    <div id="errormsg"></div>
                                    <button type="button" id="close-modal" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" id="save_freetopro">Submit</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
              </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('javascript')

<script>
  // Get all page items
  const pageItems = document.querySelectorAll('.page-item.page');

  // Add click event listener to each page item
  pageItems.forEach(item => {
    item.addEventListener('click', function(event) {
      event.preventDefault();

      // Remove 'active' class from all page items
      pageItems.forEach(item => {
        item.classList.remove('active');
      });
      
      // Add 'active' class to the clicked page item
      this.classList.add('active');
    });
  });
</script>




<script>
$(document).ready(function(){

    $(".page").click(function(){
       $("#order-table").css("filter", "blur(5px)");
    });
    
    $(".pageremove").click(function(){
       $("#order-table").css("filter", "blur(0px)");
    });

    // When any switch is clicked
    $(".switch input[type='checkbox']").click(function(e){
        // Prevent default behavior of the checkbox
        e.preventDefault();
        // Open the modal
        $("#freetopromodel").modal("show");
    });

    // When any select element is clicked
    $("select").click(function(e){
        // Prevent default behavior of the select element
        e.preventDefault();
        // Open the modal
        $("#freetopromodel").modal("show");
    });
});

   $(document).on('click','#save_freetopro',function(){
    var formdata=$('#freetoproform').serialize();
      $.ajax(
        {

          url:"{{route('registration-update')}}",
          type: "post",
          data: formdata,
          dataType:'JSON',
          success: function(data)
          {

           if (data.status == 1) 
            {
               window.location.href = "{{ route('checkout') }}";
               // setTimeout(function() {
               //     location.reload();
               // }, 4000);
            }
            
            if (data.status == 0) {
                $('#nameerrorshow, #jobtitleerrorshow, #emailerrorshow, #phoneerrorshow').hide();
                if(data.errors)
                {
                    if(data.errors.name){$('#nameerror').html('<strong id="nameerrorshow" style="color:red">'+ data.errors.name + '</strong>');}
                    if (data.errors.email) {$('#emailerror').html('<strong id="emailerrorshow" style="color:red">' + data.errors.email + '</strong>');}
                    if(data.errors.phone){$('#phoneerror').html('<strong id="phoneerrorshow" style="color:red">'+ data.errors.phone +'</strong>');}
                }
                if(data.errormsg)
                {
                    $('#errormsg').html('<strong id="errormsg" style="color:red">Something went Wrong Please Try again.</strong>');
                }
            }

          }
        });
  });

</script>


@endsection