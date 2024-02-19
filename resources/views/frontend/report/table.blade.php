     <table id="complex-dt" class="table table-striped table-bordered nowrap">
            <thead>
                <tr>
                    <th >{{__('Level 1')}}</th>
                    <th >{{__('level 2')}}</th>
                    <th >{{__('Level 3')}}</th>
                    <th >{{__('Level-4')}}</th>
                    @foreach($yeardata as $year)
                        <th>{{ $year }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($scores as $score)
                 <tr>
                    <td>{{ $score->level_1 }}</td>
                    <td>{{ $score->level_2 }}</td>
                    <td>{{ $score->level_3 }}</td>
                    <td>{{ $score->level_4 }}</td>
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
            </tbody>
    </table>