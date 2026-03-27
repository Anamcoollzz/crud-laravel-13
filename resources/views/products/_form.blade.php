@csrf

<div style="margin-bottom: 12px;">
    <label for="name" style="display:block; margin-bottom: 6px; font-weight: 600;">Nama Produk</label>
    <input
        type="text"
        id="name"
        name="name"
        value="{{ old('name', $product->name ?? '') }}"
        required
        style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 8px;"
    >
    @error('name')
        <small style="color: #b91c1c;">{{ $message }}</small>
    @enderror
</div>

<div style="margin-bottom: 12px;">
    <label for="description" style="display:block; margin-bottom: 6px; font-weight: 600;">Deskripsi</label>
    <textarea
        id="description"
        name="description"
        rows="4"
        style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 8px;"
    >{{ old('description', $product->description ?? '') }}</textarea>
    @error('description')
        <small style="color: #b91c1c;">{{ $message }}</small>
    @enderror
</div>

<div style="display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 12px; margin-bottom: 16px;">
    <div>
        <label for="price" style="display:block; margin-bottom: 6px; font-weight: 600;">Harga</label>
        <input
            type="number"
            step="0.01"
            min="0"
            id="price"
            name="price"
            value="{{ old('price', $product->price ?? 0) }}"
            required
            style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 8px;"
        >
        @error('price')
            <small style="color: #b91c1c;">{{ $message }}</small>
        @enderror
    </div>

    <div>
        <label for="stock" style="display:block; margin-bottom: 6px; font-weight: 600;">Stok</label>
        <input
            type="number"
            min="0"
            id="stock"
            name="stock"
            value="{{ old('stock', $product->stock ?? 0) }}"
            required
            style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 8px;"
        >
        @error('stock')
            <small style="color: #b91c1c;">{{ $message }}</small>
        @enderror
    </div>
</div>

<button
    type="submit"
    style="background: #111827; color: #fff; padding: 10px 16px; border: 0; border-radius: 8px; cursor: pointer;"
>
    Simpan
</button>
<a
    href="{{ route('products.index') }}"
    style="margin-left: 8px; color: #374151; text-decoration: none;"
>
    Batal
</a>
