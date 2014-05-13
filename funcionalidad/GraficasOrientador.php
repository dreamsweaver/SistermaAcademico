<?php
//require_once "constantes.php";
require_once "../cgi-bin/Conexion.php";
require_once "../FusionCharts/fusionCharts.php";
require_once "../FusionCharts/Functions.php";
require_once "../Graficas.php";
require_once "ConsultasGenerales.php";

class GraficasOrientador {
	private $_con;
	private $_chart;
	private $_gen;
	
	public function __construct(){
		$this->_con = new Conexion;
		$this->_chart = new Graficas;
		$this->_con->conectar();
	}
	
	public function compararNotasGrado($grado,$curso,$seccion){
		$tot = $this->_con->consulta("select *, avg(nota_record) as suma_nota from record_notas where grado_record = '".$grado."' and seccion_record = '".$seccion."' and curso_record = '".$curso."' group by materia_record order by id_record desc","Error al selecciona datos de los alumnos");
		
		$datos = "";
		while($row = $this->_con->valores($tot)){
			$materia = $row['materia_record'];
			$suma = $row['suma_nota'];
			
			$datos .= "<set label='".$materia."' value='".$suma."'/>";
		}
		
		$titulo = "Comparación (promedio) entre alumnos de ".$grado." grado";
		$subtitulo = "de la seccion ".$seccion." para el curso".$curso;

		return $this->_chart->graficaLineal2d($datos,$titulo,$subtitulo,'10','');
	}
	
	public function rendimientoAlumno($idAlumno,$curso,$grado,$seccion){
		$grad = $this->_con->consulta("select *, avg(nota_record) as suma_nota from record_notas where grado_record = '".$grado."' and seccion_record = '".$seccion."' and curso_record = '".$curso."' group by materia_record order by id_record desc","Error al selecciona datos de los alumnos");
		
		$alumno = $this->_con->consulta("select *, avg(nota_record) as suma_nota from record_notas where alumno_record = '".$idAlumno."' and grado_record = '".$grado."' and seccion_record = '".$seccion."' and curso_record = '".$curso."' group by materia_record order by id_record desc","Error al selecciona al alumno");
		
		
		$datos = "";
		$cats = "";
		$datos .=  "<dataset seriesName='Todos los alumnos' renderAs='Area'>";
		while($row = $this->_con->valores($grad)){
			$materia = $row['materia_record'];
			$suma = $row['suma_nota'];
			
			$cats .= "<category label='".$materia."' />";
			$datos .= "<set label='".$materia."' value='".$suma."'/>";
		}
		$datos .= "</dataset>";
		
		$datos .=  "<dataset seriesName='Alumno comparado' renderAs='Area'>";
		while($row = $this->_con->valores($alumno)){
			$materia = $row['materia_record'];
			$suma = $row['suma_nota'];
			
			$datos .= "<set label='".$materia."' value='".$suma."'/>";
		}
		$datos .= "</dataset>";
		
		$titulo = "Comparación (promedio) entre alumnos de ".$grado." grado";
		
		return $this->_chart->graficaArea3d($cats,$datos,$titulo,'Materia','Nota');
	}
}

echo '
<head>
<script type="text/javascript" src="../template/js/jquery.js"></script>
<script type="text/javascript" src="../FusionCharts/Charts/FusionCharts.js"></script>
<script type="text/javascript" src="../FusionCharts/Charts/FusionChartsExportComponent.js"></script>
</head><body>';

$graf = new GraficasOrientador();
echo $graf->compararNotasGrado('6','2014','2');
echo $graf->rendimientoAlumno('as5698','2014','6','2');
echo '</body>';