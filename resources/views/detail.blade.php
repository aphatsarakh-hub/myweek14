<!-- resources/views/detail.blade.php -->
@extends('layouts.app')

@section('title')
    {{$blog->title}}
@endsection

@section('content')
<div class="container py-4" style="max-width: 1100px;">
    <h1 class="fw-bold mb-3">{{$blog->title}}</h1>
    <hr>
    <div class="blog-content mt-4" style="line-height: 1.8; font-size: 1.05rem;">
        {!! $blog->content !!}
    </div>
</div>
@endsection