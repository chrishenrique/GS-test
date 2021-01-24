<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('dashboard') }}" class="brand-link">
        <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('img/user-default.png') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                Usuario teste
            </div>
        </div>

        <nav class="mt-2">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column  nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item has-treeview">
                        <a href="{{ route('dashboard') }}" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('clients.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-briefcase"></i>
                            <p>Clientes</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('sales.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-dollar-sign"></i>
                            <p>Vendas</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('units.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-home"></i>
                            <p>Unidades</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('enterprises.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-building"></i>
                            <p>Empreendimentos</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('technical_managers.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-user-tie"></i>
                            <p>Responsaveis tecnicos</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('salesman.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Vendedores</p>
                        </a>
                    </li>
                    <li class="nav-item  has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-chart-bar"></i>
                            <p>
                                Relatorios
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item ">
                                <a href="{{ route('reports.sales') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Vendas</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('reports.units') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Un. disponíveis</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    
                </ul>
            </nav>
        </nav>
    </div>
</aside>
