<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Relatório - {{ config('app.name', 'Laravel') }}</title>
  <meta name="description" content="Teste prático de programação utilizando Laravel">

  <link rel="icon" type="image/png" href="{{ asset('logo.png') }}">

  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

  @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  @endif
</head>

<body class="relative min-h-[100dvh] bg-[#222221] text-white py-[60px] px-[15px]">
  <a href="/">
    <img src="{{ asset('/grupo-studio.png') }}" alt="Grupo Studio" class="w-full max-w-[320px] h-auto mx-auto mt-10" />
  </a>
  <div class="mt-[40px] w-full max-w-[540px] mx-auto bg-white text-gray-700 p-6 rounded-[10px]">
    <h1 class="mx-auto mb-10 text-center text-[24px] font-bold">Resultado do Relatório</h1>
    <div class="flex flex-col gap-[10px]">
      <div class="border-t border-gray-300"></div>
      <p class="flex justify-between flex-wrap"><b>Nome da empresa: </b> {{ $empresa->nome }}</p>
      <div class="border-t border-gray-300"></div>
      <p class="flex justify-between flex-wrap"><b>CNPJ: </b> {{ $empresa->cnpj }}</p>
      <div class="border-t border-gray-300"></div>
      <p class="flex justify-between flex-wrap"><b>ICMS Pago: </b> R$
        {{ number_format($empresa->icms_pago, 2, ',', '.') }}</p>
      <div class="border-t border-gray-300"></div>
      <p class="flex justify-between flex-wrap"><b>Créditos Possíveis: </b> R$
        {{ number_format($empresa->creditos_possiveis, 2, ',', '.') }}</p>
      <div class="border-t border-gray-300"></div>
      <p class="flex justify-between flex-wrap"><b>Percentual de Crédito: </b>
        {{ number_format($empresa->resultado, 2, ',', '.') }}%</p>
      <div class="border-t border-gray-300"></div>
    </div>
  </div>
  <div class="mt-[20px] w-full max-w-[540px] mx-auto flex flex-col gap-[10px]">
    <a href="{{ route('empresas.index') }}"
      class="text-center block cursor-pointer mt-[10px] bg-[#8b6f4c] hover:bg-[#777] text-white font-bold py-3 px-6 rounded-[10px]">Ver
      outros relatórios
    </a>
    <a href="{{ route('empresa') }}"
      class="text-center block cursor-pointer border-2 border-[#8b6f4c] text-[#8b6f4c]
          hover:bg-[rgba(255,255,255,0.9)] hover:text-gray-800
          font-bold py-3 px-6 rounded-[10px] transition">
      Novo relatório
    </a>
  </div>
</body>

</html>
