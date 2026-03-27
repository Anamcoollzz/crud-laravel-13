<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk</title>
</head>
<body style="font-family: Arial, sans-serif; background: #f3f4f6; margin: 0;">
    <div style="max-width: 760px; margin: 40px auto; background: #fff; padding: 24px; border-radius: 12px; box-shadow: 0 8px 24px rgba(0,0,0,.08);">
        <h1 style="margin-top:0;">Detail Produk</h1>

        <div style="display:grid; gap:12px;">
            <div>
                <strong>Nama:</strong>
                <div>{{ $product->name }}</div>
            </div>

            <div>
                <strong>Deskripsi:</strong>
                <div>{{ $product->description ?: '-' }}</div>
            </div>

            <div>
                <strong>Harga:</strong>
                <div>Rp {{ number_format($product->price, 2, ',', '.') }}</div>
            </div>

            <div>
                <strong>Stok:</strong>
                <div>{{ $product->stock }}</div>
            </div>
        </div>

        <div style="margin-top: 16px;">
            <a href="{{ route('products.index') }}" style="margin-right:8px;">Kembali</a>
            <a href="{{ route('products.edit', $product) }}">Edit</a>
        </div>
    </div>
</body>
</html>
