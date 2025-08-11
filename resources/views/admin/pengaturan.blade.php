@extends('admin.layouts.admin')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6 flex items-center gap-2">
        <i class="fas fa-cog text-blue-600"></i> Pengaturan Admin
    </h1>

    {{-- Alert --}}
    @if (session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-3 rounded mb-4 flex items-center justify-between">
            ✅ {{ session('success') }}
            <button class="text-green-700 hover:text-green-900" onclick="this.parentElement.remove()">✖</button>
        </div>
    @endif

    @if ($errors->any())
        <div class="bg-red-100 text-red-800 px-4 py-3 rounded mb-4">
            <ul class="list-disc pl-5 space-y-1">
                @foreach ($errors->all() as $error)
                    <li>❌ {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Tabs --}}
    <div x-data="{ tab: 'profil' }">
        <div class="flex space-x-4 border-b mb-6">
            <button @click="tab = 'profil'" :class="tab === 'profil' ? 'border-blue-500 text-blue-600' : 'text-gray-500 hover:text-blue-600'" class="pb-2 border-b-2 font-semibold text-sm">
                📝 Edit Profil
            </button>
            <button @click="tab = 'password'" :class="tab === 'password' ? 'border-blue-500 text-blue-600' : 'text-gray-500 hover:text-blue-600'" class="pb-2 border-b-2 font-semibold text-sm">
                🔐 Ganti Password
            </button>
            <button @click="tab = 'tambah'" :class="tab === 'tambah' ? 'border-blue-500 text-blue-600' : 'text-gray-500 hover:text-blue-600'" class="pb-2 border-b-2 font-semibold text-sm">
                ➕ Tambah Akun
            </button>
        </div>

        {{-- Tab: Edit Profil --}}
        <div x-show="tab === 'profil'" x-transition>
            <div class="bg-white shadow rounded-lg p-6 mb-6">
                <h2 class="text-lg font-semibold text-gray-700 mb-4 flex items-center gap-2">
                    <i class="fas fa-user-edit text-blue-500"></i> Form Edit Profil
                </h2>
                <form method="POST" action="{{ route('admin.pengaturan.updateProfil') }}" class="space-y-4">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required
                               class="w-full mt-1 px-4 py-2 border rounded-lg shadow-sm focus:ring focus:border-blue-300">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Alamat Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required
                               class="w-full mt-1 px-4 py-2 border rounded-lg shadow-sm focus:ring focus:border-blue-300">
                    </div>
                    <button type="submit"
                            class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg shadow inline-flex items-center">
                        <i class="fas fa-save mr-2"></i> Simpan Perubahan
                    </button>
                </form>
            </div>
        </div>

        {{-- Tab: Ganti Password --}}
        <div x-show="tab === 'password'" x-transition>
            <div class="bg-white shadow rounded-lg p-6 mb-6">
                <h2 class="text-lg font-semibold text-gray-700 mb-4 flex items-center gap-2">
                    <i class="fas fa-key text-yellow-500"></i> Form Ganti Password
                </h2>
                <form method="POST" action="{{ route('admin.pengaturan.updatePassword') }}" class="space-y-4">
                    @csrf
                    <div>
                        <label for="password_lama" class="block text-sm font-medium text-gray-700">Password Lama</label>
                        <input type="password" name="password_lama" required
                               class="w-full mt-1 px-4 py-2 border rounded-lg shadow-sm focus:ring focus:border-blue-300">
                    </div>
                    <div>
                        <label for="password_baru" class="block text-sm font-medium text-gray-700">Password Baru</label>
                        <input type="password" name="password_baru" required
                               class="w-full mt-1 px-4 py-2 border rounded-lg shadow-sm focus:ring focus:border-blue-300">
                    </div>
                    <div>
                        <label for="password_baru_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password Baru</label>
                        <input type="password" name="password_baru_confirmation" required
                               class="w-full mt-1 px-4 py-2 border rounded-lg shadow-sm focus:ring focus:border-blue-300">
                    </div>
                    <button type="submit"
                            class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg shadow inline-flex items-center">
                        <i class="fas fa-lock mr-2"></i> Simpan Password Baru
                    </button>
                </form>
            </div>
        </div>

        {{-- Tab: Tambah Akun --}}
<div x-show="tab === 'tambah'" x-transition>
    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-lg font-semibold text-gray-700 mb-4 flex items-center gap-2">
            <i class="fas fa-user-plus text-indigo-500"></i> Tambah Akun Admin Baru
        </h2>

        {{-- ✅ Tampilkan error global (jika semua kolom kosong) --}}
        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <strong>Periksa kembali form berikut:</strong>
                <ul class="list-disc pl-5 mt-2 space-y-1 text-sm">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.pengaturan.tambahAkun') }}" class="space-y-4">
            @csrf

            {{-- Nama Lengkap --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name') }}"
                       class="w-full mt-1 px-4 py-2 border rounded-lg shadow-sm focus:ring focus:border-indigo-300 @error('name') border-red-500 @enderror">
                @error('name')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                       class="w-full mt-1 px-4 py-2 border rounded-lg shadow-sm focus:ring focus:border-indigo-300 @error('email') border-red-500 @enderror">
                @error('email')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Password --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password"
                       class="w-full mt-1 px-4 py-2 border rounded-lg shadow-sm focus:ring focus:border-indigo-300 @error('password') border-red-500 @enderror">
                @error('password')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Konfirmasi Password --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                <input type="password" name="password_confirmation"
                       class="w-full mt-1 px-4 py-2 border rounded-lg shadow-sm focus:ring focus:border-indigo-300 @error('password_confirmation') border-red-500 @enderror">
                @error('password_confirmation')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                    class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg shadow inline-flex items-center">
                <i class="fas fa-plus-circle mr-2"></i> Tambah Admin
            </button>
        </form>
    </div>
</div>

    </div>
</div>
@endsection
