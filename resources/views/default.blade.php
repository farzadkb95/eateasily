@extends('layouts.app')

@section('title', $_serverMeta['title'])
@section('info', $_serverMeta['info'])
@section('keys', $_serverMeta['keys'])
@section('image', $_serverMeta['image'])

@section('content')
    <main>
        <h1>{{ $_serverMeta['title'] }}</h1>
        <img src="{{ $_serverMeta['image'] }}" alt="{{ $_serverMeta['title'] }}" title="{{ $_serverMeta['title'] }}" />
        <p>{{ $_serverMeta['info'] }}</p>
    </main>
@endsection
