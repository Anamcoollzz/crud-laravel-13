<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk</title>
</head>
<body style="font-family: Arial, sans-serif; background: #f3f4f6; margin: 0;">
    <div style="max-width: 960px; margin: 40px auto; background: #fff; padding: 24px; border-radius: 12px; box-shadow: 0 8px 24px rgba(0,0,0,.08);">
        <div style="display:flex; justify-content: space-between; align-items:center; margin-bottom: 16px;">
            <h1 style="margin:0;">Daftar Produk</h1>
            <a href="{{ route('products.create') }}" style="background:#111827; color:#fff; padding:10px 14px; border-radius:8px; text-decoration:none;">+ Tambah Produk</a>
        </div>

        @if (session('success'))
            <div style="background:#dcfce7; color:#166534; border:1px solid #86efac; padding:10px 12px; border-radius:8px; margin-bottom:16px;">
                {{ session('success') }}
            </div>
        @endif

        <div style="overflow-x:auto;">
            <table style="width:100%; border-collapse: collapse;">
                <thead>
                    <tr style="background:#f9fafb;">
                        <th style="text-align:left; padding:10px; border-bottom:1px solid #e5e7eb;">Nama</th>
                        <th style="text-align:left; padding:10px; border-bottom:1px solid #e5e7eb;">Harga</th>
                        <th style="text-align:left; padding:10px; border-bottom:1px solid #e5e7eb;">Stok</th>
                        <th style="text-align:left; padding:10px; border-bottom:1px solid #e5e7eb; width:240px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <td style="padding:10px; border-bottom:1px solid #f3f4f6;">{{ $product->name }}</td>
                            <td style="padding:10px; border-bottom:1px solid #f3f4f6;">Rp {{ number_format($product->price, 2, ',', '.') }}</td>
                            <td style="padding:10px; border-bottom:1px solid #f3f4f6;">{{ $product->stock }}</td>
                            <td style="padding:10px; border-bottom:1px solid #f3f4f6;">
                                <a href="{{ route('products.show', $product) }}" style="margin-right:8px;">Detail</a>
                                <a href="{{ route('products.edit', $product) }}" style="margin-right:8px;">Edit</a>
                                <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="background:none; border:none; color:#b91c1c; cursor:pointer; padding:0;">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" style="padding:16px; text-align:center; color:#6b7280;">Belum ada data produk.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div style="margin-top:16px;">
            {{ $products->links() }}
        </div>
    </div>
</body>
</html>
