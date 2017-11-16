<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="index_arquivos/bootstrap.css">
</head>
<body>

<button class="btn btn-default" data-toggle="modal" data-target="#myLogin"> Login </button>
<button class="btn btn-success"> Botão </button>
<button class="btn btn-danger"> Botão </button>
<button class="btn btn-info"> Botão </button>
<button class="btn btn-warning"> Botão </button>
<button class="btn btn-primary"> Botão </button>


<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Mostrar a modal
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="myModalLabel">Login</h4>
      </div>
      <div class="modal-body">
        
	  <form action="confere_dados.php" method="POST">
		  <div class="form-group">
		    <label for="exampleInputEmail1">Endereço de Email</label>
		    <input value="anthony@email.com" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email" type="email">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Senha</label>
		    <input class="form-control" id="exampleInputPassword1" placeholder="Password" name="senha" type="password">
		    </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
		        <button type="submit" class="btn btn-primary">Fazer Login</button>
	
	      	</div></form>
    </div>
  </div>
</div>


<script type="text/javascript" src="index_arquivos/jquery.js"></script>
<script type="text/javascript" src="index_arquivos/bootstrap.js"></script>

</div></body></html>