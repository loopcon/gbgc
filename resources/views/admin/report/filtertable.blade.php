@if(count($yeardata) > 0)
<table class="table table-bordered dashboard-table-responsive ">
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
                    <td style="border-bottom:0px;text-wrap: balance;"  >{{ $value }}</td>
                @elseif($key === 3)
                <td style="border-bottom:0px;text-wrap: balance;"  >{{ $value }}</td>
                @else
                    <td>{{ $value }}</td>
                @endif
                    
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
@else
<label style="font-weight:bold; text-align: center;">Data Not Found</label>
@endif
@section('javascript')
<script type="text/javascript">
    $(document).ready(function() {
         $('tr:has(td:contains("Total")) td').css('font-weight', 'bold');
        $('td:empty').css({'border-top': '0px', 'border-bottom': '0px'});
    });

</script>

@endsection