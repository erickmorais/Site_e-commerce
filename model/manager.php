<?php

	include_once dirname(__DIR__).'/controller/connect.php';

	
	//global $conn;



	function insert_common($table,$data){
		global $conn;
		//INICIAR A QUERY
		$query = "INSERT INTO $table (";

		//PEGANDO OS CAMPOS
		$fields = implode('`,`',array_keys($data));
		$query .="`$fields`";

		//PEGANDO OS VALORES
		$query .= ") VALUES (";
		$values = implode("','", $data);
		$query .="'$values')";

		echo $query;
		
		//enviar a query para o banco
		$result = mysqli_query($conn,$query) or die(mysql_error());

		return $result;
		
	}		

	
	function select_common($table, $fields,$filters,$query_extra){
		//Deixando a conexão global
		global $conn;

		//Inicio o select
		$query = "SELECT ";

		//Testa se existem campos
		if($fields != null){
			//se existirem campos ele coloca os campos na consulta
			$query .= implode(", ", $fields);
		}else{
			//senão ele seleciona tudo 
			$query .= "* ";
		}

		//continuando a consulta
		//parte do FROM
		$query .= " FROM $table ";


		//testo se existem filtros;
		if($filters != null){
			$query .= " WHERE ";
			foreach ($filters as $key => $value) {
				$query .= "`$key` = '$value' AND ";
			}

			//Retirando o ultimo AND da consulta(query)
			$query = substr($query, 0, -4);
		
			
		}
		
		
		//testar se existe query_extra
		if($query_extra != null){
			//se existir query extra, concatena
			$query .= $query_extra;
		}

		//echo $query;

		//enviando a query para o banco
		$result = mysqli_query($conn,$query) or die(mysqli_error($conn));


		//Testando o meu resultado
		#Se ele vier vazio ou falso
		if($result == false){
			//salva no array de dados FALSE
			$data = false;
		}else{
			//Senão ele salva todos os campos dentro do array data
			while ($row = mysqli_fetch_assoc($result)) {
				$data[] = $row;
			}
		}

		//retorna o resultado
		return @$data;


		//imprimindo o resultado
		echo $query;

	}


	function delete_common($table,$filters,$query_extra){
		global $conn;
		//Iniciar a minha query
		$query = "DELETE FROM $table ";

		//testo se existem filtros;
		if($filters != null){
			$query .= " WHERE ";
			foreach ($filters as $key => $value) {
				$query .= "`$key` = '$value' AND ";
			}

			//Retirando o ultimo AND da consulta(query)
			$query = substr($query, 0, -4);
				
		}


		echo $query;
		//enviar a query para o banco
		$result = mysqli_query($conn,$query) or die(mysql_error());

			

		return $result;
	}

	function update_common($table, $data, $filters, $query_extra){
		global $conn;

		//Inicio da Query
		$query = "UPDATE $table SET ";

		//Pegando os dados
		if($data != null){
			foreach ($data as $key => $value) {
			
			@$new_data .= "`$key`='$value', ";
			}
			
			//removendo ultima "," da query
			$new_data = substr($new_data, 0, -2);
		}

		//continuando a query
		$query .= " $new_data ";

		//testo se existem filtros;
		if($filters != null){
			$query .= " WHERE ";
			foreach ($filters as $key => $value) {
				$query .= "`$key` = '$value' And ";
			}

			//Retirando o ultimo AND da consulta(query)
			$query = substr($query, 0, -4);
				
		}

		//testar se existe query_extra
		if($query_extra != null){
			//se existir query extra, concatena
			$query .= $query_extra;
		}

		
		echo $query;
		
		$result = mysqli_query($conn,$query) or die(mysql_error());

		return $result;

	}

	function select_special($tables,$relationships,$filters,$query_extra){

			//Começo a query
			$query = "SELECT ";
			
			//informando colunas a serem selecionadas
			foreach ($tables as $table=>$fields){
				if(!empty($fields)){
					foreach ($fields as $each_field){
						$query .= "$table.$each_field, ";
					}
				}else{
					$query .= "$table.*, "; 
					//quando as colunas nao forem informadas
				}
			}

			//removendo ultima "," 
			$query = substr($query, 0, -2);

			//inner join's
			$tables_names = array_keys($tables);
			
			$query .= " FROM ".implode(" INNER JOIN ", $tables_names);
			
			//relacionamentos
			$query .= " ON ";
			foreach($relationships as $foreign=>$primary){
				$query .= "$foreign=$primary AND "; 
			}
			//removendo ultimo "AND"
			$query = substr($query, 0, -4);


			//filtros
			if(isset($filters)){
				$query .= " WHERE ";
				foreach($filters as $field=>$value){
					$query .= "$field=$value AND ";
				}
				//removendo ultimo "AND"...
				$query = substr($query, 0, -4);
			}

			//se a consulta precisar de algo mais..
			if($query_extra != ""){
				$query .= $query_extra;
			}


			//echo $query;

	}


  



	
?>