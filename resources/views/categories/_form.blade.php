@csrf

<div>
  <label for="name" class="mb-2 block text-sm font-semibold text-slate-700">Nama Kategori</label>
  <input type="text" id="name" name="name" value="{{ old('name', $category->name ?? '') }}" required
    class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm outline-none transition focus:border-cyan-500 focus:ring-2 focus:ring-cyan-100">
  @error('name')
    <p class="mt-1 text-xs font-medium text-rose-600">{{ $message }}</p>
  @enderror
</div>

<div>
  <label for="description" class="mb-2 block text-sm font-semibold text-slate-700">Deskripsi</label>
  <textarea id="description" name="description" rows="4" class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm outline-none transition focus:border-cyan-500 focus:ring-2 focus:ring-cyan-100">{{ old('description', $category->description ?? '') }}</textarea>
  @error('description')
    <p class="mt-1 text-xs font-medium text-rose-600">{{ $message }}</p>
  @enderror
</div>

<div class="flex items-center gap-3 pt-2">
  <button type="submit" class="inline-flex cursor-pointer items-center rounded-lg bg-cyan-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-cyan-700">
    Simpan
  </button>
  <a href="{{ route('categories.index') }}" class="inline-flex items-center rounded-lg border border-slate-300 px-4 py-2 text-sm font-semibold text-slate-700 transition hover:border-cyan-400 hover:text-cyan-700">
    Batal
  </a>
</div>
