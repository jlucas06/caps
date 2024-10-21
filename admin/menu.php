
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<hr class="sidebar-divider my-0">

<li class="nav-item active">
    <a class="nav-link" href="index.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>INICIO</span></a>
</li>

<hr class="sidebar-divider">

<div class="sidebar-heading">
    Menu
</div>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>CADASTROS</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Cadastros:</h6>
            <a class="collapse-item" href="novo_paciente.php">Novo Paciente</a>
            <a class="collapse-item" href="novo_atendimento.php">Novo Atendimento</a>
        </div>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilitie"
        aria-expanded="true" aria-controls="collapseUtilitie">
        <i class="fas fa-fw fa-wrench"></i>
        <span>BUSCAS</span>
    </a>
    <div id="collapseUtilitie" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Busca:</h6>
            <a class="collapse-item" href="busca_paciente.php">Buscar Paciente</a>
            <a class="collapse-item" href="busca_atendimento.php">Buscar Atendimento</a>
        </div>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-wrench"></i>
        <span>RELATÓRIOS</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Relatorio:</h6>
            <a class="collapse-item" href="#">Relatorio Geral</a>
        </div>
    </div>
</li>

<hr class="sidebar-divider">

<div class="sidebar-heading">
    Ações
</div>

<li class="nav-item">
    <a class="nav-link" href="../logout.php">
        <i class="fas fa-fw fa-sign-out-alt"></i>
        <span>SAIR</span></a>
</li>

<hr class="sidebar-divider d-none d-md-block">

<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>
  
</ul>
