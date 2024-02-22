<table class="table table-bordered nowrap">
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
        @php
            $prevLevel1 = null;
            $prevLevel2 = null;
            $prevLevel3 = null;
            $prevLevel4 = null;
            $rowCountLevel1 = 0; // Initialize count for rows with the same level 1 value
            $rowCountLevel2 = 0; // Initialize count for rows with the same level 2 value
            $rowCountLevel3 = 0; // Initialize count for rows with the same level 3 value
        @endphp
        
        @foreach($scores as $index => $score)
            <!-- Check if level 1 value has changed -->
            @if($prevLevel1 != $score->level_1)
                @php
                    $rowCountLevel1 = 1;
                    // Reset rowCountLevel2, rowCountLevel3, and rowCountLevel4 when level 1 changes
                    $rowCountLevel2 = 1;
                    $rowCountLevel3 = 1;
                    $rowCountLevel4 = 1;
                @endphp
            @endif

            <!-- Check if level 2 value has changed -->
            @if($prevLevel2 != $score->level_2)
                @php
                    // Reset rowCountLevel2, rowCountLevel3, and rowCountLevel4 when level 2 changes
                    $rowCountLevel2 = 1;
                    $rowCountLevel3 = 1;
                    $rowCountLevel4 = 1;
                @endphp
            @endif
            
            <!-- Check if level 3 value has changed -->
            @if($prevLevel3 != $score->level_3)
                @if($prevLevel3 !== null)
                    <!-- Total row for previous section -->
                    <tr>
                        <td style="border-top:0px; border-bottom: 0px;"></td>
                        <td style="border-top:0px; border-bottom: 0px;"></td>
                        <td style="border-top:0px; border-bottom: 0px;"></td>
                        <td class="bold">Total</td>
                        <!-- Calculate yearly total scores for the previous section -->
                        @foreach($yeardata as $year)
                            @php
                                $yearlyTotalScore = App\Models\Score::where(['view' => 'Standard'])
                                                                    ->where(['currency_id' => 'USD'])
                                                                    ->where('year', $year)
                                                                    ->where('level_1', $prevLevel1)
                                                                    ->where('level_2', $prevLevel2)
                                                                    ->where('level_3', $prevLevel3)
                                                                    ->sum('score');
                            @endphp
                            <td class="bold">{{ $yearlyTotalScore }}</td>
                        @endforeach
                    </tr>
                @endif
                @php
                    // Reset rowCountLevel3 and rowCountLevel4 when level 3 changes
                    $rowCountLevel3 = 1;
                    $rowCountLevel4 = 1;
                @endphp
            @endif
            
            <!-- Check if level 4 value has changed -->
            @if($prevLevel4 != $score->level_4)
                @php
                    // Reset rowCountLevel4 when level 4 changes
                    $rowCountLevel4 = 1;
                @endphp
            @endif
            
            <!-- Update previous levels -->
            @php
                $prevLevel1 = $score->level_1;
                $prevLevel2 = $score->level_2;
                $prevLevel3 = $score->level_3;
                $prevLevel4 = $score->level_4;
            @endphp

            <tr>
                    <!-- Display level 1 value only for the first occurrence -->
                
                    @if ($rowCountLevel1 == 1)
                    <td class="bold" style="border-bottom: 0px;">{{ optional($score->maincategoryDetail)->title }}</td>
                    @else
                    <td style="border-top:0px; border-bottom: 0px;"></td>
                    @endif
                
        
                    <!-- Display level 2 value only for the first occurrence -->
                
                    @if ($rowCountLevel2 == 1)
                    <td class="bold" style="border-bottom: 0px;">  {{ optional($score->subcategory1Detail)->title }}</td>
                    @else
                    <td style="border-top:0px; border-bottom: 0px;"></td>
                    @endif
                
                
                    <!-- Display level 3 value only for the first occurrence -->
                    @if ($rowCountLevel3 == 1)
                    <td class="bold" style="border-bottom: 0px;">{{ optional($score->subcategory2Detail)->title }}</td>
                    @else
                    <td style="border-top:0px; border-bottom: 0px;"></td>
                    @endif
                
                <!-- Display level 4 value for all rows -->
                <td>
                    @if($score->level_4 !== null)
                        {{ $score->level4Detail->title }}
                        <a href="javascript:void(0);" class="info" data-information="{{$score->level4Detail->information}}" data-toggle="modal" data-target="#informationmodel"><i class="fa fa-info-circle text-primary" aria-hidden="true"></i></a>
                    @else
                        Not Found
                    @endif
                </td>

                <!-- Calculate and display yearly scores -->
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

            <!-- Increment row count for each level -->
            @php
                $rowCountLevel1++;
                $rowCountLevel2++;
                $rowCountLevel3++;
                $rowCountLevel4++;
            @endphp
        @endforeach

        <!-- Total row for the last section -->
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td class="bold">Total</td>
            <!-- Calculate yearly total scores for the last section -->
            @foreach($yeardata as $year)
                @php
                    $yearlyTotalScore = App\Models\Score::where(['view' => 'Standard'])
                                                        ->where(['currency_id' => 'USD'])
                                                        ->where('year', $year)
                                                        ->where('level_1', $prevLevel1)
                                                        ->where('level_2', $prevLevel2)
                                                        ->where('level_3', $prevLevel3)
                                                        ->sum('score');
                @endphp
                <td class="bold">{{ $yearlyTotalScore }}</td>
            @endforeach
        </tr>
    </tbody>
</table>
