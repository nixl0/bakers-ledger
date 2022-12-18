@extends('base')

@props(['settlement'])

@section('title')

@endsection

@section('content')
    <p>{{$settlement->title}}</p>
@endsection
