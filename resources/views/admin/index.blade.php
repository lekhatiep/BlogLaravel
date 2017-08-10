@extends('admin.layouts.master')
@section('head.title')
Quản lý user
@stop
@section('page.title')
Page Admin
@stop
@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection
@section('body.content')
   Nothing....
@stop