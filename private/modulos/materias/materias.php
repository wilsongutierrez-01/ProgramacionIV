<?php
include '../../config/config.php';
extract($_REQUEST);
$materia = isset($materia) ? $materia : '[]';
$accion = isset($accion) ? $accion : '';
$class_materia = new Materia($conexion);
print_r($class_materia->recibir_datos($materia));

class Materia{
    private $datos=[], $db;
    public $respuesta = ['msg'=>'ok'];

    public function __construct($db){
        $this->db=$db;
    }
    public function recibir_datos($materia){
        $this->datos = json_decode($materia, true);
        return $this->validar_datos();
    }
    private function validar_datos(){
        if( empty($this->datos['idMateria']) ){
            $this->respuesta['msg'] = 'NO se ha espesificado un ID';
        }
        if( empty($this->datos['codigo']) ){
            $this->respuesta['msg'] = 'Por favor ingrese un codigo de materia, el codigo es un numero de 3 digitos';
        }
        if( empty($this->datos['nombre']) ){
            $this->respuesta['msg'] = 'Por favor digite su nombre';
        }
        return $this->administrar_materia();
    }
    private function administrar_materia(){
        global $accion;
        if( $this->respuesta['msg'] == 'ok' ){
            if($accion=='nuevo'){
                $this->db->consultas('
                    INSERT INTO materias(idMateria,codigo,nombre) VALUES(?,?,?)',
                    $this->datos['idMateria'],$this->datos['codigo'], $this->datos['nombre']
                );
                return $this->db->obtener_respuesta();
            }else if($accion=='modificar'){
                $this->db->consultas('
                    UPDATE materias SET codigo=?,nombre=? WHERE idMateria=?',
                    $this->datos['codigo'], $this->datos['nombre'], $this->datos['idMateria']
                );
                return $this->db->obtener_respuesta();
            }else if($accion=='eliminar'){
                $this->db->consultas('
                    DELETE materias 
                    FROM materias
                    WHERE idMateria=?', $this->datos['idMateria']
                );
                return $this->db->obtener_respuesta();
            }
        }else{
            return $this->respuesta;
        }
    }
}
?>