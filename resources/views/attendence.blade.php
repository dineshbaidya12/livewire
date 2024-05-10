@extends('layouts.base')

@section('content')
    <div>
        {{-- @livewire('attendence', lazy ,['key' => 'attendence']) --}}
        <livewire:attendence lazy />
     </div>
@endsection

