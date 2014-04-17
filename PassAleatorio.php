<?php
	/* clase que contiene funcion que genera un pass de manera Aleatoria, pertenece a la capa de funcionalidad */ 
	
class  PassAleatorio{
	
	public function randomPass() 
	{
		$strPass = '';
		 for($i = 0 ; $i < 6 ; $i++)
		  {
			   $randNum = rand(0 , 40); 
			   switch ($randNum) 
			   { 
			   	case 10: $randNum = 'A'; 
					break; 
				case 11: $randNum = 'B'; 
					break;
				case 12: $randNum = 'C'; 
				 	break; 
				case 13: $randNum = 'D'; 
					break; 
				case 14: $randNum = 'E'; 
					break; 
				case 15: $randNum = 'F'; 
					break; 
				case 16: $randNum = 'G';
					break;
				case 17: $randNum = 'H';
					break;
				case 18: $randNum = 'I';
					break;
				case 19: $randNum = 'J';
					break;
				case 20: $randNum = 'K';
					break;
				case 21: $randNum = 'L';
					break; 
				case 22: $randNum = 'M';
					break;
				case 23: $randNum = 'N';
					break;
				case 24: $randNum = 'O';
					break;
				case 25: $randNum = 'P';
					break;
				case 26: $randNum = 'Q';
					break;
				case 27: $randNum = 'R';
					break;
				case 28: $randNum = 'S';
					break;
				case 29: $randNum = 'T';
					break;
				case 30: $randNum = 'U';
					break;
				case 31: $randNum = 'V';
					break;
				case 32: $randNum = 'W';
					break;
				case 33: $randNum = 'X';
					break;
				case 34: $randNum = 'Y';
					break;
				case 35: $randNum = 'Z';
					break;
				case 36: $randNum = '#';
					break;
				case 37: $randNum = '@';
					break;
				case 38: $randNum = '!';
					break;
				case 39: $randNum = '&';
					break;
				case 40: $randNum = '$';
					break;
				} 
				$strPass .= $randNum; 
			} 
		return $strPass; 
	}

}
/*
//para probar los password aleatorios creados
$pass = new PassAleatorio();
echo $pass->randomPass();
*/
?>