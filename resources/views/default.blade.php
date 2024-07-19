@extends('layouts.app')

@section('title', $_serverMeta['title'])
@section('info', $_serverMeta['info'])
@section('keys', $_serverMeta['keys'])
@section('image', $_serverMeta['image'])

@section('content')
    <main>
        <h1>{{ $_serverMeta['title'] }}</h1>
    </main>
@endsection
