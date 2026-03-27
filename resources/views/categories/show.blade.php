@extends('layouts.app')

@section('title', 'Detail Kategori')
@section('page_title', 'Detail Kategori')

@section('content')
  <div class="mx-auto max-w-4xl space-y-6">
    <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
      <div class="grid gap-4 sm:grid-cols-2">
        <div class="rounded-xl bg-slate-50 p-4">
          <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">Nama</p>
          <p class="mt-1 text-sm font-semibold text-slate-900">{{ $category->name }}</p>
        </div>

        <div class="rounded-xl bg-slate-50 p-4">
          <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">Total Produk</p>
          <p class="mt-1 text-sm font-semibold text-slate-900">{{ $category->products->count() }}</p>
        </div>

        <div class="rounded-xl bg-slate-50 p-4 sm:col-span-2">
          <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">Deskripsi</p>
          <p class="mt-1 text-sm text-slate-700">{{ $category->description ?: '-' }}</p>
        </div>
      </div>

      <div class="mt-6 flex items-center gap-3">
        <a href="{{ route('categories.index') }}" class="inline-flex items-center rounded-lg border border-slate-300 px-4 py-2 text-sm font-semibold text-slate-700 transition hover:border-cyan-400 hover:text-cyan-700">Kembali</a>
        <a href="{{ route('categories.edit', $category) }}" class="inline-flex items-center rounded-lg bg-amber-500 px-4 py-2 text-sm font-semibold text-white transition hover:bg-amber-600">Edit</a>
      </div>
    </div>

    <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
      <h2 class="mb-4 text-lg font-semibold text-slate-900">Produk Pada Kategori Ini</h2>
      <div class="overflow-x-auto">
        <table class="min-w-full border-separate border-spacing-0 text-sm">
          <thead>
            <tr>
              <th class="border-b border-slate-200 bg-slate-50 px-4 py-3 text-left font-semibold text-slate-700">Nama Produk</th>
              <th class="border-b border-slate-200 bg-slate-50 px-4 py-3 text-left font-semibold text-slate-700">Harga</th>
              <th class="border-b border-slate-200 bg-slate-50 px-4 py-3 text-left font-semibold text-slate-700">Stok</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($category->products as $product)
              <tr class="hover:bg-slate-50/70">
                <td class="border-b border-slate-100 px-4 py-3">{{ $product->name }}</td>
                <td class="border-b border-slate-100 px-4 py-3">Rp {{ number_format($product->price, 2, ',', '.') }}</td>
                <td class="border-b border-slate-100 px-4 py-3">{{ $product->stock }}</td>
              </tr>
            @empty
              <tr>
                <td colspan="3" class="px-4 py-8 text-center text-slate-500">Belum ada produk pada kategori ini.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
