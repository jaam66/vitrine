<ul class="flex bg-[#E4E4E4] p-3">
    <li class="mr-6">
      <a class="menu" href="{{ route('index') }}"><i class="fa-sharp-duotone fa-solid fa-house"></i> Home</a>
    </li>
    <li class="mr-6">
      <a class="menu" href="{{ route('suporte.index') }}"><i class="fa-sharp-duotone fa-solid fa-headset"></i> Suporte</a>
    </li>
    <li class="mr-6">
      <a class="menu" href="{{ route('equipamento.index') }}"><i class="fa-solid fa-computer"></i> Equipamento</a>
    </li>
    <li class="mr-6">
      <a class="menu" href="{{ route('orcamento.index') }}"><i class="fa-solid fa-file-invoice-dollar"></i></i> Orçamento</a>
    </li>
    <li class="mr-6">
      <a class="menu" href="{{ route('usuario.index') }}"><i class="fa-sharp-duotone fa-solid fa-users"></i> Usuário</a>
    </li>
    <li class="mr-6">
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <a class="menu"  href="" onclick="event.preventDefault(); this.closest('form').submit();">
             <i class="fa-sharp-duotone fa-solid fa-door-open"></i> Sair
        </a>
      </form>
    </li>
  </ul>