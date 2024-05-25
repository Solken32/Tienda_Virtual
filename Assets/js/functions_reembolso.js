var tableReembolso;

var divLoading = document.querySelector("#divLoading");
document.addEventListener('DOMContentLoaded', function(){

	tableReembolso = $('#tableReembolso').dataTable( {
		"aProcessing":true,
		"aServerSide":true,
        "language": {
        	"url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Reembolso/getReembolso",
            "dataSrc":""
        },
        "columns":[
            {"data":"id"},
            {"data":"pedidoid"},
            {"data":"idtransaccion"},
            {"data":"datosreembolso"},
            {"data":"observacion"},
            {"data":"status"},
            {"data":"options"}
        ],

        'dom': 'lBfrtip',
        'buttons': [
            {
                "extend": "copyHtml5",
                "text": "<i class='far fa-copy'></i> Copiar",
                "titleAttr":"Copiar",
                "className": "btn btn-secondary"
            },{
                "extend": "excelHtml5",
                "text": "<i class='fas fa-file-excel'></i> Excel",
                "titleAttr":"Esportar a Excel",
                "className": "btn btn-success"
            },{
                "extend": "pdfHtml5",
                "text": "<i class='fas fa-file-pdf'></i> PDF",
                "titleAttr":"Esportar a PDF",
                "className": "btn btn-danger"
            },{
                "extend": "csvHtml5",
                "text": "<i class='fas fa-file-csv'></i> CSV",
                "titleAttr":"Esportar a CSV",
                "className": "btn btn-info"
            }
        ],

        "resonsieve":"true",
        "bDestroy": true,
        "iDisplayLength": 10,
        "order":[[0,"desc"]]  
    });



    if(document.querySelector("#formReembolso")){
        let formReembolso = document.querySelector("#formReembolso");
        formReembolso.onsubmit = function(e) {
            e.preventDefault();

            let intIdRol = document.querySelector('#idReembolso').value;
            let strPedido = document.querySelector('#txtPedido').value;
            let strTransaccion = document.querySelector('#txtTransaccion').value;
            let strDatosreembolso = document.querySelector('#txtDatosreembolso').value;
            let strObservacion = document.querySelector('#txtObservacion').value;
            let  intStatus = document.querySelector('#listStatus').value; 

        
            if(strPedido == '' || strDatosreembolso == '' || intStatus == '' || strObservacion== '' || strTransaccion)
            {
                Swal.fire("Atención", "Todos los campos son obligatorios." , "error");
                return false;
            }



            /*    
            divLoading.style.display = "flex";
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url+'/Reembolso/setReembolso'; 
            let formData = new FormData(formReembolso);
            request.open("POST",ajaxUrl,true);
            request.send(formData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    let objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        if(rowTable == ""){
                            tableReembolso.api().ajax.reload();
                        }else{
                           rowTable.cells[1].textContent =  intIdRol;
                           rowTable.cells[2].textContent =  strPedid;
                           rowTable.cells[3].textContent =  strTransaccion;
                           rowTable.cells[4].textContent =  strDatosreembolso;
                           rowTable.cells[5].textContent =  strEmail;
                           rowTable.cells[6].textContent =  strObservacion;
                           rowTable = "";
                        }
                        $('#modalFormReembolso').modal("hide");
                        formReembolso.reset();
                        Swal.fire("Usuarios", objData.msg ,"success");
                    }else{
                        Swal.fire("Error", objData.msg , "error");
                    }
                }
                divLoading.style.display = "none";
                return false;
            } */
        }
    }



});



function openModal(){

    rowTable="";
    document.querySelector('#idReembolso').value ="";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML ="Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Reembolso";
    document.querySelector("#formReembolso").reset();
    $('#modalFormReembolso').modal('show');
}



function fntViewInfo(id){
    let request =(window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/Reembolso/getReembolsopersona/'+ id;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            let objData = JSON.parse(request.responseText);
            if(objData.status)
            {
                document.querySelector("#celIdreembolso").innerHTML = objData.data.id;
                document.querySelector("#celPedido").innerHTML = objData.data.pedidoid;
                document.querySelector("#celTransaccion").innerHTML = objData.data.idtransaccion;
                document.querySelector("#celDatosreembolso").innerHTML = objData.data.datosreembolso;
                document.querySelector("#celObservacion").innerHTML = objData.data.observacion;
                document.querySelector("#celEstado").innerHTML = objData.data.status;
                $('#modalViewReembolso').modal('show');
            }else{
                Swal.fire("Error", objData.msg , "error");
            }
        }
    }
}


function fntDelInfo(id){
    Swal.fire({
        title: "Eliminar Reembolso",
        text: "¿Realmente quiere eliminar el reembolso?",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, eliminar!",
        cancelButtonText: "No, cancelar!",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function(isConfirm) {
        
        if (isConfirm) 
        {
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url+'/Reembolso/delReembolso';
            let strData = "id="+ id;
            request.open("POST",ajaxUrl,true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    let objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        Swal.fire("Eliminar!", objData.msg , "success");
                        tableReembolso.api().ajax.reload();
                    }else{
                        Swal.fire("Atención!", objData.msg , "error");
                    }
                }
            }
        }

    });

}


function fntEditInfo(element, id){
    rowTable = element.parentNode.parentNode.parentNode;
    document.querySelector('#titleModal').innerHTML ="Actualizar Reembolso";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML ="Actualizar";
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/Reembolso/getReembolso/'+id;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){

        if(request.readyState == 4 && request.status == 200){
            let objData = JSON.parse(request.responseText);
            if(objData.status)
            {
                document.querySelector("#idReembolso").innerHTML = objData.data.id;
                document.querySelector("#txtPedido").innerHTML = objData.data.pedidoid;
                document.querySelector("#txtTransaccion").innerHTML = objData.data.idtransaccion;
                document.querySelector("#txtDatosreembolso").innerHTML = objData.data.datosreembolso;
                document.querySelector("#txtObservacion").innerHTML = objData.data.observacion;
            }
        }
        $('#modalFormReembolso').modal('show');
    }
}




    