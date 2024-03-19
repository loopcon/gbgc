        
        <table class="table table-bordered nowrap dashboard-table-responsive">
            <!-- <table id="multi-colum-dt" class="table table-striped table-bordered nowrap dataTable " role="grid" aria-describedby="multi-colum-dt_info"> -->
                                            <thead>
                                                <tr>
                                                   <?php /* <th>{{__('Sr No.')}}</th>
                                                    <th>{{__('View')}}</th>
                                                    <th>{{__('Region')}}</th> */ ?>
                                                    <th>{{__('Jurisdiction')}}</th>
                                                    <th>{{__('Level-1')}}</th>
                                                    <th>{{__('Level-2')}}</th>
                                                    <th>{{__('Level-3')}}</th>
                                                    <th>{{__('Level-4')}}</th>
                                                    <th>{{__('Description')}}</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                           @if(count($formattedData)>0)
                                           @foreach ($formattedData as $row)
                                                <tr>
                                                    <td>{{ $row['region_id'] }}</td>
                                                    <td>{{ $row['main_category'] }}</td>
                                                    <td>{{ $row['sub_category_1'] }}</td>
                                                    <td>{{ $row['sub_category_2'] }}</td>
                                                    <td>{{ $row['level_4'] }} </td>

                                                    <td>{!! $row['description'] !!}</td>
                                                   
                                                </tr>
                                             @endforeach
                                             @else
                                                <tr>
                                                    <td colspan="5">No Data Found<td>
                                                </tr>
                                            @endif
                                           
                                            </tbody>
         </table>
       
        <div id="paginate" onclick="handlePaginationClick(event)">
                {{ $dbdata->links() }}
        </div>