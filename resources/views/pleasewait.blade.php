<div class="container">
    <style>
        .skeleton {
            height: 30px;
            background-color: #f0f0f0;
            border-radius: 4px;
            animation: pulse 1.5s infinite alternate;
        }

        @keyframes pulse {
            0% { opacity: 0.2; }
            100% { opacity: 1; }
        }
    </style>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                @php
                    $attLoad = [1,2,3,4,5,6,7,8,9,10];
                @endphp
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
                    @foreach ($attLoad as $data)
                        <tr>
                            <td width="10%"><div class="skeleton"></div></td>
                            <td width="10%"><div class="skeleton"></div></td>
                            <td width="10%"><div class="skeleton"></div></td>
                            <td width="10%"><div class="skeleton"></div></td>
                            <td width="10%"><div class="skeleton"></div></td>
                            <td width="30%"><div class="skeleton"></div></td>
                            <td width="10%"><div class="skeleton"></div></td>
                            <td width="10%"><div class="skeleton"></div></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
