<?php
	include_once dirname(__DIR__).'/model/manager.php';
	include_once dirname(__DIR__).'/model/meu_manager.php';

function validate_option(){
	
		if(!isset($_GET['option'])){
			return false;
		}

	switch($_GET['option']){
			

			case "list_products":
            	$table_content = select_common("tb_product",null,null,null);
               
            	$tam = count($table_content);

            	for ($i = 0; $i  < $tam ; $i++) { 
               	$table_content[$i]['imagem'] ='<img src="img/'.$table_content[$i]['imagem'].'" width="80%" '; 
                }
				

					$table_titles['id'] = "ID";
					$table_titles['product_name'] = "Nome";
				 	$table_titles['product_desc'] = "Descrição";
					$table_titles['product_price'] = "Preço";
					$table_titles['imagem'] = "imagem";

				//filtro para as ações
				$filter = "id";

				//Minhas ações na tabela
				$update = true;
				$delete =true;
				
				//caminho da ação
				
				$update_destiny = "?option=update_product";
				$delete_destiny = "controller/delete_product.php";

				//incluindo o arquivo de tabela
				include_once'view/list_common.html';

				//echo '<a href="?option=add_product">';
				//echo '<span class="glyphicon glyphicon-plus"></span>';
			    
                 if (isset($_SESSION['product_all_ok'])) {
				  	echo '<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
                         alert ("Produto adicionado com sucesso")
                          </SCRIPT>';

                      unset($_SESSION['product_all_ok']);
				  }  

			    break;
			

			case "list_produc":
             header("location:produtos.php");
			    
			    break;

			case 'add_product':
				include_once'view/forms/add_product.html';


				break;
		    
		    case 'update_product':
			   
			    $filters['id'] = $_GET['filter'];

				//buscando dados do cliente
				$product = select_common('tb_product', null, $filters,null);
                $cats = select_common('tb_cat',null,null,null); 
				//salvando os dados num array			
				$product = $product[0];
				
				//var_dump($client);
				include_once'view/forms/update_produto.html';
				break;	

		 

		    case 'mens':
				
                $table_content = select_common("tb_mensage",null,null,null);
               
                $table_titles['nome'] = "Nome";
				$table_titles['email'] = "Email";
				$table_titles['assunto'] = "Assunto";
				$table_titles['mensagem'] = "Mensagem";
				$table_titles['data'] = "Data";
			

				//filtro para as ações
				$filter = "id_mens";

				//Minhas ações na tabela
				$update = false;
				$delete =true;
				
				//caminho da ação
				
				$update_destiny = "?option=delete_mens";
				$delete_destiny ="controller/delete_mens.php";

				//incluindo o arquivo de tabela
				include_once'view/list_common.html';


				break;	

			case 'name':
					include_once'view/forms/name.html';
					
                     if (isset($_SESSION['name_all_ok'])) {
				  	echo '<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
                         alert ("Nome da loja atualizado")
                          </SCRIPT>';

                      unset($_SESSION['name_all_ok']);
				  }  

					break;
            
            case 'contacts':
			      include_once'view/forms/contact.html';
				  $table_content = select_common("tb_contact",null,null,null);
			     
                 
			      $table_titles['tele'] = "Telefone";
				  $table_titles['email'] = "Email";
				
	              $filter = "id";

				//Minhas ações na tabela
				$update = false;
				$delete =true;
			    $delete_destiny = "controller/delete_contact.php";
                echo'<div class="jumbotron">';
				include_once'view/list_common.html';
				echo'<div/>';
				
                if (isset($_SESSION['contact_all_ok'])) {
				  	echo '<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
                         alert ("Contado adicionado")
                          </SCRIPT>';

                      unset($_SESSION['contact_all_ok']);
				  } 

                
				break;
			    

            case 'sociais':
			    
			    $table_content = select_common("tb_social",null,null,null);
               
                $size = count($table_content);
                
                //tira o identificador da rede social do link
                for ($i=0; $i < $size  ; $i++) { 
                $table_content[$i]['social_link'] = substr($table_content[$i]['social_link'],4); 	
                }

                $table_titles['social_link'] = "Rede_Social";
				

				//filtro para as ações
				$filter = "social_id";

				//Minhas ações na tabela
				$update = false;
				$delete =true;
                $delete_destiny ="controller/delete_social.php";

				include_once'view/forms/redes_sociais.html';
				echo'<div class="jumbotron">';
				include_once'view/list_common.html';	
		        echo '</div>';			
			    
                if (isset($_SESSION['social_all_ok'])) {
				  	echo '<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
                         alert ("Rede social adicionada")
                          </SCRIPT>';

                      unset($_SESSION['social_all_ok']);
				  } 


			    break;	

			case 'password':
					include_once'view/forms/redefine.html';
					
			    break;	

		    case 'about':
				  
				 if (isset($_SESSION['all_ok'])) {
				  	echo '<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
                         alert ("Texto sobre o site fui atualizado")
                          </SCRIPT>';

                      unset($_SESSION['all_ok']);
				  }else{include_once'view/forms/sobre.html';} 
		        
		        break;

			case 'color':
				
				if (isset($_SESSION['all_ok'])) {
					echo '<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
                         alert ("A cor foi atualizada com successo")
                          </SCRIPT>';
                    unset($_SESSION['all_ok']);
				}

				
				$type = number_color();
                
				echo '<a href="?option=color&type=one"><button class="btn btn-success" type="submit">Apenas uma cor</button><a/>&nbsp';

			    echo '<a href="?option=color&type=degrade"><button class="btn btn-success" type="submit">Degrade</button><a/>&nbsp';
			    
			    color_number(); 
			    
			    $cs=cores_select(); 
				$cor = Tabela_cores(); 
				
				$tabela= imprimir_cores($type,$cor);
                
                echo'<div style="height: 80px;
                 background-image: linear-gradient(to right,'.$cs.'")><div/>';
                
                echo "<br/>";echo"<br/>";echo"<br/>";echo"<br/>";echo"<br/>";
                
                 echo'<form method="post" action="controller/cores.php">
                  <button type="submit" class="btn btn-primary">Salvar</button>
                      </form>';

                break;
            
            case 'make_cat':	
                 
                 if (isset($_SESSION['cat_all_ok'])) {
				  	echo '<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
                         alert ("Categoria adicionada")
                          </SCRIPT>';

                      unset($_SESSION['cat_all_ok']);
				 }else{include_once'view/forms/make_cat.html';} 
		           
		           echo'<hr/>';
		           
		           $table_content = select_common("tb_cat",null,null,null);
                    
                   $table_titles['cat_name'] = "Categoria";
					
                   //filtro para as ações
				   $filter = "cat_name";

				   //Minhas ações na tabela
				   $update = false;
				   $delete =true;
				
				   //caminho da ação
				
				  $update_destiny = "?option=delete_mens";
				  $delete_destiny ="controller/delete_cat.php";

                   include_once'view/list_common.html';
                   
            break;


            case 'carou':
                  $table_content = select_common("tb_product",null,null,null);
                  $table_titles['product_name'] = "Produto";

				  $update = false;
				  $delete =false;
                  $carousel=true;
                  $carou_destinyadd="view/carousel.php";
				  $carou_destinydel="view/carousel.php";
				  $filter='id';
				  include_once'view/list_common.html';

            break;

}	 			
				 
				 			
		

}
         

      


?>