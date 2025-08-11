@extends('user.layouts.user')

@section('content')
<div class="p-6 max-w-3xl mx-auto">
    <h2 class="text-2xl font-bold mb-4">Detail Permohonan</h2>

    <div class="bg-white p-4 rounded shadow space-y-4">
        <p><strong>Layanan:</strong> {{ $permohonan->layanan->nama }}</p>
        <p><strong>Status:</strong> <span class="capitalize">{{ $permohonan->status }}</span></p>
        <p><strong>Catatan Admin:</strong> {{ $permohonan->catatan_admin ?? '-' }}</p>
        <p><strong>Tanggal Permohonan:</strong> {{ $permohonan->created_at->format('d M Y H:i') }}</p>

        <div class="mt-4">
            <h3 class="text-lg font-semibold">Data Permohonan</h3>
            <ul class="list-disc pl-6 space-y-1">
                @foreach($permohonan->data as $label => $value)
                    <li>
                        <strong>{{ ucwords(str_replace('_', ' ', $label)) }}:</strong>
                        @if(Str::endsWith($value, ['.jpg', '.png', '.pdf']))
                            <a href="{{ asset('storage/uploads/layanan/' . $value) }}" target="_blank" class="text-blue-500 hover:underline">Lihat File</a>
                        @else
                            {{ $value }}
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
