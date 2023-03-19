<?php
class DB_Conexion{
    private $conexion, $result, $preparado;

    public function __construct($server, $user, $pass){
        $this->conexion = new PDO($server, $user, $pass, 
            array(PDO::ATTR_EMULATE_PREPARES=>false, 
            PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION)) or die('No se pudo conctar a la BD');
    }
    public function consultas($sql=''){
        try{
            $parametros = func_get_args();//obtener la lista de parametros...
            array_shift($parametros);//quitamos el primer elemento porque es la consulta...
            
            $this->preparado = $this->conexion->prepare($sql);
            $this->result = $this->preparado->execute($parametros);
        }catch(Exception $e){
            echo 'Error al ejecutar la consulta '. $e->getMessage();
        }
    }
    public function obtener_datos(){
        return $this->preparado->fetchAll(PDO::FETCH_ASSOC);
    }
    public function obtener_respuesta(){
        return $this->result;
    }
}
?>