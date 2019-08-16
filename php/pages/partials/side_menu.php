<?php $obj_permisos_link=new Permisos();

?>
            <!-- main menu -->
            <nav id="main_menu">
                <div class="menu_wrapper">
                    <ul>
                        <li class="<?php if($sPage == "dashboard") { echo 'section_active '; }; ?>first_level">
                            <a href="?page=dashboard">
                                <span class="icon_house_alt first_level_icon"></span>
                                <span class="menu-title">Inicio</span>
                            </a>
                        </li>
            <?php if($obj_permisos_link->TienePermiso_('LEER',$_SESSION['User']->id,'censos')){?>
                        <li class="<?php if($sPage == "CensosPrevencion") { echo 'section_active '; }; ?> first_level">
                            <a   href="?page=CensosPrevencion">
                                <span class="el-icon-edit first_level_icon"></span>
                                <span class="menu-title">Censos de Prevencion</span>
                            </a>
                        </li>
                        <?php }?>


                       
                        <li class="first_level">
                            <a href="javascript:void(0)">
                                <span class="icon_document_alt first_level_icon"></span>
                                <span class="menu-title">Atencion</span>
                            </a>
                            <ul>
                                <li class="submenu-title">Atencion</li>
                                <?php if($obj_permisos_link->TienePermiso_('LEER',$_SESSION['User']->id,'censos')){?>
                                <li><a <?php if($sPage == "Censos"|| $sPage=="Hogares"|| $sPage=="Integrantes") { echo 'class="act_nav" '; }; ?>href="?page=Censos">Censos</a></li>
                                <?php }?>
                                <?php if($obj_permisos_link->TienePermiso_('LEER',$_SESSION['User']->id,'alertas_por_asignar')){?>
                                <li><a <?php if($sPage == "Alertas") { echo 'class="act_nav" '; }; ?>href="?page=Alertas">Alertas Por Asignar</a></li>
                                <?php }?>
                                <?php if($obj_permisos_link->TienePermiso_('LEER',$_SESSION['User']->id,'alertas_asignadas')){?>
                                <li><a <?php if($sPage == "AlertasAsignadas") { echo 'class="act_nav" '; }; ?>href="?page=AlertasAsignadas">Alertas Asignadas</a></li>
                                <?php }?>
                                
                                <li><a <?php if($sPage == "MisAlertasAsignadas") { echo 'class="act_nav" '; }; ?>href="?page=MisAlertasAsignadas">Mis Alertas Asignadas</a></li>
                                
                                
                                </ul>
                        </li>
                        <li class="first_level">
                            <a href="javascript:void(0)">
                                <span class="el-icon-slideshare  first_level_icon"></span>
                                <span class="menu-title">Capacitaciones</span>
                            </a>
                            <ul>
                                <li class="submenu-title">Capacitaciones</li>
                                <?php if($obj_permisos_link->TienePermiso_('LEER',$_SESSION['User']->id,'pacs')){?>
                                <li><a <?php if($sPage == "Pacs") { echo 'class="act_nav" '; }; ?>href="?page=Pacs">Pac</a></li>
                                <?php }?>
                                <?php if($obj_permisos_link->TienePermiso_('LEER',$_SESSION['User']->id,'programas')){?>
                                <li><a <?php if($sPage == "Programas"|| $sPage=="Temas") { echo 'class="act_nav" '; }; ?>href="?page=Programas">Programas</a></li>
                                <?php }?>
                                </ul>
                        </li>
                        
                        <li class="first_level">
                            <a href="javascript:void(0)">
                                <span class="el-icon-cogs first_level_icon"></span>
                                <span class="menu-title">Parametrizacion</span>
                                
                            </a>
                            <ul>
                                <li class="submenu-title">Parametrizacion</li>
                              <?php $array_menu=array(['TipoDocumentos'],['TipoAfectaciones'],['TipoRiesgos'],['Escenarios'],['TipoCapacitaciones'],['TipoAyudas'],['Parentescos'],['Categorias','categoria'],['Niveles','nivel'],['Pistas'],['Departamentos'],['Respuestasalertas']); 

                                        foreach ($array_menu as $key => $link) {
                                            $tabla=(isset($link[1]))?$link[1]:strtolower($link[0]);
                                            $label=str_replace("Tipo","Tipo de ", $link[0]);
                                            if($obj_permisos_link->TienePermiso_('LEER',$_SESSION['User']->id,$tabla)){
                                                ?>
                                                <li>
                                                <a <?php if($sPage == $link[0]) { echo 'class="act_nav" '; }; ?>
                                                href="?page=<?php echo $link[0]?>"><?php echo $label?></a>
                                                </li>
                                        <?php } 

                                            
                                        }


                              ?>

<!--

                                 

                                <li><a <?php if($sPage == "TipoAfectaciones") { echo 'class="act_nav" '; }; ?>href="?page=TipoAfectaciones">Tipos de Afectaciones</a></li>
                                <li><a <?php if($sPage == "TipoCapacitaciones") { echo 'class="act_nav" '; }; ?>href="?page=TipoCapacitaciones">Tipos de Capacitaciones</a></li>
                                <li><a <?php if($sPage == "TipoAyudas") { echo 'class="act_nav" '; }; ?>href="?page=TipoAyudas">Tipos de Ayudas</a></li>
                                <li><a <?php if($sPage == "Parentescos") { echo 'class="act_nav" '; }; ?>href="?page=Parentescos">Parentescos</a></li>
                                <li><a <?php if($sPage == "Categorias") { echo 'class="act_nav" '; }; ?>href="?page=Categorias">Categorias Alertas</a></li>
                                <li><a <?php if($sPage == "Niveles") { echo 'class="act_nav" '; }; ?>href="?page=Niveles">Niveles Alertas</a></li>
                                <li><a <?php if($sPage == "Pistas") { echo 'class="act_nav" '; }; ?>href="?page=Pistas">Pistas</a></li>
                                <li><a <?php if($sPage == "Departamentos") { echo 'class="act_nav" '; }; ?>href="?page=Departamentos">Departamentos</a></li>
                                <li><a <?php if($sPage == "Respuestasalertas") { echo 'class="act_nav" '; }; ?>href="?page=Respuestasalertas">Respuestas alertas</a></li>
                                -->
                            </ul>
                        </li>
                        <?php if($obj_permisos_link->TienePermiso_('LEER',$_SESSION['User']->id,'users')){?>
                        <li class="first_level">
                            <a href="javascript:void(0)">
                                <span class="icon_key first_level_icon"></span>
                                <span class="menu-title">Permisos</span>
                                
                            </a>
                            <ul>
                                <li class="submenu-title">Permisos</li>
                                <li><a <?php if($sPage == "Usuarios") { echo 'class="act_nav" '; }; ?>href="?page=Usuarios">Usuarios</a></li>
                                <!--<li><a <?php if($sPage == "Configuracion") { echo 'class="act_nav" '; }; ?>href="?page=Configuracion">Configuracion</a></li>-->
                                
                                
                            </ul>
                        </li>
                        <?php }?>
                        
                    </ul>
                </div>
                <div class="menu_toggle">
                    <span class="icon_menu_toggle">
                        <i class="arrow_carrot-2left toggle_left"></i>
                        <i class="arrow_carrot-2right toggle_right" style="display:none"></i>
                    </span>
                </div>
            </nav>