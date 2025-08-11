<?php

if (!function_exists('vite_asset')) {
    function vite_asset($path)
    {
        $manifestPath = public_path('build/manifest.json');

        // Kalau manifest.json nggak ada, fallback ke asset biasa
        if (!file_exists($manifestPath)) {
            return asset($path);
        }

        $manifest = json_decode(file_get_contents($manifestPath), true);

        // Kalau file nggak ada di manifest, fallback ke asset biasa
        if (!isset($manifest[$path]['file'])) {
            return asset($path);
        }

        // Ambil URL domain dari APP_URL atau ASSET_URL
        $baseUrl = env('ASSET_URL', env('APP_URL'));

        return rtrim($baseUrl, '/') . '/build/' . $manifest[$path]['file'];
    }
}
