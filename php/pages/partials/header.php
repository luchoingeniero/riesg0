


            <!-- header class="topBar_style_12" -->
            <header id="main_header"  >
                <div class="container-fluid">
                    <div class="brand_section">
                        <a href="home.php">
                        <img src="assets/img/logo.png" alt="site_logo"  height="50"></a>
                    </div>
                   
                    <div class="header_user_actions dropdown">
                        <div data-toggle="dropdown" class="dropdown-toggle user_dropdown">
                            <div class="user_avatar" style="padding:10px;">
                            <strong style="color:white;"><?php echo $_SESSION['User']->login."(".$_SESSION['User']->role->descripcion.")" ?></strong>
                           
                            </div>
                            <span class="caret"></span>
                        </div>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="#" data-toggle="modal" data-target="#FormModalPerfil" >Mi Perfil</a></li>
                            <li><a href="?page=logout">Salir</a></li>
                        </ul>
                    </div>
                    
                </div>
            </header>
