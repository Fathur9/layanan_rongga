@extends('user.layouts.user')

@section('content')
<div class="max-w-5xl mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Riwayat Permohonan Layanan</h1>

    @if ($riwayat->isEmpty())
        <div class="bg-yellow-100 text-yellow-800 p-4 rounded">
            Anda belum mengajukan layanan apa pun.
        </div>
    @else
        <div class="space-y-4">
            @foreach ($riwayat as $item)
                <div class="p-5 border rounded-lg bg-white shadow hover:shadow-md transition">
                    <div class="flex justify-between items-center">
                        <div>
                            <h2 class="text-lg font-semibold text-gray-800">
                                {{ $item->layanan->nama_layanan ?? '-' }}
                            </h2>
                            <p class="text-sm text-gray-500 mt-1">Status:
                                <span class="font-medium capitalize
                                    @if($item->status === 'diproses') text-yellow-600
                                    @elseif($item->status === 'selesai') text-green-600
                                    @else text-gray-600 @endif">
                                    {{ $item->status }}
                                </span>
                            </p>
                        </div>
                        <a href="{{ route('user.riwayat.show', $item->id) }}"
                           class="text-sm bg-blue-600 hover:bg-blue-700 text-white px-3 py-2 rounded-lg transition">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
