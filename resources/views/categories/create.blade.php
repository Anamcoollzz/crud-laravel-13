@extends('layouts.app')

@section('title', 'Tambah Kategori')
@section('page_title', 'Tambah Kategori')

@section('content')
  <div class="mx-auto max-w-3xl rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
    <form action="{{ route('categories.store') }}" method="POST" class="space-y-5">
      @include('categories._form')
    </form>
  </div>
@endsection
