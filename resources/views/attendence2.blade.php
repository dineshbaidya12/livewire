@extends('layouts.base')

@section('content')
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        @if (count($attendence) > 0)
                        <thead>
                            <tr>
                                <th width="10%">Event Id</th>
                                <th width="10%">Event Date Id</th>
                                <th width="10%">User Id</th>
                                <th width="10%">Attended</th>
                                <th width="10%">Group Id</th>
                                <th width="30%">Remark</th>
                                <th width="10%">Coming From</th>
                                <th width="10%">Updated At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($attendence as $data)
                                <tr>
                                    <td width="10%">{{$data->event_id }}</td>
                                    <td width="10%">{{$data->event_date_id }}</td>
                                    <td width="10%">{{$data->user_id }}</td>
                                    <td width="10%">{{$data->attended }}</td>
                                    <td width="10%">{{$data->group_id }}</td>
                                    <td width="30%">{{$data->remark }}</td>
                                    <td width="10%">{{$data->coming_from }}</td>
                                    <td width="10%">{{$data->updated_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        @else
                        <tbody>
                            <tr>
                                <td align="center" colspan="10">No data found</td>
                            </tr>
                        </tbody>
                        @endif
                    </table>
                </div>
            </div>
        </div>
     </div>
@endsection

