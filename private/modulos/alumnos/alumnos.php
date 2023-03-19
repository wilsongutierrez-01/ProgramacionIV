<?php
include '../../config/config.php';
extract($_REQUEST);
$alumno = isset($alumno) ? $alumno : '[]';
$accion = isset($accion) ? $accion : '';
$class_alumno = new Alumno($conexion);
print_r($class_alumno->recibir_datos($alumno));

class Alumno{
    private $datos=[], $db;
    public $respuesta = ['msg'=>'ok'];

    public function __construct($db){
        $this->db=$db;
    }
    public function recibir_datos($alumno){
        $this->datos = json_decode($alumno, true);
        return $this->validar_datos();
    }
    private function validar_datos(){
        if( empty($this->datos['idAlumno']) ){
            $this->respuesta['msg'] = 'NO se ha espesificado un ID';
        }
        if( empty($this->datos['codigo']) ){
            $this->respuesta['msg'] = 'Por favor ingrese un codigo de alumno, el codigo es un numero de 3 digitos';
        }
        if( empty($this->datos['nombre']) ){
            $this->respuesta['msg'] = 'Por favor digite su nombre';
        }
        return $this->administrar_alumno();
    }
    private function administrar_alumno(){
        global $accion;
        if( $this->respuesta['msg'] == 'ok' ){
            if($accion=='nuevo'){
                $this->db->consultas('
                    INSERT INTO alumnos(idAlumno,codigo,nombre,direccion,municipio,departamento,telefono,fechaNacimiento,sexo) VALUES(?,?,?,?,?,?,?,?,?)',
                    $this->datos['idAlumno'],$this->datos['codigo'], $this->datos['nombre'],$this->datos['direccion'],$this->datos['municipio'],$this->datos['departamento'],$this->datos['telefono'],
                    $this->datos['fechaNacimiento'],$this->datos['sexo']
                );
                return $this->db->obtener_respuesta();
            }else if($accion=='modificar'){
                $this->db->consultas('
                    UPDATE alumnos SET codigo=?,nombre=? WHERE idAlumno=?',
                    $this->datos['codigo'], $this->datos['nombre'], $this->datos['idAlumno']
                );
                return $this->db->obtener_respuesta();
            }else if($accion=='eliminar'){
                $this->db->consultas('
                    DELETE alumnos 
                    FROM alumnos
                    WHERE idAlumno=?', $this->datos['idAlumno']
                );
                return $this->db->obtener_respuesta();
            }
        }else{
            return $this->respuesta;
        }
    }
}
?>