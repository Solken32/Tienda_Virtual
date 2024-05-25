<?php 
Class ReembolsoModel extends Mysql{

    public $intIdreembolso;
	public $intIdpedido;
	public $intIdtransaccion;
    public $strDatosreembolso;
	public $strObservacion;
	public $intStatus;

    public function __construct()
		{
			parent::__construct();
		}

    public function selectReembolso()
	{
		$whereAdmin = "";
		if($_SESSION['idUser'] != 1 ){
			$whereAdmin = " and id != 1 ";
		}
		
		$sql = "SELECT * FROM reembolso WHERE status != 0".$whereAdmin;
		$request = $this->select_all($sql);
		return $request;
	}

    public function deleteReembolso(int $intIdreembolso)
	{
		$this->intIdreembolso = $intIdreembolso;
		$sql = "UPDATE reembolso SET status =? WHERE id = $this->intIdreembolso "; 
		$arrData = array(0);
		$request = $this->update($sql,$arrData);
		return $request;
	}



    /* public function insertReembolso(string $pedido, string $transaccion, string $datosreembolso , string $observacion, int $status){

        $return = "";
        $this->strPedido = $pedido;
        $this->strTransaccion = $transaccion;
        $this->strDatosreembolso = $datosreembolso;
        $this->strObservacion = $observacion;
        $this->intStatus = $status;

        $sql = "SELECT * FROM reembolso WHERE pedidoid = '{$this->strPedido}' ";
        $request = $this->select_all($sql);

        if(empty($request))
        {
            $query_insert  = "INSERT INTO reembolso(pedidoid,idtransaccion,datosreembolso,observacion,status) VALUES(?,?,?,?,?)";
            $arrData = array($this->strPedido, $this->strDatosreembolso, $this->strObservacion, $this->intStatus);
            $request_insert = $this->insert($query_insert,$arrData);
            $return = $request_insert;
        }else{
            $return = "exist";
        }
        return $return;
    }	*/



    /*public function deleteReembolso(int $intIdreembolso)
	{
		$this->intIdreembolso = $intIdreembolso;
		$sql = "UPDATE reembolso SET status =? WHERE id = $this->intIdreembolso "; 
		$arrData = array(0);
		$request = $this->update($sql,$arrData);
		return $request;
	} */
}

?>