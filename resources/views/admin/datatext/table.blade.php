        
        <table id="ss-list" class="table  table-bordered nowrap">
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
                                                    <td>{{ $row['level_4'] }}

                                                     <a href="javascript:void(0);" class="info" data-information="<?php echo $row['level4information']; ?>" data-toggle="modal" data-target="#informationmodel"><i class="fa fa-info-circle text-primary" aria-hidden="true"></i></a>
                                                        </td>

                                                    <td>{!! $row['description'] !!}</td>
                                                    <td>

                                                    <a href="{{ route('datatext-edit', ['id' => $row['id']]) }}" rel="tooltip" class="btn text-light" style="background:#4099ff" title="Edit">
                                                            <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" data-href="{{ route('datatext-delete', ['id' => $row['id']]) }}" rel="tooltip" class="btn btn-danger delete" title="Delete">
                                                    <i class="fa fa-trash"></i>
                                                    </a></td>
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