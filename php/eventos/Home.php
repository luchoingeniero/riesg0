<?php 
if ($sPage == "dashboard") {
        $obj=new Controller();
        //$includePage = 'php/pages/dashboard_'.$_SESSION['User']->role_id.'.php';
        $includePage = 'php/pages/dashboard.php';
        $municipios_list=$obj->BuscarCensosMunicipios();
     $municipio_js=array();
     $colores=array( '1'=>'#FF69B4',
                     '2'=>'#4169E1',
                     '3'=> '#23E86B',
                     '4'=> '#109604',
                     '5'=> '#0865AC',);

     foreach ($municipios_list as $key => $mun) {
        $color=rand(1,5);
        $mun->color=$colores[$color];
        $municipios_list[$key]=$mun;
        $municipio_js[$mun->codigo_dep.''.$mun->codigo]=$color;
        


     }

        $script = '
            <!-- c3 charts -->
            <script src="assets/lib/d3/d3.min.js"></script>
            <script src="assets/lib/c3/c3.min.js"></script>
            <!-- vector maps -->
            <script src="assets/lib/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
            <script src="assets/lib/jvectormap/maps/jquery-jvectormap-world-mill-en.js"></script>
            <script src="assets/lib/jvectormap/maps/jvectormap.cordoba.js"></script>
            <!-- countUp animation -->
            <script src="assets/js/countUp.min.js"></script>
            <!-- easePie chart -->
            <script src="assets/lib/easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
             <script src="assets/js/dashboard.js"></script>

            <script>
                $(function() {
                    var municipios_js_mapa='.(json_encode($municipio_js)).';
                    var colores_js_mapa='.(json_encode($colores)).';
                    // c3 charts
                    //yukon_charts.p_dashboard();
                    // countMeUp
                   yukon_count_up.init();
                    // easy pie chart
                    //yukon_easyPie_chart.p_dashboard();
                    // vector maps
                    yukon_vector_maps.p_dashboard(colores_js_mapa,municipios_js_mapa);
                    // match height
                    //yukon_matchHeight.p_dashboard();
                })
            </script>
        ';
     
     

    }
 if($sPage=="BuscarCensosIntegrantesEdades"){
    $obj=new Controller();
    echo json_encode($obj->BuscarCensosIntegrantesEdades());
    exit(0);
 }   

    ?>