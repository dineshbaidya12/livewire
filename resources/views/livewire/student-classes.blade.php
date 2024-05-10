<div>
    <div class="row">
        <h5>Drag and drop students to change their class <button x-on:dblclick="$wire.doubleClick()" class="btn btn-warning">Double Click</button> </h5>
        
       

        <div class="col-3" ondrop="drop(event, 5)" ondragover="allowDrop(event)">
            <p style="background:#e6e6e6;">Class 5</p>
            <div class="inner-div" id="class5" ondrop="drop(event)" ondragover="allowDrop(event)">
                @foreach ($allstudents as $student)
                    @if ($student->class == '5')
                        <div class="floating-div" draggable="true" ondragstart="drag(event)" id="{{$student->id}}">
                            <p draggable="false">{{ $student->name }} <br> {{$student->email}}</p>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="col-3" ondrop="drop(event, 6)" ondragover="allowDrop(event)">
            <p style="background:#e6e6e6;">Class 6</p>
            <div class="inner-div" id="class6" ondrop="drop(event)" ondragover="allowDrop(event)">
                
                @foreach ($allstudents as $student)
                    @if ($student->class == '6')
                        <div class="floating-div" draggable="true" ondragstart="drag(event)" id="{{$student->id}}">
                            <p draggable="false">{{ $student->name }} <br> {{$student->email}}</p>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        <div class="col-3" ondrop="drop(event, 7)" ondragover="allowDrop(event)">
            <p style="background:#e6e6e6;">Class 7</p>
            <div class="inner-div" id="class7" ondrop="drop(event)" ondragover="allowDrop(event)">
                @foreach ($allstudents as $student)
                    @if ($student->class == '7')
                        <div class="floating-div" draggable="true" ondragstart="drag(event)" id="{{$student->id}}">
                            <p draggable="false">{{ $student->name }} <br> {{$student->email}}</p>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="col-3" ondrop="drop(event, 8)" ondragover="allowDrop(event)">
            <p style="background:#e6e6e6;">Class 8</p>
            <div class="inner-div" id="class8" ondrop="drop(event)" ondragover="allowDrop(event)">
                @foreach ($allstudents as $student)
                    @if ($student->class == '8')
                        <div class="floating-div" draggable="true" ondragstart="drag(event)" id="{{$student->id}}">
                            <p draggable="false">{{ $student->name }} <br> {{$student->email}}</p>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    <style>
        .main{
            position: fixed;
            top: 0;
            right: 0;
            height: 100vh;
            width: 100vw;
            background: rgba(0, 0, 0, 0.384);
            z-index: 100;
            transform: translateX(100%);
            transition: .5s ease-in-out;
        }
        .inner{
            height: 100%;
            width: 70%;
            float: right;
            background: white;
            height: 100%;
            width: 70%;
            float: right;
            background: white;
            padding: 50px;
            font-size: 17px;
        }
        .main.right-to-left{
            transform: translateX(0);
        }
    </style>
    
    <div class="main {{$show_sudent_details == true ? 'right-to-left' : '' }}" id="main">
        <div class="inner">
            <button class="btn btn-warning go-back" wire:click="$set('show_sudent_details', false)">Back</button><br>
            Name : {{$student_name}}<br>
            Email : {{$student_email}}<br>
            Class : {{$student_class}}<br>
            Roll : {{$roll}}<br>
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Perspiciatis neque possimus aut culpa alias quaerat minus temporibus quidem, consequuntur, molestiae tempore! Architecto aperiam dignissimos necessitatibus. Vitae, assumenda quo? Vel, inventore.
            <br>
            <button wire:click="download({{$student_id}})" class="btn btn-success mt-1">Download Student Data</button>
        </div>
    </div>

</div>