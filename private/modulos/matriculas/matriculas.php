<?php
include '../../config/config.php';
extract($_REQUEST);
$matricula = isset($matricula) ? $matricula : '[]';
$accion = isset($accion) ? $accion : '';
$class_matricula = new Matricula($conexion);
print_r($class_matricula->recibir_datos($matricula));

class Matricula{
    private $datos=[], $db;
    public $respuesta = ['msg'=>'ok'];

    public function __construct($db){
        $this->db=$db;
    }
    public function recibir_datos($matricula){
        $this->datos = json_decode($matricula, true);
        return $this->validar_datos();
    }
    private function validar_datos(){
        // if( empty($this->datos['idMatricula']) ){
        //     $this->respuesta['msg'] = 'NO se ha espesificado un ID';
        // }
        // if( empty($this->datos['codigo']) ){
        //     $this->respuesta['msg'] = 'Por favor ingrese un codigo de matricula, el codigo es un numero de 3 digitos';
        // }
        // if( empty($this->datos['nombre']) ){
        //     $this->respuesta['msg'] = 'Por favor digite su nombre';
        // }
        return $this->administrar_matricula();
    }
    private function administrar_matricula(){
        global $accion;
        if( $this->respuesta['msg'] == 'ok' ){
            if($accion=='nuevo'){
                $this->db->consultas('
                    INSERT INTO matriculas(idMatricula, fecha,idAlumno,nombreAlumno) VALUES(?,?,?,?)',
                    $this->datos['idMatricula'],$this->datos['fecha'], $this->datos['matricula']['id'],$this->datos['matricula']['label']
                );
                return $this->db->obtener_respuesta();
            }else if($accion=='modificar'){
                $this->db->consultas('
                    UPDATE matriculas SET codigo=?,nombre=? WHERE idMatricula=?',
                    $this->datos['codigo'], $this->datos['nombre'], $this->datos['idMatricula']
                );
                return $this->db->obtener_respuesta();
            }else if($accion=='eliminar'){
                $this->db->consultas('
                    DELETE matriculas 
                    FROM matriculas
                    WHERE idMatricula=?', $this->datos['idMatricula']
                );
                return $this->db->obtener_respuesta();
            }
        }else{
            return $this->respuesta;
        }
    }
}
?>