<html>
	<head>
		<meta charset="utf-8" />
		<meta name="author" content="Thiago Jourdan" />
		<title>Software teste de banco de dados de estoque</title>
	</head>
	<body>
		<?php
			require_once('db-queries.php');
			$acao=$_POST['acao'];
			$alvo=$_POST['alvo'];
			switch($alvo){
				case 'fornecedor':
					$nomeFantasia=$_POST['nomeFantasia'];
					$cnpj=$_POST['cnpj'];
					//Contatos
					$email=$_POST['email'];
					$telFixo=$_POST['telFixo'];
					$telCel=$_POST['telCel'];
					//Endereços
					$rua=$_POST['rua'];
					$numero=$_POST['numero'];
					$compl=$_POST['compl'];
					$cep=$_POST['cep'];
					$bairro=$_POST['bairro'];
					$cidade=$_POST['cidade'];
					$estado=$_POST['estado'];
					//Funções
					if($acao=='cadastrar'){
						enderecos($rua,$numero,$compl,$cep,$bairro,$cidade,$estado);
						contatos($email,$telCel,$telFixo);
						fornecedores($acao,'',$nomeFantasia,$cnpj);
					}else{
						if($acao=='editar'){
							fornecedores($acao,$idFornecedor);
						}
						if($acao=='excluir'){
							fornecedores($acao,$idFornecedor);
						}
					}
					break;
				case 'cliente':
					$nomeCliente=$_POST['nomeCliente'];
					$cpfCliente=$_POST['cpfCliente'];
					$obsCliente=$_POST['obsCliente'];
					//Contatos
					$email=$_POST['email'];
					$telFixo=$_POST['telFixo'];
					$telCel=$_POST['telCel'];
					//Endereços
					$rua=$_POST['rua'];
					$numero=$_POST['numero'];
					$compl=$_POST['compl'];
					$cep=$_POST['cep'];
					$bairro=$_POST['bairro'];
					$cidade=$_POST['cidade'];
					$estado=$_POST['estado'];
					if($acao=='cadastrar'){
						enderecos($rua,$numero,$compl,$cep,$bairro,$cidade,$estado);
						contatos($email,$telCel,$telFixo);
						clientes($acao,'',$nomeCliente,$cpfCliente,$obsCliente);
					}else{
						if($acao=='editar'){
							clientes($acao,$idCliente);
						}
						if($acao=='excluir'){
							clientes($acao,$idCliente);
						}
					}
					break;
				case 'funcionario':
					$nomeFunc=$_POST['nomeFunc'];
					$cpfFuncionario=$_POST['cpfFuncionario'];
					$cargo=$_POST['cargo'];
					$obsFuncionario=$_POST['obsFuncionario'];
					//Contatos
					$email=$_POST['email'];
					$telFixo=$_POST['telFixo'];
					$telCel=$_POST['telCel'];
					//Endereços
					$rua=$_POST['rua'];
					$numero=$_POST['numero'];
					$compl=$_POST['compl'];
					$cep=$_POST['cep'];
					$bairro=$_POST['bairro'];
					$cidade=$_POST['cidade'];
					$estado=$_POST['estado'];
					if($acao=='editar'||$acao=='cadastrar'){
						enderecos($rua,$numero,$compl,$cep,$bairro,$cidade,$estado);
						contatos($email,$telCel,$telFixo);
						funcionarios($acao,'',$nomeFunc,$cpfFuncionario,$cargo,$obsFuncionario);
					}else{
						if($acao=='editar'){
							funcionarios($acao,$idFuncionario);
						}
						if($acao=='excluir'){
							funcionarios($acao,$idFuncionario);
						}
					}
					break;
				case 'remessa':
					$idProdutoRem=$_POST['idProdutoRem'];
					$qtdProdRem=$_POST['qtdProdRem'];
					$idFornecedorRem=$_POST['idFornecedorRem'];
					$dataPedido=$_POST['dataPedido'];
					$dataPagamento=$_POST['dataPagamento'];
					$dataEntrega=$_POST['dataEntrega'];
					if($acao=='cadastrar'){
						remessas($acao,'',$idProdutoRem,$qtdProdRem,$idFornecedorRem,$dataPedido,$dataPagamento,$dataEntrega);
					}
					break;
				case 'produto':
					$idRemessa=$_POST['idRemessa'];
					$descrProd=$_POST['descrProd'];
					$nomeProd=$_POST['nomeProd'];
					$custoProd=$_POST['custoProd'];
					$valorVenda=$_POST['valorVenda'];
					if($acao=='cadastrar'){
						produtos($acao,'',$idRemessa,$descrProd,$nomeProd,$custoProd,$valorVenda);
					}else{
						produtos($acao,$idProduto);
					}
					break;
				case 'estoque':
					$idFuncionarioEstq=$_POST['idFuncionarioEstq'];
					$idProdutoEstq=$_POST['idProdutoEstq'];
					$qtdProdEstq=$_POST['qtdProdEstq'];
					$dataSaida=$_POST['dataSaida'];
					if($acao=='inserir'){
						estoques($acao,'',$idProdutoEstq,$qtdProdEstq);
					}else{
						historicos($idProdutoEstq,$idFuncionarioEstq,$dataSaida);
						estoques($acao,$idEstoque);
					}
					break;
			}
		?>
	</body>
</html>