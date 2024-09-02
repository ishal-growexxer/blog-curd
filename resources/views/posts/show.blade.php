@dd($post)
@section('title', $post->title)
@extends('layouts.layouts')

@section('content')

@include('partials.summary')

@endsection