@extends('layouts.app')

@section('title', 'Daftar Kategori')
@section('page_title', 'Daftar Kategori')

@section('content')
  <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
    <div class="mb-5 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
      <h2 class="text-lg font-semibold text-slate-900">Semua Kategori</h2>
      <a href="{{ route('categories.create') }}" class="inline-flex items-center justify-center rounded-lg bg-cyan-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-cyan-700">
        + Tambah Kategori
      </a>
    </div>

    @if (session('success'))
      <div class="mb-5 rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-700">
        {{ session('success') }}
      </div>
    @endif

    @if (session('error'))
      <div class="mb-5 rounded-lg border border-rose-200 bg-rose-50 px-4 py-3 text-sm font-medium text-rose-700">
        {{ session('error') }}
      </div>
    @endif

    <div class="overflow-x-auto">
      <table class="min-w-full border-separate border-spacing-0 text-sm">
        <thead>
          <tr>
            <th class="border-b border-slate-200 bg-slate-50 px-4 py-3 text-left font-semibold text-slate-700">Nama</th>
            <th class="border-b border-slate-200 bg-slate-50 px-4 py-3 text-left font-semibold text-slate-700">Deskripsi</th>
            <th class="border-b border-slate-200 bg-slate-50 px-4 py-3 text-left font-semibold text-slate-700">Total Produk</th>
            <th class="border-b border-slate-200 bg-slate-50 px-4 py-3 text-left font-semibold text-slate-700">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($categories as $category)
            <tr class="hover:bg-slate-50/70">
              <td class="border-b border-slate-100 px-4 py-3 font-medium text-slate-900">{{ $category->name }}</td>
              <td class="border-b border-slate-100 px-4 py-3 text-slate-600">{{ $category->description ?: '-' }}</td>
              <td class="border-b border-slate-100 px-4 py-3">{{ $category->products_count }}</td>
              <td class="border-b border-slate-100 px-4 py-3">
                <div class="flex flex-wrap items-center gap-3">
                  <a href="{{ route('categories.show', $category) }}" class="font-medium text-cyan-700 hover:text-cyan-800">Detail</a>
                  <a href="{{ route('categories.edit', $category) }}" class="font-medium text-amber-700 hover:text-amber-800">Edit</a>
                  <form action="{{ route('categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="cursor-pointer font-medium text-rose-700 hover:text-rose-800">Hapus</button>
                  </form>
                </div>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="4" class="px-4 py-8 text-center text-slate-500">Belum ada data kategori.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <div class="mt-5">
      {{ $categories->links() }}
    </div>
  </div>
@endsection
