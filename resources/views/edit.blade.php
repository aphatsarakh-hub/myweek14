@extends('layouts.app')

@section('title', 'แก้ไขบทความ')

@section('content')
<div class="container py-4" style="max-width: 1100px;">
    <h2 class="text-center fw-bold mb-4">แก้ไขบทความ</h2>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form action="{{ route('author.update', $blog->id) }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label fw-bold">ชื่อบทความ</label>
            <input type="text" id="title" name="title" 
                   class="form-control @error('title') is-invalid @enderror" 
                   value="{{ old('title', $blog->title) }}">
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="content" class="form-label fw-bold">เนื้อหา</label>
            <textarea id="content" name="content" 
                      class="form-control @error('content') is-invalid @enderror">{{ old('content', $blog->content) }}</textarea>
            @error('content')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary px-3 py-2">
                บันทึก
            </button>
            <a href="{{ route('author.blog2') }}" class="btn btn-secondary px-3 py-2">
                บทความทั้งหมด
            </a>
        </div>
    </form>
</div>
@endsection