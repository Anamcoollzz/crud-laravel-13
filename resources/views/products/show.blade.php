@extends('layouts.app')

@section('title', 'Detail Produk')
@section('page_title', 'Detail Produk')

@section('content')
  <div class="mx-auto max-w-3xl rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
    <div class="grid gap-4 sm:grid-cols-2">
      <div class="rounded-xl bg-slate-50 p-4">
        <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">Nama</p>
        <p class="mt-1 text-sm font-semibold text-slate-900">{{ $product->name }}</p>
      </div>

      <div class="rounded-xl bg-slate-50 p-4">
        <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">Harga</p>
        <p class="mt-1 text-sm font-semibold text-slate-900">Rp {{ number_format($product->price, 2, ',', '.') }}</p>
      </div>

      <div class="rounded-xl bg-slate-50 p-4 sm:col-span-2">
        <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">Deskripsi</p>
        <p class="mt-1 text-sm text-slate-700">{{ $product->description ?: '-' }}</p>
      </div>

      <div class="rounded-xl bg-slate-50 p-4 sm:col-span-2">
        <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">Stok</p>
        <p class="mt-1 text-sm font-semibold text-slate-900">{{ $product->stock }}</p>
      </div>
    </div>

    <div class="mt-6 flex items-center gap-3">
      <a href="{{ route('products.index') }}"
        class="inline-flex items-center rounded-lg border border-slate-300 px-4 py-2 text-sm font-semibold text-slate-700 transition hover:border-cyan-400 hover:text-cyan-700">Kembali</a>
      <a href="{{ route('products.edit', $product) }}" class="inline-flex items-center rounded-lg bg-amber-500 px-4 py-2 text-sm font-semibold text-white transition hover:bg-amber-600">Edit</a>
    </div>
  </div>
@endsection
