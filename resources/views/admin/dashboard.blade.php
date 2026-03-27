@extends('layouts.app')

@section('title', 'Dashboard Admin')
@section('page_title', 'Dashboard Admin')

@section('content')
  <div class="space-y-6">
    <div class="grid gap-4 sm:grid-cols-2">
      <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
        <p class="text-sm font-medium text-slate-500">Total Produk</p>
        <p class="mt-2 text-3xl font-bold text-slate-900">{{ $totalProducts }}</p>
        <a href="{{ route('products.index') }}" class="mt-4 inline-flex text-sm font-semibold text-cyan-700 hover:text-cyan-800">Lihat modul produk</a>
      </div>

      <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
        <p class="text-sm font-medium text-slate-500">Total Kategori</p>
        <p class="mt-2 text-3xl font-bold text-slate-900">{{ $totalCategories }}</p>
        <a href="{{ route('categories.index') }}" class="mt-4 inline-flex text-sm font-semibold text-cyan-700 hover:text-cyan-800">Lihat modul kategori</a>
      </div>
    </div>

    <div class="grid gap-6 xl:grid-cols-2">
      <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
        <div class="mb-4 flex items-center justify-between">
          <h3 class="text-base font-semibold text-slate-900">Produk Terbaru</h3>
          <a href="{{ route('products.index') }}" class="text-sm font-semibold text-cyan-700 hover:text-cyan-800">Lihat semua</a>
        </div>
        <div class="overflow-x-auto">
          <table class="min-w-full border-separate border-spacing-0 text-sm">
            <thead>
              <tr>
                <th class="border-b border-slate-200 bg-slate-50 px-3 py-2 text-left font-semibold text-slate-700">Nama</th>
                <th class="border-b border-slate-200 bg-slate-50 px-3 py-2 text-left font-semibold text-slate-700">Kategori</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($latestProducts as $product)
                <tr>
                  <td class="border-b border-slate-100 px-3 py-2">{{ $product->name }}</td>
                  <td class="border-b border-slate-100 px-3 py-2 text-slate-600">{{ $product->category?->name ?: '-' }}</td>
                </tr>
              @empty
                <tr>
                  <td colspan="2" class="px-3 py-6 text-center text-slate-500">Belum ada produk.</td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>

      <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
        <div class="mb-4 flex items-center justify-between">
          <h3 class="text-base font-semibold text-slate-900">Kategori Terbaru</h3>
          <a href="{{ route('categories.index') }}" class="text-sm font-semibold text-cyan-700 hover:text-cyan-800">Lihat semua</a>
        </div>
        <div class="overflow-x-auto">
          <table class="min-w-full border-separate border-spacing-0 text-sm">
            <thead>
              <tr>
                <th class="border-b border-slate-200 bg-slate-50 px-3 py-2 text-left font-semibold text-slate-700">Nama</th>
                <th class="border-b border-slate-200 bg-slate-50 px-3 py-2 text-left font-semibold text-slate-700">Deskripsi</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($latestCategories as $category)
                <tr>
                  <td class="border-b border-slate-100 px-3 py-2">{{ $category->name }}</td>
                  <td class="border-b border-slate-100 px-3 py-2 text-slate-600">{{ $category->description ?: '-' }}</td>
                </tr>
              @empty
                <tr>
                  <td colspan="2" class="px-3 py-6 text-center text-slate-500">Belum ada kategori.</td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
