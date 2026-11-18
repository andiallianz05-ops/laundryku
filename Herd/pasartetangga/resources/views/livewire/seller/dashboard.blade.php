<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900">
            <h2 class="text-2xl font-bold mb-4">Dashboard Penjual PasarTetangga</h2>

            @if($store)
                <div class="bg-gray-50 p-4 rounded-lg border mb-4">
                    <h3 class="text-lg font-semibold">Toko Anda: {{ $store->name }}</h3>
                    <p class="text-sm text-gray-600 mt-1">Status Verifikasi:
                        <span class="font-bold uppercase
                            {{ $store->status == 'approved' ? 'text-green-600' : ($store->status == 'rejected' ? 'text-red-600' : 'text-yellow-600') }}">
                            {{ $store->status }}
                        </span>
                    </p>
                </div>

                @if($store->status == 'approved')
                    <p class="text-green-700 font-medium">Toko Anda sudah disetujui! Anda dapat segera mengelola produk.</p>
                @else
                    <p class="text-yellow-700 font-medium">Toko Anda sedang dalam tinjauan admin. Mohon menunggu hingga disetujui.</p>
                @endif
            @else
                <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-4">
                    <p class="text-yellow-700">Anda belum mendaftarkan toko.</p>
                </div>
                <a href="{{ route('seller.register-store') }}" class="inline-block bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 font-bold">
                    Daftarkan Toko Sekarang
                </a>
            @endif
        </div>
    </div>
</div>
