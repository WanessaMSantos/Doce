<!DOCTYPE html>
<HTML lang="pt-br">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">   
        <meta charset="UTF-8">
	    	<title>Trabalhe Conosco</title>
		<link rel="stylesheet" type="text/css" href="css/estilo.css" />     
		<SCRIPT type="text/javascript" src="js/codigo.js"></SCRIPT>
		<link rel="shortcut icon" type="image/x-icon" href="imagens/icone.ico">
 
	</head>
	<body>
	<br><br>
			<?php
				require_once 'conexao.php';

				if ($_SERVER["REQUEST_METHOD"] === "POST") {
					$nome = $_POST['candidato'];
					$telefone = $_POST['telefone'];
					$genero = $_POST['genero'];
					$cpf = $_POST['cpf'];
					$email = $_POST['email'];
					$endereco = $_POST['endereco'];
					$complemento = $_POST['complemento'];
					$cep = $_POST['cep'];
					$bairro = $_POST['bairro'];
					$cidade= $_POST['cidade'];
					$estado = $_POST['estado'];
					$curriculo = $_POST['curriculo'];
					$area = $_POST['area'];

				   
					try {
						// Preparar a consulta usando instrução preparada
						$inserir = $conexao->prepare("INSERT INTO trabalheconosco(nome, telefone, genero, cpf, email, endereco, complemento, cep, bairro, cidade, estado, curriculo, area) 
												 VALUES (:nome, :telefone, :genero, :cpf :email, :endereco, :complemento, :cep, :bairro, :cidade, :estado, :curriculo, :area)");
				
						// Vincular parâmetros à instrução preparada
						$inserir->bindValue(':nome', $nome);
						$inserir->bindValue(':telefone', $telefone);
						$inserir->bindValue(':genero', $genero);
						$inserir->bindValue(':cpf', $cpf);
						$inserir->bindValue(':email', $email);
						$inserir->bindValue(':endereco', $endereco);
						$inserir->bindValue(':complemento', $complemento);
						$inserir->bindValue(':cep', $cep);
						$inserir->bindValue(':bairro', $bairro);
						$inserir->bindValue(':cidade', $cidade);
						$inserir->bindValue(':estado', $estado);
						$inserir->bindValue(':curriculo', $curriculo);
						$inserir->bindValue(':area', $area);

					   
				
						// Executar a consulta
						if ($inserir->execute()) {
							echo "Dados inseridos no Banco de Dados com sucesso!<br />";
						} else {
							echo "Erro ao inserir os dados: " . $inserir->errorInfo()[2];
						}
				
						// Fechar a instrução preparada
						$inserir = null;
						} catch(PDOException $e) {
						echo "Erro ao inserir os dados: " . $e->getMessage();
						}
				}
				$conexao = null;
			?>

	</body>


</html>
