<?php
include "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulário de Atendimento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .custom-option {
            display: none;
        }
        .show-input .custom-option {
            display: inline;
        }
    </style>
    <style>
        .result-container {
            position: relative;
        }
        #resultado {
            position: absolute;
            top: 82%;
            left: 0;
            right: 0;
            z-index: 1000;
            max-height: 200px;
            overflow-y: auto;
            border: 1px solid #ccc;
            border-radius: 0.25rem;
            background-color: #fff;
        }
    </style>
    <script>
        $(document).ready(function() {
            // Função para lidar com o input de pesquisa para Descrição
            $('#descricao').on('input', function() {
                var term = $(this).val();
                if (term.length >= 3) {
                    $.ajax({
                        url: '../buscar/buscacid.php',
                        type: 'GET',
                        data: { term: term },
                        dataType: 'json',
                        success: function(data) {
                            $('#resultado').empty();
                            if (data.length > 0) {
                                data.forEach(function(item) {
                                    $('#resultado').append(
                                        '<li class="list-group-item" data-descricao="' + item.descricao + '" data-codigo="' + item.codigo + '">' + item.descricao + '</li>'
                                    );
                                });
                            } else {
                                $('#resultado').append('<li class="list-group-item">Nenhum resultado encontrado</li>');
                            }
                        }
                    });
                } else {
                    $('#resultado').empty();
                }
            });

            // Função para selecionar o item da lista Descrição
            $('#resultado').on('click', 'li', function() {
                var descricao = $(this).data('descricao');
                var codigo = $(this).data('codigo');
                $('#descricao').val(descricao);
                $('#codigo').val(codigo);
                $('#resultado').empty();
            });

            // Limpar resultados ao clicar fora do campo de pesquisa
            $(document).on('click', function(event) {
                if (!$(event.target).closest('#descricao').length) {
                    $('#resultado').empty();
                }
            });

            // Função para limpar o campo pais ao limpar o campo descrição
            $('#descricao').on('input', function() {
                if ($(this).val() === '') {
                    $('#codigo').val('');
                }
            });
        });
    </script>
</head>
<body>
<form action="../formulario/insere_atendimento.php" method="post">
    <div>
        <!-- Cabeçalho -->
        <div class="text-center text-bg-dark mb-3">
            <span class="text-white">Dados do Atendimento</span>
        </div>
            
            <!-- Seção Pesquisa e Resultado -->
            <div class="input-group mb-3 ">
                <span class="input-group-text">Pacientes Cadastrados</span>
                <select name="paciente">
                <?php
                
                $sql="SELECT * FROM usuario";
                
                $resultado=$conn->prepare($sql);
                if ($resultado->execute()) {
                    $dados=$resultado->fetchAll();
                    foreach ($dados as $k) {
                        $id = $k['id_usuario'];
                        $sql2 = "SELECT * FROM dados_atendimento WHERE status = 1 AND id_usuarios = $id ";
                        $resultado2=$conn->prepare($sql2);
                        $resultado2->execute();
                        if ($resultado2->rowCount() != 0) {
                            ?>
                            <option value="<?php echo $k['id_usuario'];?>" ><?php echo $k['nome_paciente'];?> </option>
                            <?php
                        }
                        
                        }
                    }
                
                ?>   
                </select> 
            </div>
    </div>
    <div>
        <!-- Cabeçalho -->
        <div class="text-center text-bg-dark mb-3">
            <span class="text-white">Dados do Atendimento</span>
        </div>
        
        <!-- Formulário de Atendimento -->
        
            <!-- Data de Início e Competência -->
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Data de Início</span>
                <input name="data_inicio" type="date" class="form-control" aria-label="Data de Início" aria-describedby="inputGroup-sizing-sm">
                <span class="input-group-text" id="inputGroup-sizing-sm">Competência</span>
                <input name="competencia" type="month" class="form-control" aria-label="Competência" aria-describedby="inputGroup-sizing-sm">
            </div>
            
            <!-- Origem do Usuário -->
            <div class="mb-3">
                <label for="origem_paciente" class="input-group-text">Origem do Usuário</label>
                <select id="origem_paciente" name="origem_paciente" class="form-select" onchange="toggleCustomInput()">
                    <option value="01">01-DEMANDA ESPONTÂNEA</option>
                    <option value="02">02-ATENÇÃO BÁSICA</option>
                    <option value="03">03-SERVIÇO DE URGÊNCIA</option>
                    <option value="04">04-OUTRO CAPS</option>
                    <option value="05">05-HOSPITAL DIA</option>
                    <option value="06">06-HOSPITAL PSIQUIÁTRICO</option>
                </select>
            </div>
            
            <!-- CNES Execução -->
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">CNES Execução</span>
                <input name="cnes" type="number" class="form-control" aria-label="CNES Execução" aria-describedby="inputGroup-sizing-sm">
            </div>

            <!-- Nº da Autorização e Usuário de Álcool e/ou Outras Drogas -->
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Nº da Autorização</span>
                <input name="n_autorizacao" type="number" class="form-control" aria-label="Nº da Autorização" aria-describedby="inputGroup-sizing-sm">
                
                <label for="alcool_drogas" class="input-group-text">Usuário de Álcool e/ou Outras Drogas?</label>
                <select id="alcool_drogas" name="alcool_drogas" class="form-select" onchange="toggleCustomInput()">
                    <option value="nao">Não</option>
                    <option value="alcool">Álcool</option>
                    <option value="crack">Crack</option>
                    <option value="outros">Outros</option>
                </select>
            </div>

<div id="customInputContainer" style="display: none;">
    <label for="outros" class="input-group-text">Especifique:</label>
    <input type="text" id="outros" name="outros" class="form-control">
</div>

            <!-- Seção Pesquisa e Resultado -->
            <div class="input-group mb-3 result-container">
                <span class="input-group-text">CID principal</span>
                <input type="search" name="descricao" id="descricao" class="form-control form-control-lg" placeholder="Digite" aria-label="Pesquisar">
                <ul id="resultado" class="list-group mt-2"></ul>
                <!-- Seção País 
                <label class="input-group-text">codigo</label>
                <input type="text" id="codigo" name="codigo" class="form-control">
                -->
            </div>

            <!-- CID Causas Associadas e Existe Cobertura de EFS -->
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">CID Causas Assoc.</span>
                <input name="causas_assoc" type="text" class="form-control text-uppercase" aria-label="CID Causas Assoc." aria-describedby="inputGroup-sizing-sm" oninput="this.value = this.value.replace(/[^a-zA-Z]/g, '')">
                
                <span class="input-group-text" id="inputGroup-sizing-sm">Existe Cobertura de EFS?</span>
                <input name="cobertura_esf" type="text" class="form-control text-uppercase" aria-label="Existe Cobertura de EFS?" aria-describedby="inputGroup-sizing-sm" oninput="this.value = this.value.replace(/[^a-zA-Z]/g, '')">
            </div>

            <!-- Destino do Paciente e Data de Fim -->
            <div class="input-group input-group-sm mb-3">
                <label for="destino_paciente" class="input-group-text">Destino do Paciente</label>
                <select id="destino_paciente" name="destino_paciente" class="form-select">
                    <option value="00">00-PERMANÊNCIA</option>
                    <option value="01">01-CONTINUIDADE DO ACOMP. EM OUTRO CAPS</option>
                    <option value="02">02-CONTINUIDADE DO ACOMP. NA ATENÇÃO BÁSICA</option>
                    <option value="03">03-ALTA</option>
                    <option value="04">04-ÓBITO</option>
                </select>
                
                <span class="input-group-text" id="inputGroup-sizing-sm">Data de Fim</span>
                <input name="data_fim" type="date" class="form-control" aria-label="Data de Fim" aria-describedby="inputGroup-sizing-sm">
            </div>

        <!-- Botão de Enviar -->
            <div class="text-right mb-3">
                <button type="submit" class="btn btn-primary">Continuar </button>
            </div>
        </form>
    </div>

    <script>
        function toggleCustomInput() {
            var selectUsoDrogas = document.getElementById('usoDrogas');
            var customInput = document.getElementById('customInput');
            
            if (selectUsoDrogas.value === 'outros') {
                customInput.style.display = 'inline';
            } else {
                customInput.style.display = 'none';
            } 
        }
    </script>
</body>
</html>
<script>
    function toggleCustomInput() {
        const select = document.getElementById('alcool_drogas');
        const customInputContainer = document.getElementById('customInputContainer');
        
        if (select.value === 'outros') {
            customInputContainer.style.display = 'block';
        } else {
            customInputContainer.style.display = 'none';
        }
    }
</script>