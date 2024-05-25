<?php 
class Reembolso extends Controllers{
	public function __construct()
	{
		parent::__construct();
		session_start();
		//session_regenerate_id(true);
		if(empty($_SESSION['login']))
		{
			header('Location: '.base_url().'/login');
			die();
		}
		getPermisos(MUSUARIOS);
	}

	public function Reembolso()
	{
		if(empty($_SESSION['permisosMod']['r'])){
			header("Location:".base_url().'/dashboard');
		}
		$data['page_id'] = 3;
		$data['page_tag'] = "Reembolso Usuario";
		$data['page_name'] = "reembolso_usuario";
		$data['page_title'] = "Reembolso Usuario <small> Tienda Virtual</small>";
		$data['page_functions_js'] = "functions_reembolso.js";
		$this->views->getView($this,"reembolso", $data );
	}

    public function getReembolso()
	{
		if($_SESSION['permisosMod']['r']){
			$btnView = '';
			$btnEdit = '';
			$btnDelete = '';
			$arrData = $this->model->selectReembolso();

			for ($i=0; $i < count($arrData); $i++) {

				if($arrData[$i]['status'] == 1)
				{
					$arrData[$i]['status'] = '<span class="badge text-bg-success">Activo</span>';
				}else{
					$arrData[$i]['status'] = '<span class="badge text-bg-danger">Inactivo</span>';
				}

                if($_SESSION['permisosMod']['r']){
					$btnView = '<button class="btn btn-info btn-sm" onClick="fntViewInfo('.$arrData[$i]['id'].')" title="Ver Reembolso"><i class="far fa-eye"></i></button>';
				}
				if($_SESSION['permisosMod']['u']){
					$btnEdit = '<button class="btn btn-primary  btn-sm" onClick="fntEditInfo(this,'.$arrData[$i]['id'].')" title="Editar cliente"><i class="fas fa-pencil-alt"></i></button>';
				}
				if($_SESSION['permisosMod']['d']){	
					$btnDelete = '<button class="btn btn-danger btn-sm" onClick="fntDelInfo('.$arrData[$i]['id'].')" title="Eliminar cliente"><i class="far fa-trash-alt"></i></button>';
				}
				$arrData[$i]['options'] = '<div class="text-center">'.$btnView.' '.$btnEdit.' '.$btnDelete.'</div>';
			}
			echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
		}
		die();		
	}

	public function getReembolsopersona($idreembolso){
		if($_SESSION['permisosMod']['r']){
			$reembolsoid = intval($idreembolso);
			if($reembolsoid > 0)
			{
				$arrData = $this->model->selectReembolso($reembolsoid);
				if(empty($arrData))
				{
					$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
				}else{
					$arrResponse = array('status' => true, 'data' => $arrData);
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
		}
		die();
	}


	
	public function delReembolso()
	{
		if($_POST){
			if($_SESSION['permisosMod']['d']){
				$intIdreem = intval($_POST['id']);
				$requestDelete = $this->model->deleteReembolso($intIdreem);
				if($requestDelete)
				{
					$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el Reembolso');
				}else{
					$arrResponse = array('status' => false, 'msg' => 'Error al eliminar el Reembolso.');
				}
			
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
		}
		die();

	}
 }