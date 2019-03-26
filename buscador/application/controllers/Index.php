<?php
class Index extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('session');
		 $this->load->model('busqueda');
		 //$this->load->library('excel');
		 $data['rango'] = $this->session->userdata('rango');
	}

	/*public function init(){
		$logueado = $this->session->get_userdata('usuario');
		if(empty($logueado)) {
			redirect('Index/login');
		}
	}*/

	 public function login()
	 {
	 	$usuario = $this->input->post('usuario');
	 	$password = $this->input->post('password');
	 	if(!empty($usuario)){
	 		$this->db->where('usuario', $usuario);
        	$this->db->where('password', md5($password));

           $query = $this->db->get("usuarios");
           $resultado = $query->result_array();
           if(!empty($resultado))  {
           		$newdata = array(
                   'usuario'  => $usuario,
                   'rango' => $resultado[0]['rango']
               );

				$this->session->set_userdata($newdata);
				 
              redirect('Index/index');
           }
	 	}
	 	
	 	$this->load->view('Index/login');
	 }

	 public function index(){
	 	 $logueado = $this->session->userdata('usuario');
		if(empty($logueado)) {
			redirect('Index/login');
		}
		$data['rango'] = $this->session->userdata('rango');
	 	$rut = $this->input->post('rut');
	 	if(!empty($rut)){
	 		//$this->db->select('formateo(fono) as fono,confirmado');
	 		$this->db->like('rut', $rut);
	 		//$this->db->join('personas','personas.rut = fonos.rut','left');
	 		$this->db->order_by('confirmado','DESC');
	 		$query = $this->db->get("fonos");
	 		$fonos = $query->result_array();
	 		//$razon_social = getRazonSocial(25272254,8);
	 		$data['rut'] = $rut;	
			//return empty($matches)?false:trim($matches[1]);
	 		$data['fonos'] = $fonos;
	 		$this->db->like('rut',$rut);
	 		$query2 = $this->db->get('personas');
	 		$persona = $query2->result_array();
	 		//print_R($persona);
	 		if(!empty($persona[0]['razon_social'])){
	 			$data['nombre'] = $persona[0]['razon_social'];
	 		} else {
	 			$data['nombre'] = '';
	 		}
	 		
	 		$this->db->like('rut', $rut);
	 		//$this->db->join('personas','personas.rut = fonos.rut','left');
	 		$query3 = $this->db->get("mails");
	 		$data['mails'] = $query3->result_array();

	 		$this->db->like('rut', $rut);
	 		//$this->db->join('personas','personas.rut = fonos.rut','left');
	 		$query4 = $this->db->get("patentes");
	 		$data['patentes'] = $query4->result_array();

	 		$this->db->where('rut', $rut);
	 		//$this->db->join('personas','personas.rut = fonos.rut','left');
	 		$query5 = $this->db->get("direcciones");
	 		$data['direcciones'] = $query5->result_array();

	 		if($data['rango'] == 'admin' and false) {
	 			$this->load->view('Index/div_agregar',$data);
	 		}
 			$this->load->view('Index/index',$data);
 			$this->load->view('Index/resultado',$data);
 			//$this->load->view('Index/agregar_fono_element',$data);
	 		
	 	} else {
	 		if($data['rango'] == 'admin') {
	 		//	$this->load->view('Index/div_agregar',$data);
	 		}
	 		$this->load->view('Index/index',$data);
	 		//$this->load->view('Index/agregar_fono_element',$data);
	 	}
	 	
	 }

	 public function agregar_fonos(){
	 	$config['upload_path']          = './file/';
	    $config['allowed_types']        = 'xls|xlsx';
	    $config['max_size']             = 0;
	    $data['rango'] = $this->session->userdata('rango');
	    $this->load->library('upload', $config);
	    if ($this->upload->do_upload('inputfile')) {
	    	$upload_data = $this->upload->data();
	        $objPHPExcel = PHPExcel_IOFactory::load($upload_data['full_path']);
	        $cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();

	        foreach ($cell_collection as $cell) {
	            $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
	            $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
	            $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
	            //header will/should be in row 1 only. of course this can be modified to suit your need.
	            if ($row == 1) {
	                $header[$row][$column] = $data_value;
	            } else {
	                $arr_data[$row][$column] = $data_value;
	            }
	        }
	        //send the data in an array format
	        //print_r($arr_data);
	        $linea = 2;
	        $lineas_sin_rut = '';
	        $lineas_sin_fono = '';
	        $lineas_fono_malo = '';
	        $guardo = true;
	        $registros_insertados = 0;
	        foreach ($arr_data as $key => $value) {
	        	$guardo = true;
	        	if(!empty($value['A'])){
	        		$rut = $value['A'];
		        } else {
		        	$guardo  = false;
		        	$lineas_sin_rut = $lineas_sin_rut.$linea.',';
		        }

	        	if(!empty($value['B'])){
	        		$nombre = $value['B'];
	        	} else {
	        		$nombre = '';
	        	}

	        	if(!empty($value['C'])){
	        		$fono = $value['C'];
	        		$valido_fono = $this->busqueda->valido_fono($fono);

	        		if(!$valido_fono) {
	        			$guardo = false;
	        			$lineas_fono_malo = $lineas_fono_malo.$linea.',';
	        		} else {
	        			$tiene_el_56 = substr($fono,0,2);
	        			if($tiene_el_56 == '+5'){
	        				$fono = substr($fono, 1);
	        			} elseif($tiene_el_56 != '56'){
	        				$fono = '56'.$fono;
	        			}
	        		}

	        	} else {
	        		$guardo = false;
	        		$lineas_sin_fono = $lineas_sin_fono.$linea.',';
	        	}

				if(!empty($value['D'])){
	        		$confirmado = $value['D'];
	        	} else {
	        		$confirmado = '0';
	        	}
	        	if($guardo) {
	        		$query_persona = 'INSERT IGNORE INTO personas values ("'.$rut.'","'.$nombre.'")';
	        		$this->db->query($query_persona);
	        		
	        		$query_fono = 'INSERT IGNORE INTO fonos values("'.$rut.'","'.$fono.'","'.$confirmado.'")';
	        		$this->db->query($query_fono);
	        		$registros_insertados++;
	        	}
	        	$linea++;
	        }
	        $data['lineas_sin_fono'] = $lineas_sin_fono;
	        $data['lineas_fono_malo'] = $lineas_fono_malo;
	        $data['lineas_sin_rut'] = $lineas_sin_rut;
	        $data['registros_insertados'] = $registros_insertados;
	        $this->load->view('Index/agregar',$data);

	     } else {
	     	$this->load->view('Index/agregar',$data);
	 	}
	 }

	 public function agregar_mail(){
	 	$config['upload_path']          = './file/';
	    $config['allowed_types']        = 'xls|xlsx';
	    $config['max_size']             = 0;
	    $data['rango'] = $this->session->userdata('rango');
	    $this->load->library('upload', $config);
	    if ($this->upload->do_upload('inputfile')) {
	    	$upload_data = $this->upload->data();
	        $objPHPExcel = PHPExcel_IOFactory::load($upload_data['full_path']);
	        $cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();

	        foreach ($cell_collection as $cell) {
	            $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
	            $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
	            $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
	            //header will/should be in row 1 only. of course this can be modified to suit your need.
	            if ($row == 1) {
	                $header[$row][$column] = $data_value;
	            } else {
	                $arr_data[$row][$column] = $data_value;
	            }
	        }
	        //send the data in an array format
	        //print_r($arr_data);
	        $linea = 2;
	        $lineas_sin_rut = '';
	        $lineas_sin_fono = '';
	        $lineas_fono_malo = '';
	        $guardo = true;
	        $registros_insertados = 0;
	        foreach ($arr_data as $key => $value) {
	        	$rut = $value['A'];
	        	$nombre = $value['B'];
	        	$mail = $value['C'];
	        	if(!empty($rut) && !empty($mail)){
	        	$query_persona = 'INSERT IGNORE INTO personas values ("'.$rut.'","'.$nombre.'")';
	        		$this->db->query($query_persona);
	        		
	        	$query_mail = 'INSERT IGNORE INTO mails values("'.$rut.'","'.$mail.'")';
	        		$this->db->query($query_mail);
	        		$linea++;
	        	}
	        }
	        $data['linea'] = $linea;
	        $this->load->view('Index/agregar_mail',$data);

	     }
	     $this->load->view('Index/agregar_mail',$data);

	 }

	 public function agregar_patente(){
	 	$config['upload_path']          = './file/';
	    $config['allowed_types']        = 'xls|xlsx';
	    $config['max_size']             = 0;
	    $data['rango'] = $this->session->userdata('rango');
	    $this->load->library('upload', $config);
	    if ($this->upload->do_upload('inputfile')) {
	    	$upload_data = $this->upload->data();
	        $objPHPExcel = PHPExcel_IOFactory::load($upload_data['full_path']);
	        $cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();

	        foreach ($cell_collection as $cell) {
	            $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
	            $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
	            $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
	            //header will/should be in row 1 only. of course this can be modified to suit your need.
	            if ($row == 1) {
	                $header[$row][$column] = $data_value;
	            } else {
	                $arr_data[$row][$column] = $data_value;
	            }
	        }
	        //send the data in an array format
	        //print_r($arr_data);
	        $linea = 2;
	        $guardo = true;
	        $registros_insertados = 0;
	        foreach ($arr_data as $key => $value) {
	        	$rut = $value['A'];
	        	$nombre = $value['B'];
	        	$patente = $value['C'];
	        	if(!empty($rut) && !empty($patente)){
	        	$query_persona = 'INSERT IGNORE INTO personas values ("'.$rut.'","'.$nombre.'")';
	        		$this->db->query($query_persona);
	        		
	        	$query_patente = 'INSERT IGNORE INTO patentes values("'.$rut.'","'.$patente.'")';
	        		$this->db->query($query_patente);
	        		$linea++;
	        	}
	        }
	        $data['linea'] = $linea;
	        $this->load->view('Index/agregar_patente',$data);

	     } else {
	     		$this->load->view('Index/agregar_patente',$data);
	     }
	 }


}
?>