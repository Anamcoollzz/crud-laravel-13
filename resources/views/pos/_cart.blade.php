<div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm xl:sticky xl:top-6 h-fit">
  <h2 class="mb-4 text-base font-semibold text-slate-900">Keranjang POS</h2>

  <div class="space-y-3">
    @forelse ($cartItems as $item)
      <div class="rounded-lg border border-slate-200 p-3">
        <p class="text-sm font-semibold text-slate-900">{{ $item['product']->name }}</p>
        <p class="text-xs text-slate-500">Rp {{ number_format($item['product']->price, 2, ',', '.') }}</p>

        <div class="mt-2 flex items-center gap-2">
          <form action="{{ route('pos.update', $item['product']) }}" method="POST" class="js-pos-form flex items-center gap-2">
            @csrf
            @method('PATCH')
            <input type="number" name="qty" min="1" value="{{ $item['qty'] }}"
              class="w-16 rounded-lg border border-slate-300 px-2 py-1 text-sm outline-none transition focus:border-cyan-500 focus:ring-2 focus:ring-cyan-100">
            <button type="submit" class="rounded-lg border border-slate-300 px-2 py-1 text-xs font-semibold text-slate-700 hover:border-cyan-400 hover:text-cyan-700">Update</button>
          </form>

          <form action="{{ route('pos.remove', $item['product']) }}" method="POST" class="js-pos-form">
            @csrf
            @method('DELETE')
            <button type="submit" class="rounded-lg border border-rose-300 px-2 py-1 text-xs font-semibold text-rose-700 hover:bg-rose-50">Hapus</button>
          </form>
        </div>

        <p class="mt-2 text-xs font-semibold text-slate-700">Subtotal: Rp {{ number_format($item['subtotal'], 2, ',', '.') }}</p>
      </div>
    @empty
      <div class="rounded-lg border border-dashed border-slate-300 bg-slate-50 p-4 text-center text-sm text-slate-500">
        Keranjang masih kosong.
      </div>
    @endforelse
  </div>

  <div class="mt-4 border-t border-slate-200 pt-3">
    <p class="text-sm text-slate-600">Total</p>
    <p class="text-xl font-bold text-slate-900">Rp {{ number_format($total, 2, ',', '.') }}</p>
  </div>

  <form action="{{ route('pos.checkout') }}" method="POST" class="js-pos-form mt-4">
    @csrf
    <button type="submit" class="inline-flex w-full items-center justify-center rounded-lg bg-emerald-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-emerald-700" @disabled(empty($cartItems))>
      Checkout
    </button>
  </form>
</div>
