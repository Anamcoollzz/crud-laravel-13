<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Aplikasi Produk')</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-linear-to-br from-slate-50 via-white to-cyan-50 text-slate-800 antialiased">
  <div class="mx-auto max-w-6xl px-4 py-8 sm:px-6 lg:px-8">
    <header class="mb-6 flex flex-col gap-4 rounded-2xl border border-slate-200/70 bg-white/80 p-4 shadow-sm backdrop-blur sm:flex-row sm:items-center sm:justify-between">
      <div>
        <p class="text-xs font-semibold uppercase tracking-wider text-cyan-700">Crud Laravel</p>
        <h1 class="text-xl font-bold text-slate-900">@yield('page_title', 'Manajemen Produk')</h1>
      </div>
      <div class="flex flex-wrap items-center gap-2">
        <a href="{{ route('products.index') }}"
          class="inline-flex items-center justify-center rounded-lg border px-4 py-2 text-sm font-semibold transition {{ request()->routeIs('products.*') ? 'border-cyan-500 bg-cyan-50 text-cyan-700' : 'border-slate-300 bg-white text-slate-700 hover:border-cyan-400 hover:text-cyan-700' }}">
          Produk
        </a>
        <a href="{{ route('categories.index') }}"
          class="inline-flex items-center justify-center rounded-lg border px-4 py-2 text-sm font-semibold transition {{ request()->routeIs('categories.*') ? 'border-cyan-500 bg-cyan-50 text-cyan-700' : 'border-slate-300 bg-white text-slate-700 hover:border-cyan-400 hover:text-cyan-700' }}">
          Kategori
        </a>
      </div>
    </header>

    <main>
      @yield('content')
    </main>
  </div>
</body>

</html>
