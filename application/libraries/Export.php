<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');


class Export{
    
    function to_excel($array, $dirname) {
        header('Content-type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename='.$filename.'.xls');

        $h = array();
        foreach($array->result_array() as $row){
            foreach($row as $key=>$val){
                if(!in_array($key, $h)){
                 $h[] = $key;   
                }
			}
		}
		$a="" ;
		//echo the entire table headers
		$a.= '<table><tr>';
		foreach($h as $key) {
			$key = ucwords($key);
			$a.= '<th>'.$key.'</th>';
		}
	   $a.= '</tr>';
		
		foreach($array->result_array() as $row){
			 $a.= '<tr>';
			foreach($row as $val)
		$a.= '<td>'.utf8_decode($val).'</td>';              
		}
		$a.= '</tr>';
		$a.= '</table>';
		$filepath=$dirname.time().".xls" ;
            write_file(APPPATH."../".$filepath,$a) ;
			return $filepath ;
        }
   
}
?>