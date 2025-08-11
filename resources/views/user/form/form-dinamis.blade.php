@php use Illuminate\Support\Str; @endphp

@foreach ($persyaratan as $item)
    @php
        $fieldName  = $item['name'];
        $fieldType  = $item['tipe'];
        $fieldLabel = $item['label'];
        $fieldId    = Str::slug($fieldName, '_');

        $inputName = $fieldType === 'file' ? "dokumen[$fieldName]" : "data[$fieldName]";
        $errorKey  = $fieldType === 'file' ? "dokumen.$fieldName" : "data.$fieldName";
    @endphp

    <div class="mb-5">
        <label for="{{ $fieldId }}" class="block text-gray-700 font-semibold mb-2">
            {{ $fieldLabel }}
        </label>

        @if ($fieldType === 'text')
            <input
                type="text"
                name="{{ $inputName }}"
                id="{{ $fieldId }}"
                value="{{ old($errorKey) }}"
                required
                class="w-full border rounded-lg shadow-sm p-3 bg-white transition 
                       @error($errorKey) border-red-500 focus:ring-red-500 focus:border-red-500 @else focus:ring-blue-500 focus:border-blue-500 @enderror"
                placeholder="Masukkan {{ strtolower($fieldLabel) }}"
            >
        @elseif ($fieldType === 'file')
            <input
                type="file"
                name="{{ $inputName }}"
                id="{{ $fieldId }}"
                required
                accept=".pdf,.jpg,.jpeg,.png"
                class="block w-full text-sm border rounded-lg shadow-sm p-3 bg-white transition 
                       @error($errorKey) border-red-500 file:bg-red-100 file:text-red-700 hover:file:bg-red-200 
                       @else file:bg-blue-100 file:text-blue-700 hover:file:bg-blue-200 @enderror"
            >
        @endif

        @error($errorKey)
            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
        @enderror
    </div>
@endforeach
