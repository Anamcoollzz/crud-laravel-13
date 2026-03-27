@extends('layouts.app')

@section('title', 'Edit Kategori')
@section('page_title', 'Edit Kategori')

@section('content')
  <div class="mx-auto max-w-3xl rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
    <form action="{{ route('categories.update', $category) }}" method="POST" class="space-y-5">
      @method('PUT')
      @include('categories._form')
    </form>
  </div>
@endsection
