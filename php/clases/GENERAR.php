<?php
            $listar = null;
            $directorio = opendir("../../assets/js/controllers/app");
            $archivos=array();
            $str_clase='';
          
            while($elemento = readdir($directorio))
            {
                if($elemento != '.' && $elemento != '..')
                {

                
                $clase=ucfirst(strtolower(str_replace('.js','', $elemento)));
                $fp = fopen($clase.".php", 'w+');    
                fwrite($fp,"<?php \r\n");
                fwrite($fp," class ".$clase." extends Controller{\r\n");
                fwrite($fp," var "."$"."modelo='".$clase."';\r\n");
                fwrite($fp," var "."$"."campos=array(array('campo1','campo1'));\r\n");
                fwrite($fp," var "."$"."campos_form=array(array('campo1','campo1'));\r\n");
                fwrite($fp," var "."$"."descripcion_modelo='descripcion';\r\n");
                fwrite($fp,"}\r\n");
                fwrite($fp,"?>\r\n");
                fclose($fp);
                                  
                        
                
                }
            }





            

        ?>