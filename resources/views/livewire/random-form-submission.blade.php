<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                @if (count($formData) > 0)
                <thead>
                    <tr>
                        <th>Text Input</th>
                        <th>Email Input</th>
                        <th>URL Input</th>
                        <th>Number Input</th>
                        <th>Select Input</th>
                        <th>Checkbox 1</th>
                        <th>Checkbox 2</th>
                        <th>Radio Input</th>
                        <th>File Input</th>
                        <th>Password Input</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($formData as $data)
                        <tr>
                            <td>{{$data->text}}</td>
                            <td>{{$data->email}}</td>
                            <td>{{$data->url}}</td>
                            <td>{{$data->numberInput}}</td>
                            <td>{{$data->select}}</td>
                            <td>{{$data->checkbox1 == 1 ? 'checked' : 'not checked'}}</td>
                            <td>{{$data->checkbox2 == 1 ? 'checked' : 'not checked'}}</td>
                            <td>{{$data->radio}}</td>
                            <td><img style="height:50px; width:50px; object-fit:cover;" src="{{ asset('uploads/'.$data->file)}}" alt=""></td>
                            <td>{{$data->password}}</td>
                            <td><button wire:click="deleteSubmission({{$data->id}})" class="btn btn-danger">Delete</button></td>
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
    <div class="pagination justify-content-center">
        {{ $formData->links() }}
    </div>
</div>
