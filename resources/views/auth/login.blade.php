@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-darkblue">
    <div class="bg-white shadow-lg rounded-2xl p-8 w-full max-w-md animate-fade-in-down">
        <div class="flex flex-col items-center">
            <img src="{{ asset('img/desa-bg.png') }}" alt="Logo" class="w-20 h-20 mb-4">
            <h2 class="text-xl font-bold text-darkblue mb-6">KECAMATAN RONGGA</h2>
            <h2 class="text-xl font-bold text-darkblue">Halaman Login</h2>
        </div>

        {{-- Pesan error dari session --}}
        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4 text-sm">
                {{ session('error') }}
            </div>
        @endif

        {{-- Pesan error validasi umum --}}
        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4 text-sm">
                Silakan periksa kembali data Anda.
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            {{-- Email --}}
            <div>
                <label for="email" class="block text-darkblue font-semibold mb-1">Email</label>
                <input id="email" type="email" name="email" required autofocus value="{{ old('email') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary text-darkblue placeholder-gray-500 bg-white"
                    placeholder="admin@example.com">
                @error('email')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Password --}}
            <div class="relative">
                <label for="password" class="block text-darkblue font-semibold mb-1">Password</label>
                <input id="password" type="password" name="password" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary text-darkblue placeholder-gray-500 bg-white"
                    placeholder="••••••••">

                @error('password')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror

                {{-- Toggle icon --}}
                <button type="button" data-target="password" onclick="togglePassword(this)"
                    class="absolute top-9 right-3 hover:text-gray-700 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 show-eye hidden text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 
                            4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hide-eye text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.965 
                            9.965 0 012.525-4.567m1.003-1.003A9.969 9.969 0 0112 5c4.478 0 8.268 2.943 
                            9.542 7a9.964 9.964 0 01-1.233 2.36M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3l18 18" />
                    </svg>
                </button>
            </div>

            {{-- Tombol login --}}
            <div>
                <button type="submit"
                    class="w-full bg-primary hover:bg-primary-dark text-white font-semibold py-2 rounded-xl transition duration-300 ease-in-out shadow-md">
                    Login
                </button>
            </div>

            {{-- Link ke register --}}
            <div class="text-center text-sm text-darkblue font-semibold mt-4">
                Belum punya akun? 
                <a href="{{ route('register') }}" class="text-primary hover:underline font-semibold">Register sekarang!</a>
            </div>
        </form>
    </div>
</div>

{{-- Script toggle password --}}
<script>
    function togglePassword(button) {
        const targetId = button.getAttribute('data-target');
        const input = document.getElementById(targetId);
        const showIcon = button.querySelector('.show-eye');
        const hideIcon = button.querySelector('.hide-eye');

        const isHidden = input.type === "password";
        input.type = isHidden ? "text" : "password";

        showIcon.classList.toggle("hidden", !isHidden);
        hideIcon.classList.toggle("hidden", isHidden);
    }

    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll('button[data-target]').forEach(button => {
            const targetId = button.getAttribute('data-target');
            const input = document.getElementById(targetId);
            const showIcon = button.querySelector('.show-eye');
            const hideIcon = button.querySelector('.hide-eye');

            if (input.type === "password") {
                showIcon.classList.add("hidden");
                hideIcon.classList.remove("hidden");
            } else {
                showIcon.classList.remove("hidden");
                hideIcon.classList.add("hidden");
            }
        });
    });
</script>
@endsection
