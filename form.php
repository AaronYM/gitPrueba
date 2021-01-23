<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel='stylesheet' type='text/css' href='bootstrap4/css/bootstrap.min.css'>
    <link rel="stylesheet" type="text/css" href="est.css"  />

 
    <title>Reg. Usuario</title>
    <style> 
    table.scrolldown tr:hover {
  background-color: #c4e1f7;
   
}
        table.scrolldown { 
          position:absolute;
            background-color: white;  
          width: 90%;
            border-collapse: collapse; 
            border-spacing: 0; 
            border: 1px solid #ccc; 
            
            
        } 
          
        /* To display the block as level element */ 
        table.scrolldown tbody, table.scrolldown thead { 
            display: block; 
        }   
          
        table.scrolldown tbody { 
              
              /* Set the height of table body */ 
              height: 60px;  
                
              /* Set vertical scroll */ 
              overflow-y: auto; 
                
              /* Hide the horizontal scroll */ 
              overflow-x: hidden;  
          } 
            
         
    </style>
  </head>
  <body onload='deshabilitaRetroceso()'>
    
    
    <div class="container-md text-center">
      <!--h1 class="h1">Registrar Usuario</h1>-->
    </div>
    
<div class="container">
  <div class="row">

    <div class="col-md-1"></div>

    <div class="col-md-10">
       <div class="card">
          <div class="card-header">
            <b>Registrar Usuario </b><cite>/ Completa el formulario para crear un usuario.</cite>
          </div>
          <div class="card-body">
            <form class="formulario" method="post" action="" autocomplete="off">
              <div class="row">
              
                <div class="form-group col-md-6">
                  <label class="h6" for="">Buscar</label>
                  <input type="text" class="form-control form-control-sm" id="buscar"  name="buscar">
                  
                  <table id="tabla" class="scrolldown" hidden=''>
                  <thead>
                  </thead>
                  <tbody id="tbodyTabla">    
                  </tbody>
                </table>
                </div>


              </div>      
              <div class="modal-footer">
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-sm">Grabar <img src="../img/save.svg"></button>
                </div>
                <div class="form-group">
                  <a href="../controlador/c_redireccionarMenuPrincipal.php" class="btn btn-danger btn-block btn-sm">Cancelar <img src="../img/x-square.svg"></a>
                </div>
                
              </div>
             
            </form>
          </div>
        </div>
    </div>

    <div class="col-md-1"></div>

  </div>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="jquery/jquery-3.5.1.min.js"></script>
    <script src='jquery/ajaxgoogle.min.js'></script>
    <script src='popperjs/popper.min.js'></script>
    <script src='bootstrap4/js/bootstrap.min.js'></script>
    <script>
     
	$("#buscar").keyup(function(){
			
  
      var busqueda=document.getElementById('buscar').value;
      if(busqueda=='')
      {
        
        $('#tabla').attr('hidden','');
      }
      else{
        $.ajax({
        type:'POST',
        url:'p.php',
        data:'busqueda='+busqueda.trim(),
        success:function(r){
          
          $('#tbodyTabla').html(r);
          $('#tabla').removeAttr('hidden');
        },
        error: function(){
          alert("Error de protocolo HTTP");
        }
      });
      }
      
    });

      function buscar(cod)
	  {

      $.ajax({
        type:'POST',
        url:'p1.php',
        data:'cod='+cod,
        success:function(r){
          
         
          $('#tabla').attr('hidden','');
          document.getElementById('buscar').value=r.trim();
        },
        error: function(){
          alert("Error de protocolo HTTP");
        }
      });
    } 
    </script>
  </body>
  


</html>