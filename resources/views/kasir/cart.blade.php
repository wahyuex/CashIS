<!-- resources/views/cart.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Cart</title>
</head>

<body>
    <h1>Cart</h1>

    <form action="{{ route('checkout') }}" method="POST">
        @csrf
        <ul>
            @foreach ($cartItems as $cartItem)
                <li>
                    {{ $cartItem->name }} - Harga: {{ $cartItem->harga }} - <label
                        for="jumlah_keluar_{{ $cartItem->id }}" class="form-label">Jumlah Keluar</label>
                    <input type="number" class="form-control" id="jumlah_keluar_{{ $cartItem->id }}"
                        name="jumlah_keluar_{{ $cartItem->id }}" required>
                    <input type="hidden" name="kode_produk_{{ $cartItem->id }}" value="{{ $cartItem->code }}">
                </li>
            @endforeach

        </ul>
        <button type="submit">Checkout</button>
    </form>
</body>

</html>
