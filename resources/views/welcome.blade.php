<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home - {{ config('app.name', 'Laravel') }}</title>
  <meta name="description" content="Teste prático de programação utilizando Laravel">

  <link rel="icon" type="image/png" href="{{ asset('logo.png') }}">

  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

  @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  @endif
</head>

<body
  class="relative min-h-[100dvh] bg-[#222221] text-white py-[60px] px-[15px] flex flex-col items-center justify-center">
  <img src="{{ asset('/grupo-studio.png') }}" alt="Grupo Studio" class="w-full max-w-[420px] h-auto mx-auto mt-10" />
  <p class="mx-auto mt-10 mb-5 text-center">Teste prático de programação usando Laravel.</p>
  <p class="mx-auto mb-10 text-center">Stack: Laravel, PHP, Blade, Tailwind CSS, Javascript.</p>
  <p class="mx-auto mb-10 text-center">Clique no botão abaixo para acessar a calculadora de crédito tributário.</p>
  <div class="flex flex-col gap-[10px]">
    <a href="{{ route('empresa') }}"
      class="animate-pulse text-center block cursor-pointer mt-[10px] bg-[#8b6f4c] hover:bg-[#777] text-white font-bold py-3 px-6 rounded-[10px]">Acesse
      a calculadora
    </a>
    <a href="{{ route('empresas.index') }}"
      class="block cursor-pointer border-2 border-[#8b6f4c] text-[#8b6f4c]
          hover:bg-[rgba(255,255,255,0.9)] hover:text-gray-800
          font-bold py-3 px-6 rounded-[10px] transition">
      Ver relatórios cadastrados
    </a>
  </div>
</body>
