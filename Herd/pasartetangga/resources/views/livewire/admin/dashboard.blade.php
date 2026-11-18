<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <!-- Header Sambutan -->
        <div class="mb-6 bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900">
            <h2 class="text-2xl font-bold">Dashboard Admin PasarTetangga</h2>
            <p class="text-gray-600 mt-1">Selamat datang kembali! Berikut adalah ringkasan statistik platform saat ini.</p>
        </div>

        <!-- Grid Statistik -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

            <!-- Card Total Kategori -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-indigo-500">
                <div class="text-gray-500 text-sm font-medium uppercase">Total Kategori</div>
                <div class="text-3xl font-bold text-gray-900 mt-2">{{ $totalCategories }}</div>
            </div>

            <!-- Card Total Toko -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-green-500">
                <div class="text-gray-500 text-sm font-medium uppercase">Total Toko Terdaftar</div>
                <div class="text-3xl font-bold text-gray-900 mt-2">{{ $totalStores }}</div>
            </div>

            <!-- Card Toko Pending -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-yellow-500">
                <div class="text-gray-500 text-sm font-medium uppercase">Toko Menunggu Verifikasi</div>
                <div class="text-3xl font-bold text-gray-900 mt-2">{{ $pendingStores }}</div>
            </div>

            <!-- Card Total Pengguna -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-blue-500">
                <div class="text-gray-500 text-sm font-medium uppercase">Total Pengguna</div>
                <div class="text-3xl font-bold text-gray-900 mt-2">{{ $totalUsers }}</div>
            </div>

        </div>

    </div>
</div>
