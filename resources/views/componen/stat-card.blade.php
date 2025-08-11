@props(['title', 'count', 'icon', 'color'])

<div class="bg-white dark:bg-slate-800 p-4 rounded-xl shadow flex items-center justify-between">
    <div>
        <div class="text-sm text-gray-500 dark:text-gray-300">
            {{ $title }}
        </div>
        <div class="text-2xl font-bold text-gray-800 dark:text-white">
            {{ $count }}
        </div>
    </div>
    <div class="flex items-center justify-center w-12 h-12 rounded-full {{ $color }}">
        <i data-lucide="{{ $icon }}" class="w-6 h-6 text-white"></i>
    </div>
</div>
