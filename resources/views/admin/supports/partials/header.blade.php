<div class="barra flex justify-between p-3">
    <div class="flex">
        <div class="flex items-center gap-x-3">
            <h1 class="text-lg text-black-500">Dúvidas</h1>
            <span class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full">{{ $supports->total() }} dúvidas</span>
        </div>
        &nbsp;&nbsp;&nbsp;
        <div class="flex">
            <a href="{{ route('suporte.create') }}" class="flex items-center justify-center w-1/2 px-5 py-2 text-sm text-gray-700 transition-colors duration-200 bg-white border rounded-lg gap-x-2 sm:w-auto hover:bg-gray-100">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
    
                <span>Nova Dúvida</span>
            </a>
        </div>
    </div>
    <div class="flex items-center">
        <span class="absolute">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mx-3 text-gray-400">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
            </svg>
        </span>
    
        <form action="{{ route('suporte.index') }}" method="get">
            <input name="filter" type="text" placeholder="Procurar" class="block w-full py-1.5 pr-5 text-gray-700 bg-white border border-gray-200 rounded-lg md:w-80 placeholder-gray-400/70 pl-11 rtl:pr-11 rtl:pl-5 focus:border-blue-400 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40" value="">
        </form>
    </div>
</div>
