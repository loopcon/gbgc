@if(count($yeardata) > 0)
<table class="table table-bordered">
    <thead>
        <tr>
            <th>{{__('Level 1')}}</th>
            <th>{{__('level 2')}}</th>
            <th>{{__('Level 3')}}</th>
            <th>{{__('Level-4')}}</th>
            @foreach($yeardata as $year)
                <th class="bold">{{ $year }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
          @foreach($exportData as $row)
            <tr>
                @foreach($row as $key => $value)
                @if($key === 0 || $key === 1 || $key === 2)
                    <td style="border-bottom:0px;text-wrap: balance;">{{ $value }}</td>
                @elseif($key === 3)
                  @php
                    // Separate the title and information from $value
                    $explodedValue = explode(' - ', $value);
                    $title = $explodedValue[0] ?? ''; // Get the first element or an empty string if not found
                    $information = $explodedValue[1] ?? ''; // Get the second element or an empty string if not found
                @endphp
                <td style="border-bottom:0px;text-wrap: balance;">{{ $title }}
                    @if($value !== 'Total')
                    <a href="javascript:void(0);" class="info" data-information="{{ $information }}" data-toggle="modal" data-target="#informationmodel"><i class="fa fa-info-circle text-primary" aria-hidden="true"></i></a>
                    @endif
                </td>
                @else
                    <td> {{ $value }}</td>
                @endif
                    
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
@else
<div style="text-align:center;">
<img src="{{asset('nodata.png')}}">
</div>
@endif
@section('javascript')
<script type="text/javascript">
    $(document).ready(function() {
         $('tr:has(td:contains("Total")) td').css('font-weight', 'bold');
        $('td:empty').css({'border-top': '0px', 'border-bottom': '0px'});
    });

</script>

@endsection