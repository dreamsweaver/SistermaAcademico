<?php
include_once "FusionCharts/fusionCharts.php";
include_once "FusionCharts/Functions.php";
/*
Pertenece a la capa de interfaz

En esta clase haremos caso omiso a lo que Zend nos indica con los nombres de variables.
En este caso los parametros que tengan un valor predefinido tendrán el gión bajo antes del nombre, ejemplo: $_algundato
Para que no se generen errores de Javascript al interpretar el XML no hay que dejar tabulaciones al identar
*/
class Graficas{
	/*
	Este metodo crea una gráfica de barras verticales en 2D
	$datos es una cadena String que contiene en formato xml los datos para generar
	$tituloY y $tituloP son valores Strings
	$prefijo es el valor o simbolo que llevará antes que los muneros mostrados en la gráfica
	$redondeo es un valor booleano para saber si se redondearán los valores numericos
	$_bg son 1 o 2 valores de color Hexadecimal separados por comas, si lleva 2 valores este será una gradiente
	*/
	public function graficaBarras2d($datos,$tituloY,$tituloP,$prefijo,$redondeo,$_bg = 'FFFFFF,FFFFFF',$_borde = '0'){
		$chart = "<chart yAxisName='".$tituloY."' caption='".$tituloP."' numberPrefix='".$prefijo."' useRoundEdges='".$redondeo."' bgColor='".$_bg."' showBorder='".$_borde."' animation='1'>";
		$chart .= $datos;
		$chart .= '</chart>';
		return renderChart("FusionCharts/Charts/Column2D.swf", "",($chart), "chartb2d", 600, 300, false, true);
	}
	
	/*
	Este metodo crea una gráfica de barras verticales en 3D
	$datos es una cadena String que contiene en formato xml los datos para generar
	$tituloY y $tituloP son valores Strings
	$prefijo es el valor o simbolo que llevará antes que los muneros mostrados en la gráfica
	$_borde es un valor booleano para saber si tendrá un borde o no las barras
	*/
	public function graficaBarras3d($datos,$tituloY,$tituloP,$prefijo,$_borde = '0'){
		$chart = "<chart yAxisName='".$tituloY."' caption='".$tituloP."' numberPrefix='".$prefijo."' showBorder='".$_borde."' bgColor='FFFFFF,ffffff' animation='1'>";
		$chart .= $datos;
		$chart .= "</chart>";
		return renderChart("FusionCharts/Charts/Column3D.swf", "",($chart), "chartb3d", 600, 300, false, true);
	}
	
	/*
	Este metodo crea una gráfica de pastel en 2D
	$datos es una cadena String que contiene en formato xml los datos para generar
	$tituloP son valores Strings
	$_porcentaje,$_valor,$_etiquetas,$_leyenda son valores booleanos
	*/
	public function graficaPastel2d($datos,$tituloP,$_bg = 'FFFFFF,FFFFFF',$_border = '0',$_porcentaje = '1',$_valores = '0',$_etiquetas = '0', $_leyenda = '1'){
		$chart = "<chart caption='".$tituloP."' showPercentageInLabel='".$_porcentaje."' showValues='".$_valores."' showLabels='".$_etiquetas."' showLegend='".$_leyenda."' bgColor='".$_bg."' showBorder='".$_border."' animation='1'>";
		$chart .= $datos;
		$chart .= "</chart>";
		return renderChart("FusionCharts/Charts/Pie2D.swf", "",($chart), "chartp2d", 600, 300, false, true);
	}
	
	/*
	Este metodo crea una gráfica de pastel en 3D
	$datos es una cadena String que contiene en formato xml los datos para generar
	$tituloP,$subTitulo son valores Strings
	$prefijo es un valor String que llevará antes de cada numero de la gráfica
	$_animacion,$_valor,$_etiquetas,$_leyenda,$_toolTips,$_escala son valores booleanos
	$_paleta es un valor integer
	*/
	public function graficaPastel3d($datos,$tituloP,$subTituloP,$prefijo,$_bg = 'FFFFFF,FFFFFF',$_paleta = '2',$_animacion = '1',$_valores = '1',$_escala = '1',$_toolTip = '1',$_etiquetas = '1',$_leyenda = '1',$_border = '0'){
		
		$chart = "<chart caption='".$tituloP."' palette='".$_paleta."' animation='".$_animacion."' subCaption='".$subTituloP."' showValues='".$_valores."' numberPrefix='".$prefijo."' formatNumberScale='".$_escala."' showPercentInToolTip='".$_toolTip."' showLabels='".$_etiquetas."' showLegend='".$_leyenda."' bgColor = '".$_bg."' showBorder='".$_border."'>";
		$chart .= $datos;
		$chart .= "<styles><definition><style type='font' name='CaptionFont' color='666666' size='15' /><style type='font' name='SubCaptionFont' bold='0' /></definition><application><apply toObject='caption' styles='CaptionFont' /><apply toObject='SubCaption' styles='SubCaptionFont' /></application></styles></chart>";
			
		return renderChart("FusionCharts/Charts/Pie3D.swf", "",($chart), "chartp3d", 600, 300, false, true);
	}
	
	/*
	Este metodo crea una gráfica de Dona en 2D
	$datos es una cadena String que contiene en formato xml los datos para generar
	$tituloP es valor String
	$prefijo es un valor String que llevará antes de cada numero de la gráfica
	$_bg es valor o valores hexadecimales, si lleva 2 valores será un degradado, estos valores deben estar separados por comas
	$_porcentaje,$_valor,$_etiquetas,$_leyenda,$_linea son valores booleanos
	$_borderColor es un valor hexadecimal
	*/
	public function graficaDona2d($datos,$tituloP,$prefijo,$_bg = 'FFFFFF,FFFFFF',$_porcentaje = '1',$_bordeColor = 'FFFFFF',$_linea = '0',$_valor = '1', $_etiqueta = '1', $_leyenda = '1',$_border = '0'){
		$chart = "<chart caption='".$tituloP."' bgColor='".$_bg."' showPercentageValues='".$_porcentaje."' plotBorderColor='".$_bordeColor."' numberPrefix='".$prefijo."' isSmartLineSlanted='".$_linea."' showValues='".$_valor."' showLabels='".$_etiqueta."' showLegend='".$_leyenda."' showBorder='".$_border."' animation='1'>";
        $chart .= $datos;
		$chart .= "</chart>";
		
		return renderChart("FusionCharts/Charts/Doughnut2D.swf", "",($chart), "chartd2d", 600, 300, false, true);
	}
	
	/*
	Este metodo crea una gráfica de Dona en 3D
	$datos es una cadena String que contiene en formato xml los datos para generar
	$tituloP es valor String
	$_sufijo es un valor String que llevará despues de cada numero de la gráfica
	$_bg es valor o valores hexadecimales, si lleva 2 valores será un degradado, estos valores deben estar separados por comas
	$_escala, $_alpha, $_innerAlpha, $_distancia, $_angulo son valores integer
	$_smartEtiqueta, $_valor,$_etiquetas,$_leyenda,$_borde son valores booleanos
	$_borderColor es un valor hexadecimal
	*/
	public function graficaDona3d($datos,$tituloP,$_sufijo = '%',$_bg = 'FFFFFF,FFFFFF',$_escala = '30',$_alpha = '80',$_innerAlpha = '60',$_distancia = '35',$_angulo = '190',$_smartEtiqueta = '1',$_borde = '0',$_valor = '1',$_etiqueta = '1',$_leyenda = '1'){
		
		$chart = "<chart caption='".$tituloP."' bgColor='".$_bg."' pieYScale='".$_escala."' plotFillAlpha='".$_alpha."' pieInnerfaceAlpha='".$_innerAlpha."' slicingDistance='".$_distancia."' startingAngle='".$_angulo."' enableSmartLabels='".$_smartEtiqueta."' numberSuffix='".$_sufijo."' showBorder='".$_borde."' showValues='".$_valor."' showLabels='".$_etiqueta."' showLegend='".$_leyenda."' animation='1'>";
		$chart .= $datos;
		$chart .= "</chart>";
		
		return renderChart("FusionCharts/Charts/Doughnut3D.swf", "",($chart), "chartd3d", 600, 300, false, true);
	}
	
	/*
	Este metodo crea una gráfica lineal en 2D
	$datos es una cadena String que contiene en formato xml los datos para generar
	$titulo y $subtitulo es valor String
	$valoraMaximoY, $_niveles, $_lineaAlpha, $_anchorBorder, $_radio y $_alturaAlpha son valores numéricos
	$_sufijo es un valor String que llevará despues de cada numero de la gráfica
	$_bg, $_colorFuente, $_canvasBorderColor, $_colorLinea, $_toolTipColor, $_toolTipBorderColor, $_colorAncla y $_colorBorderAncla son valores hexadecimales, si $_bg lleva 2 valores será un degradado, estos valores deben estar separados por comas
	$_canvasAlpha, $_alores son valores booleanos
	*/
	public function graficaLineal2d($datos,$titulo,$subtitulo,$valorMaximoY,$_sufijo = '%',$_niveles = '10',$_bg = '406181, 6DA5DB',$_bgAlpha = '100',$_colorFuente = 'FFFFFF',$_canvasAlpha = '0',$_canvasBordeColor = 'FFFFFF',$_colorLinea = 'FFFFFF',$_lineaAlpha = '100',$_radio = '4',$_toolTipColor = '406181',$_toolTipBorderColor = '406181',$_alturaAlpha = '5',$_colorAncla = 'BBDA00',$_colorBordeAncla = 'FFFFFF',$_anchorBorder = '2',$_valores = '1',$_border = '0'){
		
		$chart = "<chart caption='".$titulo."' subCaption='".$subtitulo."' yAxisMaxValue='".$valorMaximoY."' bgColor='".$_bg."'  bgAlpha='".$_bgAlpha."' baseFontColor='".$_colorFuente."' canvasBgAlpha='".$_canvasAlpha."' canvasBorderColor='".$_canvasBordeColor."' divLineColor='".$_colorLinea."' divLineAlpha='".$_lineaAlpha."' numVDivlines='".$_niveles."' vDivLineisDashed='1' showAlternateVGridColor='1' lineColor='".$_colorLinea."' anchorRadius='".$_radio."' anchorBgColor='".$_colorAncla."' anchorBorderColor='".$_colorBordeAncla."' anchorBorderThickness='".$_anchorBorder."' showValues='".$_valores."' numberSuffix='".$_sufijo."' toolTipBgColor='".$_toolTipColor."' toolTipBorderColor='".$_toolTipBorderColor."' alternateHGridAlpha='".$_alturaAlpha."' showBorder='".$_border."' animation='1'>";
		$chart .= $datos;
		$chart .= "<styles> <definition> <style name='LineShadow' type='shadow' color='333333' distance='6'/> </definition> <application> <apply toObject='DATAPLOT' styles='LineShadow' /> </application> </styles> </chart>";
		
		return renderChart("FusionCharts/Charts/Line.swf", "",($chart), "chartl2d", 600, 300, false, true);
	}
	
	/*
	Este metodo crea una gráfica lineal en 2D
	$datos y $categorias son una cadena String que contiene en formato xml los datos para generar
	$titulo y $subtitulo es valor String
	$lineas son el numero de lineas, son ingeger
	$VLineas es un valor integer
	$_tick, $_alphaBgAncla, $_alphaAncla es un valor integer
	$_escala, $_valores, $_stanLabels, $_vGridColor y $_animacion son valores booleanos
	*/
	public function graficaLinea2dMultiple($categorias,$datos,$titulo,$subtitulo,$lineas,$vLineas,$_bg = 'FFFFFF,FFFFFF',$_thick = '2',$_valores = '0',$_escala = '1',$_slantLabels = '1',$_radioAncla = '2',$_alphaBgAncla = '50',$_vGridColor = '1',$_alphaAncla = '100',$_animacion = '1',$_presicionD = '0',$_presicionLineal = '1',$_border = '0'){
		
		$chart = "<chart caption='".$titulo."' subCaption='".$subtitulo."' numdivlines='".$lineas."' lineThickness='".$_thick."' showValues='".$_valores."' numVDivLines='".$vLineas."' formatNumberScale='".$_escala."' labelDisplay='ROTATE' slantLabels='".$_slantLabels."' anchorRadius='".$_radioAncla."' anchorBgAlpha='".$_alphaBgAncla."' showAlternateVGridColor='".$_vGridColor."' anchorAlpha='".$_alphaAncla."' animation='".$_animacion."' limitsDecimalPrecision='".$_presicionD."' divLineDecimalPrecision='".$_presicionLineal."' bgColor='".$_bg."' showBorder='".$_border."'>";
		
		$chart .= "<categories>";
		$chart .= $categorias;
		$chart .= "</categories>";
		$chart .= $datos;
		$chart .= "</chart>";
		
		return renderChart("FusionCharts/Charts/MSLine.swf", "",($chart), "chartml2d", 600, 300, false, true);
	}
	
	/*
	Este metodo crea una gráfica lineal en 3D
	$datos y $categoria son una cadena String que contiene en formato xml los datos para generar
	$titulo, $nombreEjeX, $nombreEjeY y $nombreSerie son valores String
	$prefijo es el carcater que llevará antes de los numeros de la grafica
	$_bgColor, $_canvasFontColor, $_alternateVGridColor, $_divLineColor, $_baseFontColor y $_vDivLineColor son valorse hexadecimales para el color
	$lineas son el numero de lineas, son ingeger
	$_plotFillAlpha, $_numeroLineasVerticales, $_starAngleX, $_endAngleX, $_startAngleY, $_endAngleY, $_zGapPlot, $_zDepth y $_exeTime son valores integer
	$_VGridAlternate, $_canvasBorderTickness, $_showPlotBorder, $_plotBorderTickness y $_labelsson valores booleanos
	*/
	public function graficaLineal3d($categorias,$datos,$titulo,$nombreEjeX,$nombreEjeY,$prefijo = '',$_bgColor = 'FFFFFF',$_canvasFontColor = '333333',$_labels = '0',$_plotFillAlpha = '70',$_numeroLineasVerticales = '10',$_VGridAlternate = '1', $_alternateVGridColor = 'a1f5ff',$_divLineColor = 'a1f5ff',$_baseFontColor = '333333',$_vDivLineColor = 'a1f5ff',$_canvasBorderThickness = '1',$_showPlotBorder = '0',$_plotBorderThickness = '0',$_startAngX = '7',$_endAngX = '7',$_startAngY = '-18',$_endAngY = '-18',$_zGapPlot = '20',$_zDepth = '60',$_exeTime = '2',$_showValues = '1',$_border = '0'){
		
		$chart = "<chart bgColor='".$_bgColor."' outCnvBaseFontColor='".$_canvasFontColor."' caption='".$titulo."'  xAxisName='".$nombreEjeX."' yAxisName='".$nombreEjeY."' numberPrefix='".$prefijo."' showLabels='".$_labels."' showValues='".$_showValues."' plotFillAlpha='".$_plotFillAlpha."' numVDivLines='".$_numeroLineasVerticales."' showAlternateVGridColor='".$_VGridAlternate."' AlternateVGridColor='".$_alternateVGridColor."' divLineColor='".$_divLineColor."' vdivLineColor='".$_vDivLineColor."'  baseFontColor='".$_baseFontColor."' canvasBorderThickness='".$_canvasBorderThickness."' showPlotBorder='".$_showPlotBorder."' plotBorderThickness='".$_plotBorderThickness."' startAngX='".$_startAngX."' endAngX='".$_endAngX."' startAngY='".$_startAngY."' endAngY='".$_endAngY."' zgapplot='".$_zGapPlot."' zdepth='".$_zDepth."' exeTime='".$_exeTime."' showBorder='".$_border."' animation='1'>";
		$chart .= "<categories>";
		$chart .= $categorias;
		$chart .= "</categories>";
		$chart .= $datos;
		$chart .= "<styles> <definition> <style name='captionFont' type='font' size='15' /> </definition> <application> <apply toObject='caption' styles='captionfont' /> </application> </styles> </chart>";
		
		return renderChart("FusionCharts/Charts/MSCombi3D.swf", "",($chart), "chartl3d", 600, 300, false, true);
	}
	
	/*
	Este metodo crea una gráfica lineal en 3D
	$datos y $categoria son una cadena String que contiene en formato xml los datos para generar
	$titulo, $nombreEjeX, $nombreEjeY y $nombreSerie son valores String
	$prefijo es el carcater que llevará antes de los numeros de la grafica
	$_bgColor, $_canvasFontColor, $_alternateVGridColor, $_divLineColor, $_baseFontColor y $_vDivLineColor son valorse hexadecimales para el color
	$lineas son el numero de lineas, son ingeger
	$_plotFillAlpha, $_numeroLineasVerticales, $_starAngleX, $_endAngleX, $_startAngleY, $_endAngleY, $_zGapPlot, $_zDepth y $_exeTime son valores integer
	$_VGridAlternate, $_canvasBorderTickness, $_showPlotBorder, $_plotBorderTickness y $_labelsson valores booleanos
	*/
	public function graficaArea2d($datos,$tituloY,$numberSufix,$_showValues = '0',$_numDivLines = '0',$_canvasBorderAlpha = '0',$_canvasBgAlpha = '1',$_numVDivLines = '5', $_plotGradientColor = '0000FF',$_anchorRadius = '2',$_anchorBorderColor = '004080',$_anchorBgColor = '004080',$_anchorBgAlpha = '50',$_anchorBorderThickness = '0',$_drawAnchors = '0',$_plotFillAngle = '90',$_plotFillAlpha = '63',$_vDivLineAlpha = '22',$_vDivLineColor = '666666',$_bgColor = 'FFFFFF',$_showPlotBorder = '0',$_borderColor = '9DBCCC',$_borderAlpha = '100',$_canvasBgRatio = '0',$_baseFontColor = '37444A',$_baseFontSize = '8',$_outCnvBaseFontColor = '37444A',$_outCnvBaseFontSize = '11',$_showYAxisValues = '0',$_bgSwAlpha = '100',$_animation = '1',$_border = '0'){
		
		$chart = "<chart showvalues='".$_showValues."' yaxisname='".$tituloY."' numdivlines='".$_numDivLines."' canvasborderalpha='".$_canvasBorderAlpha."' canvasbgalpha='".$_canvasBgAlpha."' numvdivlines='".$_numVDivLines."' plotgradientcolor='".$_plotGradientColor."' anchorradius='".$_anchorRadius."' anchorbordercolor='".$_anchorBorderColor."' anchorbgcolor='".$_anchorBgColor."' anchorbgalpha='".$_anchorBgAlpha."' anchorborderthickness='".$_anchorBorderThickness."' drawanchors='".$_drawAnchors."' plotfillangle='".$_plotFillAngle."' plotfillalpha='".$_plotFillAlpha."' vdivlinealpha='".$_vDivLineAlpha."' vdivlinecolor='".$_vDivLineColor."' bgcolor='".$_bgColor."' showplotborder='".$_showPlotBorder."' numbersuffix='".$numberSufix."' bordercolor='".$_borderColor."' borderalpha='".$_borderAlpha."' canvasbgratio='".$_canvasBgRatio."' basefontcolor='".$_baseFontColor."' basefontsize='".$_baseFontSize."' outcnvbasefontcolor='".$_outCnvBaseFontColor."' outcnvbasefontsize='".$_outCnvBaseFontSize."' showyaxisvalues='".$_showYAxisValues."' bgswfalpha='".$_bgSwAlpha."' animation='".$_animation."' showBorder='".$_border."'>";
		$chart .= $datos;
 		$chart .= "</chart>";
		
		return renderChart("FusionCharts/Charts/Area2D.swf", "",($chart), "charta2d", 600, 300, false, true);
	}
	
	public function graficaArea3d($categorias,$datos,$titulo,$tituloX,$tituloY,$_prefijo = '',$_showLabels = '1',$_showValues = '0',$_bgColor = 'ffffff',$_plotFillAlpha = '70',$_numVDivLines = '10',$_showAlternateVGridColor = '1',$_alternateVGridColor = 'e1f5ff',$_divLineColor = 'e1f5ff',$_vDivLineColor = 'e1f5ff',$_baseFontColor = '666666',$_canvasBorderTickness = '1',$_showPlotBorder = '0',$_plotBorderThickness = '0',$_startAngleX = '7',$_endAngleX = '7',$_startAngleY = '-18',$_endAngleY = '-18',$_zGapPlot = '30',$_zDepth = '50',$_exeTime = '2',$_outCanvasFontColor = '666666',$_border = '0'){
		
		$chart = "<chart bgColor='".$_bgColor."' outCnvBaseFontColor='".$_outCanvasFontColor."' caption='".$titulo."'  xAxisName='".$tituloX."' yAxisName='".$tituloY."' numberPrefix='".$_prefijo."' showLabels='".$_showLabels."' showValues='".$_showValues."' plotFillAlpha='".$_plotFillAlpha."' numVDivLines='".$_numVDivLines."' showAlternateVGridColor='".$_showAlternateVGridColor."' AlternateVGridColor='".$_alternateVGridColor."' divLineColor='".$_divLineColor."' vdivLineColor='".$_vDivLineColor."'  baseFontColor='".$_baseFontColor."' canvasBorderThickness='".$_canvasBorderTickness."' showPlotBorder='".$_showPlotBorder."' plotBorderThickness='".$_plotBorderThickness."' startAngX='".$_startAngleX."' endAngX='".$_endAngleX."' startAngY='".$_startAngleY."' endAngY='".$_endAngleY."' zgapplot='".$_zGapPlot."' zdepth='".$_zDepth."' exeTime='".$_exeTime."' showBorder='".$_border."' animation='1'>";

		$chart .= "<categories>";
		$chart .= $categorias;
		$chart .= "</categories>";
		$chart .= $datos;
		$chart .= "<styles> <definition> <style name='captionFont' type='font' size='15' /> </definition> <application> <apply toObject='caption' styles='captionfont' /> </application> </styles> </chart>";
		
		return renderChart("FusionCharts/Charts/MSCombi3D.swf", "",($chart), "charta3d", 600, 300, false, true);
	}
	
	public function graficaBarraHorizontal2d($datos,$titulo,$tituloY,$tituloX,$_bg = 'FFFFFF',$_showValues = '1',$_canvasBorderThickness = '1',$_canvasBorderColor = '999999',$_plotFillAngle = '330',$_plotBorderColor = '999999',$_showAlternateVGridColor = '1',$_divLineAlpha = '0',$_border = '0'){
		
		$chart = "<chart caption='".$titulo."' yAxisName='".$tituloY."' xAxisName='".$tituloX."' bgColor='".$_bg."' showValues='".$_showValues."' canvasBorderThickness='".$_canvasBorderThickness."' canvasBorderColor='".$_canvasBorderColor."' plotFillAngle='".$_plotFillAngle."' plotBorderColor='".$_plotBorderColor."' showAlternateVGridColor='".$_showAlternateVGridColor."' divLineAlpha='".$_divLineAlpha."' showBorder = '".$_border."' animation='1'>";
        $chart .= $datos;
		$chart .= "</chart>";
		
		return renderChart("FusionCharts/Charts/Bar2D.swf", "",($chart), "chartbh2d", 600, 300, false, true);
	}
	
	
	public function graficaBarraHorizontal3d($categorias,$datos,$titulo,$prefix,$_palette = '2',$_showLabels = '1',$_showValues = '0',$_showSum = '1',$_decimals = '2',$_useRoundEdges = '1',$_legendBorderAlpha = '0'){
		
		$chart = "<chart palette='".$_palette."' caption='".$titulo."' showLabels='".$_showLabels."' showvalues='".$_showValues."'  numberPrefix='".$prefix."' showSum='".$_showSum."' decimals='".$_decimals."' useRoundEdges='".$_useRoundEdges."' legendBorderAlpha='".$_legendBorderAlpha."' animation='1'>";
		$chart .= "<categories>";
		$chart .= $categorias;
		$chart .= "</categories>";
		$chart .= $datos;
		$chart .= "</chart>";
		
		return renderChart("FusionCharts/Charts/StackedBar3D.swf", "",($chart), "chartbh3d", 600, 300, false, true);
	}
}
/*
Todo lo que se ve abajo de este comentario sirve para probar las graficas generadas por las clases
Es de ver correctamente como funciona cada gráfica, además cada formato está comentado más bajo de este comentario.
*/
?>
<script type="text/javascript" src="template/js/jquery.js"></script>
<script type="text/javascript" src="FusionCharts/Charts/FusionCharts.js"></script>
<script type="text/javascript" src="FusionCharts/Charts/FusionChartsExportComponent.js"></script>
<?php
/*Para grafica de columna 2d
<set label='Alex' value='25000'  /> */
/*Para grafica de Columna 3d
<set label='Alex' value='25000'  /> */
/*Para grafica de pastel 2d
<set value='14.94' label='Weather' color='429EAD'/> */
/*Para grafica de pastel 3d
<set label="Leverling" value="100524" isSliced="0" />*/
/*Para graficar donas 2d
<set value='212000' label='Banners' color='99CC00' alpha='60'/> */
/*Para graficar donas 3d
<set value='28.57' label='Production' color='2675B4' /> */
/*Para graficas Lineas 2d
<set label='Jan' value='34' /> */
/*Para categorias graficas Lineas 3d
<category label='Jan' /> */
/*Para graficar linea 3d
<set value='27400' /> */
/*Graficar Area 2d
<set value="0" label="1880" color="0080C0"/> */
/*Para actegorias de area 3d
<category label='Jan' /> */
/* Para graficar areas 3d
<set value='29800'/> */
/* Para graficar barras horizontales en 2d
<set label='Microsoft' value='56926' toolText='2006 Rank: 2, Country: US'/> */
/*Categorias barras horinzontales 3d
<category label='Product B' />*/
/*Para graficar las barras horizontales en 3d
<set value='20148.82' /> */

//Desde acá comienzan las pruebas
$chart = new Graficas;
$array0 = array('A'=>'8.45','B'=>'9.5','C'=>'5','D'=>'2.45','E'=>'4.5','F'=>'9');
$array = array('A'=>'9.45','B'=>'7.5','C'=>'3','D'=>'5.45','E'=>'1.5','F'=>'10');
$array4 = array('A'=>'8.15','B'=>'5.9','C'=>'8','D'=>'7.55','E'=>'2.9','F'=>'9');
$array2 = array('Cat 1','Cat 2','Cat 3','Cat 4','Cat 5');
$arra3 = array($array,$array0,$array4);
$valbar2d = "";
$valbar3d = "";
$valpas2d = "";
$valpas3d = "";
$valdon2d = "";
$valdon3d = "";
$vallin2d = "";
$valcatlin2d = "";
$valmultilin2d = "";
$valcatlin3d = "";
$vallin3d = "";
$valarea2d = "";
$valcatarea3d = "";
$valarea3d = "";
$valbarh2d = "";
$valcatbarh3d = "";
$valbarh3d = "";
foreach($array as $valor => $key){$valbar2d .= "<set label='".$valor."' value='".$key."'/>";}
foreach($array as $valor => $key){$valbar3d .= "<set label='".$valor."' value='".$key."'/>";}
foreach($array as $valor => $key){$valpas2d .= "<set label='".$valor."' value='".$key."'/>";}
foreach($array as $valor => $key){$valpas3d .= "<set label='".$valor."' value='".$key."'/>";}
foreach($array as $valor => $key){$valdon2d .= "<set label='".$valor."' value='".$key."'/>";}
foreach($array as $valor => $key){$valdon3d .= "<set label='".$valor."' value='".$key."'/>";}
foreach($array as $valor => $key){$vallin2d .= "<set label='".$valor."' value='".$key."'/>";}
foreach($array2 as $valor){$valcatlin2d .= "<category label='".$valor."'/>";}
foreach($array2 as $valor){$valcatlin3d .= "<category label='".$valor."'/>";}
foreach($array as $valor => $key){$valarea2d .= "<set label='".$valor."' value='".$key."'/>";}
foreach($array2 as $valor){$valcatarea3d .= "<category label='".$valor."' />";}
foreach($array as $valor => $key){$valbarh2d .= "<set label='".$valor."' value='".$key."' toolText='".$valor.":".$key."' />";}
foreach($array2 as $valor){$valcatbarh3d .= "<category label='".$valor."' />";}

for ($row = 0; $row < count($arra3); $row++){
    $valmultilin2d .= "<dataset serieName='".($row)."'>";
	foreach($arra3[$row] as $key => $valor){
        $valmultilin2d .= "<set value='".$valor."'/>";
    }
    $valmultilin2d .= "</dataset>";
}

for ($row = 0; $row < count($arra3); $row++){
    $vallin3d .= "<dataset seriesName='".$row."' renderAs='Line'>";
	foreach($arra3[$row] as $key => $valor){
        $vallin3d .= "<set value='".$valor."'/>";
    }
    $vallin3d .= "</dataset>";
}

for ($i = 0; $i < count($arra3); $i++){
	$valarea3d .= "<dataset seriesName='".$i."' renderAs='Area'>";
	foreach($arra3[$i] as $valor => $key){
		$valarea3d .= "<set label='".$valor."' value='".$key."'/>";
	}
	$valarea3d .= "</dataset>";
}

for($i=0;$i<count($arra3);$i++){
	$valbarh3d .= "<dataset showValues='0'>";
	foreach($arra3[$i] as $valor => $key){
		$valbarh3d .= "<set label='".$valor."' value='".$key."' />";
	}
	$valbarh3d .= "</dataset>";
}
echo $chart->graficaBarraHorizontal3d($valcatbarh3d,$valbarh3d,'Titulo Principal','');
echo $chart->graficaBarraHorizontal2d($valbarh2d,'Titulo Principal','Titulo Y','Titulo X');
echo $chart->graficaArea3d($valcatarea3d,$valarea3d,'Titulo Principal','Titulo X','Titulo Y','Serie');
echo $chart->graficaArea2d($valarea2d,'Titulo','-');
echo $chart->graficaLineal3d($valcatlin3d,$vallin3d,'Titulo','Eje X','Eje Y','Valores');
echo $chart->graficaLinea2dMultiple($valcatlin2d,$valmultilin2d,'Titulo','Subtitulo',count($array2),count($array));
echo $chart->graficaLineal2d($vallin2d,'Titulo','SubTitulo','12');
echo $chart->graficaDona3d($valdon3d,'Titulo principal');
echo $chart->graficaDona2d($valdon2d,'Titulo principal','');
echo $chart->graficaPastel2d($valpas2d,'Titulo principal');
echo $chart->graficaPastel3d($valpas3d,'Titulo principal','Subtitulo','');
echo $chart->graficaBarras3d($valbar3d,'Numeros','Titulo Principal','$');
echo $chart->graficaBarras2d($valbar2d,'Numeros','Titulo Princiapal','#','2');
?>