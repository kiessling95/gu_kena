<?php
class dt_lista_rector extends gu_kena_datos_tabla
{
    function get_listas_a_votar($id_acta){
            $sql = "SELECT t_l.id_nro_lista, 
                           t_l.nombre 
                    FROM lista_rector t_l
                    WHERE t_l.fecha = (SELECT max(id_fecha) FROM acto_electoral)"
                    . " order by t_l.id_nro_lista";
                    
            return toba::db('gu_kena')->consultar($sql);
        }
    
    function get_listas($fecha, $id_claustro = null){
            //Todos los claustros
            $sql = "SELECT id_nro_lista, nombre, sigla FROM lista_rector "
                    . "WHERE fecha = '$fecha' "
                    . "  order by nombre"; 
            return toba::db('gu_kena')->consultar($sql);
        }
}
?>