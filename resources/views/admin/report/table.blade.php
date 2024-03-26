@if(count($yeardata) > 0)
<table class="table table-bordered report-table-responsive report-scorly">
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
                    <td style="border-bottom:0px;">{{ $value }}</td>
                @else
                    <td>{{ $value }}</td>
                @endif
                    
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
@endif