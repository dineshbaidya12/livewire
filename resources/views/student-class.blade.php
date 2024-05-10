@extends('layouts.base')

@section('content')
<style>
    .floating-div{
        margin-bottom: 20px;
        background: #f0f0f0;
        cursor: pointer;
        user-select: none;
    }

    .col-3{
        min-height: 90vh; 
    }
</style>
    <div>
        @livewire('studentClasses', ['key' => 'studentClasses'])
     </div>
    <script>
        $('.go-back').on('click', function(){
            document.querySelector('.main').classList.remove('right-to-left');
        });
        
        $(document).on('click','.floating-div', function(){
            Livewire.dispatch('get_student_details', [$(this).attr('id')]);
        });

        function allowDrop(event) {
            event.preventDefault();
        }
    
        function drag(event) {
            event.dataTransfer.setData("text", event.target.id);
        }
    
        function drop(event, classId) {
            event.preventDefault();
            var studentId = event.dataTransfer.getData("text");
            if (classId != null && studentId != null) {
                Livewire.dispatch('updateStudentClass', [studentId+'_'+classId]);
                event.target.appendChild(document.getElementById(studentId));
            }
        }

        Livewire.on('alert', (data) => {
            Swal.fire({
                title: data[0].title,
                text: data[0].message,
                icon: data[0].icon
            });
        });
    </script>
@endsection

