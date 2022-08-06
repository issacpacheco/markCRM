<style>	
	.left-nav-label {
		margin-top: 2px;
	}
    .essubmenu{
        width: 225px;
        color: rgba(255,255,255,1);
        font-weight: 600;
        font-size: 13.5px;
        line-height: 25px;
        padding: 11px 15px 12px 15px;
        margin: 6px 0 0 10px;
    }
    .white{
        color: #fff;
    }
	</style>
	<div class="navigation">
        <a class="navbar-brand">
            <i class="fas fa-bars text-primary left-nav-toggle pull-right vcentered"></i>
        </a>
        <ul class="nav primary">
			<li class="">
                <a href="./">
                    <i class="fas fa-home"></i>
                    <span>Panel administrativo</span>
                </a>
            </li>
            <li>
                <a href="#submenuoperaciones" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-user-check"></i>
                    <span>Operaciones</span>
                </a>
                <ul class="collapse nav primary essubmenu" id="submenuoperaciones">
                    <li>
                        <a onclick="getPageMenu('pr-grupos')">
                        <i class="fas fa-users-class white"></i>
                            <span class="white">Prospectos asignados</span>
                        </a>
                    </li>
                    <li>
                        <a onclick="getPageMenu('pr-grupos')">
                        <i class="fas fa-users-class white"></i>
                            <span class="white">Prospectos sin asignar</span>
                        </a>
                    </li>
                    <li>
                        <a onclick="getPageMenu('pr-usuarios')">
                            <i class="fas fa-users white"></i>
                            <span class="white">Cotizaciones</span>
                        </a>
                    </li>
                    <li>
                        <a onclick="getPageMenu('pr-usuarios')">
                            <i class="fas fa-users white"></i>
                            <span class="white">Clientes</span>
                        </a>
                    </li>
                    <li>
                        <a onclick="getPageMenu('pr-usuarios')">
                            <i class="fas fa-users white"></i>
                            <span class="white">Ventas</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#submenuproductos" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-user-check"></i>
                    <span>Productos/Almacen</span>
                </a>
                <ul class="collapse nav primary essubmenu" id="submenuproductos">
                    <li>
                        <a onclick="getPageMenu('pr-grupos')">
                        <i class="fas fa-users-class white"></i>
                            <span class="white">Productos</span>
                        </a>
                    </li>
                    <li>
                        <a onclick="getPageMenu('pr-usuarios')">
                            <i class="fas fa-users white"></i>
                            <span class="white">almacenes</span>
                        </a>
                    </li>
                    <li>
                        <a onclick="getPageMenu('pr-usuarios')">
                            <i class="fas fa-users white"></i>
                            <span class="white">Categorias</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#submenumarketing" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-user-check"></i>
                    <span>Marketing</span>
                </a>
                <ul class="collapse nav primary essubmenu" id="submenumarketing">
                    <li>
                        <a onclick="getPageMenu('pr-grupos')">
                        <i class="fas fa-users-class white"></i>
                            <span class="white">Campañas</span>
                        </a>
                    </li>
                    <li>
                        <a onclick="getPageMenu('pr-usuarios')">
                            <i class="fas fa-users white"></i>
                            <span class="white">Galeria Sitio web</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#submenureportes" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-user-check"></i>
                    <span>Reportes</span>
                </a>
                <ul class="collapse nav primary essubmenu" id="submenureportes">
                    <li>
                        <a onclick="getPageMenu('pr-grupos')">
                        <i class="fas fa-users-class white"></i>
                            <span class="white">Ventas</span>
                        </a>
                    </li>
                    <li>
                        <a onclick="getPageMenu('pr-usuarios')">
                            <i class="fas fa-users white"></i>
                            <span class="white">Conversion</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#submenuaccesos" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-user-check"></i>
                    <span>Accesos</span>
                </a>
                <ul class="collapse nav primary essubmenu" id="submenuaccesos">
                    <li>
                        <a onclick="getPageMenu('pr-grupos')">
                        <i class="fas fa-users-class white"></i>
                            <span class="white">Grupos</span>
                        </a>
                    </li>
                    <li>
                        <a onclick="getPageMenu('pr-usuarios')">
                            <i class="fas fa-users white"></i>
                            <span class="white">Usuarios</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#submenupreferencias" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-user-check"></i>
                    <span>Preferencias</span>
                </a>
                <ul class="collapse nav primary essubmenu" id="submenupreferencias">
                    <li>
                        <a onclick="getPageMenu('pr-grupos')">
                        <i class="fas fa-users-class white"></i>
                            <span class="white">Empresa</span>
                        </a>
                    </li>
                    <li>
                        <a onclick="getPageMenu('pr-usuarios')">
                            <i class="fas fa-users white"></i>
                            <span class="white">Mi perfil</span>
                        </a>
                    </li>
                </ul>
            </li>
		</ul>
		

        <div class="time text-center">
            <h5 class="current-time2 white">&nbsp;</h5>
            <h5 class="current-time white">&nbsp;</h5>
        </div>
    </div>