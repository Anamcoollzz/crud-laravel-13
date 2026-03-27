<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
</head>
<body style="font-family: Arial, sans-serif; background: #f3f4f6; margin: 0;">
    <div style="max-width: 760px; margin: 40px auto; background: #fff; padding: 24px; border-radius: 12px; box-shadow: 0 8px 24px rgba(0,0,0,.08);">
        <h1 style="margin-top:0;">Tambah Produk</h1>

        <form action="{{ route('products.store') }}" method="POST">
            @include('products._form')
        </form>
    </div>
</body>
</html>
