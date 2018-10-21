
<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse  ">
        <ul class="page-sidebar-menu page-header-fixed" data-keep-expanded="false"
            data-auto-scroll="true" data-slide-speed="200">
            <li class="heading">
                <h3 class="uppercase">Menú Principal</h3>
            </li>
            @if(!is_null(Auth::user()->empleado) or Auth::user()->email == 'root@gmail.com')
            <li class="nav-item">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-usd"></i>
                    <span class="title">Contabilidad</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu" style="display: none;">
                    <li class="nav-item">
                        <a href="{{route('nominas.index')}}" class="nav-link ">
                            <i class="fa fa-money"></i>
                            <span class="title">Pago de Nomina</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('pagoproveedores.index')}}" class="nav-link ">
                            <i class="fa fa-money"></i>
                            <span class="title">Pago de Proveedores</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('r_balance')}}" class="nav-link ">
                            <i class="fa fa-file-text"></i>
                            <span class="title">Balance</span>
                        </a>
                    </li>

                    @if(Auth::user()->email == 'root@gmail.com')
                        <li class="nav-item">
                            <a href="{{route('varcontr.index')}}" class="nav-link ">
                                <i class="fa fa-cogs"></i>
                                <span class="title">Datos Contables</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('permisos.index')}}" class="nav-link ">
                                <i class="fa fa-cogs"></i>
                                <span class="title">Permisos Contables Usuarios</span>
                            </a>
                        </li>
                        @endif


                </ul>
            </li>
            @endif

            <li class="nav-item">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-cogs"></i>
                    <span class="title">Facturas</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu" style="display: none;">
                    <li class="nav-item">
                        <a href="{{ route('factura.validacion.index') }}" class="nav-link ">
                            <i class="fa fa-cogs"></i>
                            <span class="title">Generar Factura</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('factura.reporte') }}" class="nav-link ">
                            <i class="fa fa-cogs"></i>
                            <span class="title">Reportes</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('factura.cuota') }}" class="nav-link ">
                            <i class="fa fa-cogs"></i>
                            <span class="title">Pagar Credito</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('EntregasPendiente') }}" class="nav-link ">
                            <i class="fa fa-cogs"></i>
                            <span class="title">Entregar pendiente</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-cogs"></i>
                    <span class="title">Inventario</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu" style="display: none;">
                    <li class="nav-item">
                        <a href="{{ route('proveedores') }}" class="nav-link ">
                            <i class="fa fa-cogs"></i>
                            <span class="title">Proveedores</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('articulos') }}" class="nav-link ">
                            <i class="fa fa-cogs"></i>
                            <span class="title">Articulos</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('pedidos') }}" class="nav-link ">
                            <i class="fa fa-cogs"></i>
                            <span class="title">Pedidos</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ URL::to('/reportesInventario') }}" class="nav-link ">
                            <i class="fa fa-cogs"></i>
                            <span class="title">Reportes</span>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="nav-item">
                <!--a href="{{ url('/cartera/index') }}"-->
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-cogs"></i>
                    <span class="title">Cartera</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu" style="display: none;">
                  <!--Historial de credito de las personas listo-->
                  <li class="nav-item">
                    <a href="{{ URL::to('/deuda') }}" class="nav-link ">
                      <i class="fa fa-cogs"></i>
                      <span class="title">Historial crediticio</span>
                    </a>
                  </li>
                  <!--Historial de pagos de las personas ready-->
                  <li class="nav-item">
                    <a href="{{ URL::to('/pago') }}" class="nav-link ">
                      <i class="fa fa-cogs"></i>
                      <span class="title">Consultar pagos</span>
                    </a>
                  </li>
                  <!--PLan de pagos de las personas prêt-->
                  <li class="nav-item">
                    <a href="{{ URL::to('/plan_de_pago') }}" class="nav-link ">
                      <i class="fa fa-cogs"></i>
                      <span class="title">Plan de pago</span>
                    </a>
                  </li>
                  <li class="nav-item">
										<a href="{{ URL::to('/reportes') }}" class="nav-link ">
											<i class="fa fa-cogs"></i>
											<span class="title">Reportes</span>
										</a>
									</li>
                  <li class="nav-item">
                    <!-- 私はそれをやるつもりだ-->
                    <a href="{{ URL::to('/pago/show') }}" class="nav-link ">
                      <i class="fa fa-cogs"></i>
                      <span class="title">Paz y salvo</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <!-- Путо тот, который переводит его-->
                    <a href="{{ URL::to('/consultas') }}" class="nav-link ">
                      <i class="fa fa-cogs"></i>
                      <span class="title">Consultas</span>
                    </a>
                  </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-cogs"></i>
                    <span class="title">Usuarios</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu" style="display: none;">
                  <li class="nav-item">
                      <a href="{{route('Cliente.create')}}" class="nav-link ">
                          <i class="fa fa-cogs"></i>
                         <span class="title">Agregar Cliente</span>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{route('Empleado.create')}}" class="nav-link ">
                          <i class="fa fa-cogs"></i>
                         <span class="title">Agregar Empleado</span>
                      </a>
                  </li>
                    <li class="nav-item">
                        <a href="{{route('Usuario.index')}}" class="nav-link ">
                            <i class="fa fa-cogs"></i>
                           <span class="title">Listar Usuarios</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('Empresa.index')}}" class="nav-link ">
                            <i class="fa fa-cogs"></i>
                           <span class="title">Informacion Empresa</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('filtros')}}" class="nav-link ">
                            <i class="fa fa-cogs"></i>
                           <span class="title">Reportes</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('indextrash')}}" class="nav-link ">
                            <i class="fa fa-cogs"></i>
                           <span class="title">Restaurar datos</span>
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
</div>
