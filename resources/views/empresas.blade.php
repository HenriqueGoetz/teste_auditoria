<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Relatório - {{ config('app.name', 'Laravel') }}</title>
  <meta name="description" content="Teste prático de programação utilizando Laravel">
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

  <!-- Styles / Scripts -->
  @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  @endif
</head>

<body class="relative min-h-[100dvh] bg-[#222221] text-white py-[60px] px-[15px]">
  <a href="/">
    <img src="{{ asset('/grupo-studio.png') }}" alt="Grupo Studio" class="w-full max-w-[320px] h-auto mx-auto mt-10" />
  </a>
  <div class="mt-[40px] w-full max-w-[640px] mx-auto">
    <h1 class="mx-auto mb-10 text-center text-[24px] font-bold">Empresas Cadastradas</h1>

    <div class="flex flex-col gap-[10px]">
      @foreach ($empresas as $empresa)
        <div class="bg-white rounded-[10px] p-4 text-gray-700 flex  items-center justify-between gap-[10px] flex-wrap">
          <p><b>Nome da empresa: </b> {{ $empresa->nome }}</p>
          <p><b>CNPJ: </b> {{ $empresa->cnpj }}</p>
          <a href="{{ route('empresas.show', $empresa->id) }}"
            class="block cursor-pointer bg-[#8b6f4c] hover:bg-[#777] text-white font-bold py-3 px-6 rounded-[10px]">Ver
            relatório
          </a>
        </div>
      @endforeach
    </div>

    <a href="{{ route('empresa') }}"
      class="animate-pulse text-center block cursor-pointer mt-[10px] bg-[#8b6f4c] hover:bg-[#777] text-white font-bold py-3 px-6 rounded-[10px]">Novo
      relatório
    </a>
  </div>
</body>

</html>
