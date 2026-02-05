<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cadastro - {{ config('app.name', 'Laravel') }}</title>
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
  <form id="cadastro-empresa" class="mt-[40px] w-full max-w-[480px] mx-auto">
    <h1 class="mx-auto mb-10 text-center text-[24px] font-bold">Calcule seu crédito tributário</h1>
    <label class="mb-[10px] flex flex-col gap-[6px]">
      <span class="">Nome da empresa</span>
      <input type="text" required name="nome" placeholder="Digite o nome da empresa"
        class="bg-[#eee] rounded-[10px] p-3 w-full text-gray-700" />
    </label>
    <label class="mb-[10px] flex flex-col gap-[6px]">
      <span class="">CNPJ</span>
      <input type="text" required name="cnpj" placeholder="Digite o CNPJ"
        class="bg-[#eee] rounded-[10px] p-3 w-full text-gray-700" />
    </label>
    <label class="mb-[10px] flex flex-col gap-[6px]">
      <span class="">ICMS Pago</span>
      <input type="text" required name="icms_pago" placeholder="Informe o valor do ICMS pago"
        class="bg-[#eee] rounded-[10px] p-3 w-full text-gray-700" />
    </label>
    <label class="mb-[10px] flex flex-col gap-[6px]">
      <span class="">Créditos Possíveis</span>
      <input type="text" required name="creditos_possiveis" placeholder="Informe o valor dos créditos possíveis"
        class="bg-[#eee] rounded-[10px] p-3 w-full text-gray-700" />
    </label>
    <p id="error" class="hidden text-red-600 text-[14px]"></p>

    <div class="flex flex-col gap-[10px]">
      <button type="submit"
        class="cursor-pointer mt-[10px] bg-[#8b6f4c] hover:bg-[#777] text-white font-bold py-3 px-6 rounded-[10px] w-full">Calcular
      </button>
      <a href="{{ route('empresas.index') }}"
        class="text-center block cursor-pointer border-2 border-[#8b6f4c] text-[#8b6f4c]
          hover:bg-[rgba(255,255,255,0.9)] hover:text-gray-800
          font-bold py-3 px-6 rounded-[10px] transition">
        Ver relatórios cadastrados
      </a>
    </div>
    <div id="loading"
      class="hidden absolute top-0 bottom-0 left-0 right-0 bg-[rgba(200,200,200,0.5)] items-center justify-center">
      <img src="{{ asset('/logo.png') }}" alt="GS"
        class="w-full max-w-[70px] h-auto mx-auto mt-10 animate-bounce" />
    </div>
  </form>
</body>

</html>
