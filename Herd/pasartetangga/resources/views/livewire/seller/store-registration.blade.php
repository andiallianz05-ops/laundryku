<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900 max-w-2xl mx-auto">

            <h2 class="text-2xl font-bold mb-6">Daftarkan Toko UMKM Anda</h2>

            @if (session()->has('message'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                    {{ session('message') }}
                </div>
            @endif

            <form wire:submit.prevent="registerStore" class="space-y-4">
                <div>
                    <label class="block font-medium text-sm text-gray-700">Nama Toko</label>
                    <input type="text" wire:model="name" class="w-full border-gray-300 rounded-md shadow-sm mt-1" required>
                    @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block font-medium text-sm text-gray-700">Deskripsi Toko</label>
                    <textarea wire:model="description" class="w-full border-gray-300 rounded-md shadow-sm mt-1" rows="3"></textarea>
                    @error('description') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block font-medium text-sm text-gray-700">Alamat Lengkap</label>
                    <textarea wire:model="general_address" class="w-full border-gray-300 rounded-md shadow-sm mt-1" rows="2" required></textarea>
                    @error('general_address') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block font-medium text-sm text-gray-700">Nomor Kontak / WhatsApp</label>
                    <input type="text" wire:model="contact_phone" class="w-full border-gray-300 rounded-md shadow-sm mt-1" required>
                    @error('contact_phone') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="flex justify-end mt-6">
                    <button type="submit" class="bg-indigo-600 text-red font-bold px-6 py-2 rounded-md hover:bg-indigo-700 shadow-md">
                        Kirim Pendaftaran Toko
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
