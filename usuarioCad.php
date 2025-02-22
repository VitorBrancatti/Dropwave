<?php
	require_once("verifica.php");

	$data=$_REQUEST;

	include_once("config.php");
	

	$conexao = pg_connect();

	extract($data);
	
	if( $op != "I" )
	{
		$sql = "select usuCodigo, usuMail, usuSenha, usuNome, usuStatus, usuDataCad 
				from usuario
				where usuCodigo = :codigo ";

		$comando = $conexao->prepare($sql);

		$comando->bindParam(':codigo', $codigo);

		$comando->execute();

		$dados = $comando->fetch(PDO::FETCH_OBJ);
	}
?>

<?php include_once("cabec.php"); ?>
	<style>
		.container{
			background-color: white;
		}
	</style>
	<p>&nbsp;</p>

	<h2 align="center">Dados do Usuário</h2>

	<div class="container">
				<form class="form-inline row justify-content-center col-lg-12" action="usuarioGrava.php" method="post">
					<input type="hidden" name="edtCodigo" value="<?php if( $op != "I" ) { echo $dados->usuCodigo; } else { echo "0"; } ?>" />
					<input type="hidden" name="op" value="<?php echo $op; ?>" />
					
					<div class="form-group col-sm-12 col-lg-10">
						<div class="control-label col-sm-11">
							<p class="help-block" align="right"><h11>*</h11> Campo Obrigatório </p>
						</div>
					</div>
					
					<div class="form-group row my-2">
						<label for="edtMail" class="col-sm-2 col-form-label text-end">e-mail: &nbsp;<h11>*</h11>&nbsp;</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" id="edtMail" name="edtMail" placeholder="e-mail do usuário" value="<?php if( $op != "I" ) { echo $dados->usuMail; } ?>" <?php if( $op == "C" ) echo "readonly" ?>>
						</div>
					</div>	
					
					<div class="form-group row my-2">
						<label for="edtSenha" class="col-sm-2 col-form-label text-end">Senha: &nbsp;<h11>*</h11>&nbsp;</label>
						<div class="col-sm-7">
							<input type="password" class="form-control" id="edtSenha" name="edtSenha" placeholder="Senha do Usuário" value="<?php if( $op != "I" ) { echo '********'; } ?>" <?php if( $op != "I" ) echo "readonly" ?>>
						</div>
					</div>
					
					<div class="form-group row my-2">
						<label for="edtNome" class="col-sm-2 col-form-label text-end">Nome do Usuário: &nbsp;<h11>*</h11>&nbsp;</label>
						<div class="col-sm-7">
							<input type="text" class="form-control" id="edtNome" name="edtNome" placeholder="Nome do Usuário" value="<?php if( $op != "I" ) { echo $dados->usuNome; } ?>" <?php if( $op == "C" ) echo "readonly" ?>>
						</div>
					</div>
					
					<div class="form-group row my-2">
						<label class="col-sm-2 col-form-label text-end">Data do Cadastro: &nbsp;</label>
						<label class="col-sm-7 col-form-label text-start"><?php if( $op != "I" ) { echo $dados->usuDataCad; } else { echo '---'; } ?></label>
					</div>
					
					<div class="form-group row my-2">
						<label for="edtStatus" class="col-sm-2 col-form-label text-end">Status: &nbsp;<h11>*</h11>&nbsp;</label>
						<div class="col-sm-7">
							<select required="" id="edtStatus" name="edtStatus" class="form-control col-md-8" <?php if( $op == "C" ) echo "disabled" ?> >
								<option value="A" <?php if( $op != "I" && $dados->usuStatus == "A" ) { echo "selected"; } ?>>Ativo</option>
								<option value="I" <?php if( $op != "I" && $dados->usuStatus == "I" ) { echo "selected"; } ?>>Inativo</option>
							</select>
						</div>
					</div>
					
					<div class="form-group row my-2">
						<label for="edtTipo" class="col-sm-2 col-form-label text-end">Tipo de Usuário: &nbsp;<h11>*</h11>&nbsp;</label>
						<div class="col-sm-7">
							<select required="" id="edtTipo" name="edtTipo" class="form-control col-md-8" <?php if( $op == "C" ) echo "disabled" ?> >
								<option value="M" <?php if( $op != "I" && $dados->usuTipo == "M" ) { echo "selected"; } ?>>Master</option>
								<option value="A" <?php if( $op != "I" && $dados->usuTipo == "A" ) { echo "selected"; } ?>>Admin</option>
								<option value="O" <?php if( $op != "I" && $dados->usuTipo == "O" ) { echo "selected"; } ?>>Operador</option>
							</select>
						</div>
					</div>

					<div class="form-group row my-2">
						<label for="edtMail" class="col-sm-2 col-form-label text-end">CEP: &nbsp;<h11>*</h11>&nbsp;</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" id="cep" name="CEP" onblur="pesquisacep(this.value);">
						</div>
					</div>	

					<div class="form-group row my-2">
						<label for="edtMail" class="col-sm-2 col-form-label text-end">Rua: &nbsp;<h11>*</h11>&nbsp;</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" id="rua" name="Rua" >
						</div>
					</div>	

					<div class="form-group row my-2">
						<label for="edtMail" class="col-sm-2 col-form-label text-end">Bairro: &nbsp;<h11>*</h11>&nbsp;</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" id="bairro" name="Bairro" >
						</div>
					</div>	

					<div class="form-group row my-2">
						<label for="edtMail" class="col-sm-2 col-form-label text-end">Cidade: &nbsp;<h11>*</h11>&nbsp;</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" id="cidade" name="Cidade" >
						</div>
					</div>	

					<div class="form-group row my-2">
						<label for="edtMail" class="col-sm-2 col-form-label text-end">UF: &nbsp;<h11>*</h11>&nbsp;</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" id="uf" name="UF" >
						</div>
					</div>	

					<div class="form-group row my-2">
						<label for="edtMail" class="col-sm-2 col-form-label text-end">IBGE: &nbsp;<h11>*</h11>&nbsp;</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" id="ibge" name="IBGE" >
						</div>
					</div>	
					
					<div class="col-md-12 my-3" >
						<div class="form-group col-md-8">
							<label class="col-md-6">&nbsp;</label>
							<button type="button" class="btn btn-dark col-md-2" onClick="window.open('usuario.php', '_self')">Sair</button>
							<label class="col-md-1">&nbsp;</label>
							<button type="submit" class="btn btn-dark col-md-2" <?php if( $op == "C" ) echo "disabled" ?> >Salvar</button>
						</div>
					</div>
				</form>
			</div>
	<p>&nbsp;</p>

	

<?php include_once("rodape.php"); ?>
 
<script>
   
    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");
            document.getElementById('ibge').value=("");
    }
 
    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('uf').value=(conteudo.uf);
            document.getElementById('ibge').value=(conteudo.ibge);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
       
    function pesquisacep(valor) {
 
        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');
 
        //Verifica se campo cep possui valor informado.
        if (cep != "") {
 
            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;
 
            //Valida o formato do CEP.
            if(validacep.test(cep)) {
 
                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('uf').value="...";
                document.getElementById('ibge').value="...";
 
                //Cria um elemento javascript.
                var script = document.createElement('script');
 
                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';
 
                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);
 
            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };
 
    </script>