@if (@session('user_type')==='admin')
    {{view('index')}}
    {{-- @if(@session()->has('message'))
        {{session('message')}}
    @endif --}}
@endif



