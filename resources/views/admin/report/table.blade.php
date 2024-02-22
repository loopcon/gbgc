 <div class="table-container">
<table class="table table-bordered nowrap">
    <thead>
        <tr>
            <th>{{__('Level 1')}}</th>
            <th>{{__('level 2')}}</th>
            <th>{{__('Level 3')}}</th>
            <th>{{__('Level-4')}}</th>
            @foreach($yeardata as $year)
                <th>{{ $year }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @php
            $prevLevel1 = null;
            $prevLevel2 = null;
            $prevLevel3 = null;
            $rowCountLevel1 = 0;
            $rowCountLevel2 = 0;
            $rowCountLevel3 = 0;
            $totalLevel3 = [];
        @endphp
        
        @foreach($scores as $index => $score)
            <!-- Check if Level 1 value changed -->
            @if($prevLevel1 != $score->level_1)
                @php 
                    $rowCountLevel1 = $scores->where('level_1', $score->level_1)->count(); 
                    $prevLevel1 = $score->level_1; 
                @endphp
            @endif

            <!-- Check if Level 2 value changed -->
            @if($prevLevel2 != $score->level_2)
                @php 
                    $rowCountLevel2 = $scores->where('level_1', $score->level_1)
                                              ->where('level_2', $score->level_2)
                                              ->count(); 
                    $prevLevel2 = $score->level_2; 
                @endphp
            @endif

            <!-- Check if Level 3 value changed -->
            @if($prevLevel3 != $score->level_3)
                @if($prevLevel3 !== null)
                    <!-- Total row for level 3 -->
                    <tr>
                        <td colspan="3"></td>
                        <td>Total</td>
                        <!-- Calculate yearly total scores for level 3 -->
                        @foreach($yeardata as $year)
                            @php
                                $yearlyTotalScore = $totalLevel3[$prevLevel3][$year] ?? 0; // Get total score for the year
                            @endphp
                            <td>{{ $yearlyTotalScore }}</td>
                        @endforeach
                    </tr>
                @endif
                
                <!-- Update previous Level 3 value -->
                @php 
                    $prevLevel3 = $score->level_3; 
                    $rowCountLevel3 = $scores->where('level_1', $score->level_1)
                                              ->where('level_2', $score->level_2)
                                              ->where('level_3', $score->level_3)
                                              ->count(); 
                @endphp
            @endif

            <!-- Update total scores for the current group of level 3 -->
            @foreach($yeardata as $year)
                @php
                    $yearlyScore = App\Models\Score::where(['view' => 'Standard'])
                                                    ->where(['currency_id' => 'USD'])
                                                    ->where('year', $year)
                                                    ->where('level_1', $score->level_1)
                                                    ->where('level_2', $score->level_2)
                                                    ->where('level_3', $score->level_3)
                                                    ->where('level_4', $score->level_4)
                                                    ->max('score');
                    
                    // Accumulate yearly score for the group of level 3
                    $totalLevel3[$score->level_3][$year] = ($totalLevel3[$score->level_3][$year] ?? 0) + $yearlyScore;
                @endphp
            @endforeach

            <!-- Display individual row -->
            <tr>
                <!-- Display Level 1 -->
                
                    <td rowspan="">
                        {{ optional($score->maincategoryDetail)->title }}
                    </td>
                      <td rowspan="">
                        {{ optional($score->subcategory1Detail)->title }}
                    </td>
                      <td rowspan="">
                        {{ optional($score->subcategory2Detail)->title }}
                    </td>
                
                <!-- Display level 4 value -->
                <td>
                    @if($score->level4Detail !== null)
                        {{ $score->level4Detail->title }}
                        <a href="javascript:void(0);" class="info" data-information="{{$score->level4Detail->information}}" data-toggle="modal" data-target="#informationmodel"><i class="fa fa-info-circle text-primary" aria-hidden="true"></i></a>
                    @else
                        Not Found
                    @endif
                </td>

                <!-- Display yearly scores -->
                @foreach($yeardata as $year)
                    @php
                        $yearlyScore = App\Models\Score::where(['view' => 'Standard'])
                                                        ->where(['currency_id' => 'USD'])
                                                        ->where('year', $year)
                                                        ->where('level_1', $score->level_1)
                                                        ->where('level_2', $score->level_2)
                                                        ->where('level_3', $score->level_3)
                                                        ->where('level_4', $score->level_4)
                                                        ->max('score');
                    @endphp
                    <td>{{ $yearlyScore }}</td>
                @endforeach
            </tr>
        @endforeach

        <!-- Total row for the last group of level 3 -->
        @if($prevLevel3 !== null)
            <tr>
                <td colspan="3"></td>
                <td>Total</td>
                <!-- Calculate yearly total scores for level 3 -->
                @foreach($yeardata as $year)
                    @php
                        $yearlyTotalScore = $totalLevel3[$prevLevel3][$year] ?? 0; // Get total score for the year
                    @endphp
                    <td>{{ $yearlyTotalScore }}</td>
                @endforeach
            </tr>
        @endif
    </tbody>
</table>
</div>

@if($scores->lastPage() > 1)
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-end">
            @for ($i = 1; $i <= $scores->lastPage(); $i++)
                <li class="page-item {{ $i == $scores->currentPage() ? 'active' : '' }}">
                    <a class="page-link" href="#" onclick="paginate({{ $i }})">{{ $i }}</a>
                </li>
            @endfor
        </ul>
    </nav>
@endif
