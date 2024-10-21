
<?php
include "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro de Ações Realizadas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        /* Estilo para garantir que a lista de resultados fique diretamente abaixo do campo de entrada */
        .result-container, .result-cont {
            position: relative;
        }

        #resultado, #result {
            position: absolute;
            top: 82%; /* Ajustado para ficar diretamente abaixo do campo de entrada */
            left: 0;
            right: 0;
            z-index: 1000;
            max-height: 200px; /* Ajuste conforme necessário */
            overflow-y: auto;
            border: 1px solid #ccc;
            border-radius: 0.25rem;
            background-color: #fff;
        }
    </style>
    <script>
        
        $(document).ready(function() {
            // Função para lidar com o input de pesquisa para Descrição
            $('#n_paciente').on('input', function() {
                var term = $(this).val();
                if (term.length >= 3) {
                    $.ajax({
                        url: '../buscar/buscacbo.php',
                        type: 'GET',
                        data: { term: term },
                        dataType: 'json',
                        success: function(data) {
                            $('#resultado').empty();
                            if (data.length > 0) {
                                data.forEach(function(item) {
                                    $('#resultado').append(
                                        '<li class="list-group-item" data-descricao="' + item.descricao + '" data-ocupacao="' + item.ocupacao + '">' + item.descricao + '</li>'
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
                var ocupacao = $(this).data('ocupacao');
                $('#n_paciente').val(descricao);
                $('#ocupacao').val(ocupacao);
                $('#resultado').empty();
            });

            // Função para lidar com o input de pesquisa para CNS
            $('#cns').on('input', function() {
                var term = $(this).val();
                if (term.length >= 3) {
                    $.ajax({
                        url: '../buscar/buscacns.php',
                        type: 'GET',
                        data: { term: term },
                        dataType: 'json',
                        success: function(data) {
                            $('#result').empty();
                            if (data.length > 0) {
                                data.forEach(function(item) {
                                    $('#result').append(
                                        '<li class="list-group-item" data-cpf="' + item.cpf + '" data-cns="' + item.cns + '" data-nome="' + item.nome + '" data-cbo="' + item.cbo + '">' +
                                        'CNS: ' + item.cns + ' - Nome: ' + item.nome + ' - CPF: ' + item.cpf + ' - CBO: ' + item.cbo + '</li>'
                                    );
                                });
                            } else {
                                $('#result').append('<li class="list-group-item">Nenhum resultado encontrado</li>');
                            }
                        }
                    });
                } else {
                    $('#result').empty();
                }
            });

            // Função para selecionar o item da lista CNS
            $('#result').on('click', 'li', function() {
                var cpf = $(this).data('cpf');
                var cns = $(this).data('cns');
                var nome = $(this).data('nome');
                var cbo = $(this).data('cbo');
                $('#cpf').val(cpf);
                $('#cns').val(cns);
                $('#nome').val(nome);
                $('#cbo').val(cbo);
                $('#result').empty();
            });

            // Limpar resultados ao clicar fora do campo de pesquisa
            $(document).on('click', function(event) {
                if (!$(event.target).closest('#n_paciente').length) {
                    $('#resultado').empty();
                }
                if (!$(event.target).closest('#cns').length) {
                    $('#result').empty();
                }
            });

            // Função para limpar os campos ao limpar o campo de pesquisa
            $('#n_paciente').on('input', function() {
                if ($(this).val() === '') {
                    $('#ocupacao').val('');
                }
            });

            $('#cns').on('input', function() {
                if ($(this).val() === '') {
                    $('#cpf').val('');
                    $('#nome').val('');
                    $('#cbo').val('');
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#options').on('change', function() {
                var selectedValue = $(this).val();
                $('#descriptionSpan').val(selectedValue);
            });
        });
    </script>
</head>
<body>
    <div class="container mt-4">
        <div class="text-center text-bg-dark mb-4">
            <span class="text-white">Ações Realizadas</span>
        </div>
        
        <form action="../formulario/insere_acoes.php" method="post">
             <!-- Seção Código de Ação e Descrição -->
             <div class="mb-3">
            

            <div class="input-group mb-3">
            <label for="descriptionSpan" class="input-group-text">Código de Ação Descrição</label>
            <input type="text" id="descriptionSpan" name="cod_acao" class="form-control text-uppercase" placeholder="Código de Ação">
                <span class="input-group-text">Descrição</span>
                <select id="descricao_acao" name="descricao_acao" class="form-select" onchange="atualizarCodigo()">
                    <option value="0301080020">ACOLHIMENTO NOTURNO DE PACIENTE EM CENTRO DE ATENÇÃO PSICOSSOCIAL</option>
                    <option value="0301080038">ACOLHIMENTO EM TERCEIRO TURNO DE PACIENTE EM CENTRO DE ATENÇÃO PSICOSSOCIAL</option>
                    <option value="0301080046">ACOMPANHAMENTO DE PACIENTE EM SAÚDE MENTAL (RESIDÊNCIA TERAPÊUTICA)</option>
                    <option value="0301080194">ACOLHIMENTO DIURNO DE PACIENTE EM CENTRO DE ATENÇÃO PSICOSSOCIAL</option>
                    <option value="0301080208">ATENDIMENTO INDIVIDUAL DE PACIENTE EM CENTRO DE ATENÇÃO PSICOSSOCIAL</option>
                    <option value="0301080216">ATENDIMENTO EM GRUPO DE PACIENTE EM CENTRO DE ATENÇÃO PSICOSSOCIAL</option>
                    <option value="0301080224">ATENDIMENTO FAMILIAR EM CENTRO DE ATENÇÃO PSICOSSOCIAL</option>
                    <option value="0301080240">ATENDIMENTO DOMICILIAR PARA PACIENTES DE CENTRO DE ATENÇÃO PSICOSSOCIAL</option>
                    <option value="0301080275">PRÁTICAS CORPORAIS EM CENTRO DE ATENÇÃO PSICOSSOCIAL</option>
                    <option value="0301080283">PRÁTICAS EXPRESSIVAS E COMUNICATIVAS EM CENTRO DE ATENÇÃO PSICOSSOCIAL</option>
                    <option value="0301080291">ATENÇÃO ÀS SITUAÇÕES DE CRISE</option>
                    <option value="0301080348">AÇÕES DE REABILITAÇÃO PSICOSSOCIAL</option>
                    <option value="0301080356">PROMOÇÃO DE CONTRATUALIDADE NO TERRITÓRIO</option>
                    <option value="0301080364">ACOMPANHAMENTO DE PESSOAS COM NECESSIDADES DECORRENTES DO USUÁRIO</option>
                    <option value="0301080372">ACOMPANHAMENTO DE PESSOAS ADULTAS COM SOFRIMENTO OU TRANSTORNO</option>
                    <option value="0301080380">ACOMPANHAMENTO DA POPULAÇÃO INFANTO-JUVENIL COM SOFRIMENTO</option>
                </select>
            </div>

            </div>


            <!-- Seção Quantidade, Serviço, Data e Classificação -->
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text">QTDE.</span>
                <input name="quantidade" type="number" class="form-control" aria-label="Quantidade">
                
                <span class="input-group-text">SRV.</span>
                <input name="srv" type="number" class="form-control" aria-label="Serviço">
                
                <span class="input-group-text">Dt. Realiz.</span>
                <input name="data_realizacao" type="date" class="form-control" aria-label="Data de Realização">
                
                <span class="input-group-text">CLASS.</span>
                <input name="class" type="number" class="form-control" aria-label="Classificação">
            </div>
            
            <!-- Seção Local de Realização -->
            <div class="mb-3">
                <span class="input-group-text">Local de Realização</span>
                <input name="local_realizado" type="text" class="form-control text-uppercase" aria-label="Local de Realização" oninput="this.value = this.value.replace(/[^a-zA-Z]/g, '')">
            </div>

            <!-- Seção Pesquisa e Resultado -->
            <div class="input-group mb-3 result-container">
                <span class="input-group-text">Descrição</span>
                <input type="search" name="n_paciente" id="n_paciente" class="form-control form-control-lg form-control-clear" placeholder="Digite" aria-label="Pesquisar">
                <ul id="resultado" class="list-group mt-2"></ul>
                <!-- Seção Ocupação -->
                <label class="input-group-text">CBO</label>
                <input type="text" id="ocupacao" name="ocupacao" class="form-control">
            </div>

            <div class="input-group mb-3 result-cont">
                <span class="input-group-text">CNS</span>
                <input type="search" name="cns" id="cns" class="form-control form-control-lg form-control-clear" placeholder="Digite" aria-label="Pesquisar">
                <ul id="result" class="list-group mt-2"></ul>
                <!-- Seção Campos Associados -->
                <label class="input-group-text">Nome</label>
                <input type="text" id="nome" name="nome" class="form-control">
                
                <label class="input-group-text">CPF</label>
                <input type="text" id="cpf" name="cpf" class="form-control">
            </div>
                <input type="hidden" name="id" value="<?= $id ?>">
            <!-- Botão Enviar -->
            <div class="text-right mb-3">
                <button type="submit" class="btn btn-primary">Finalizar</button>
            </div>
        </form>
    </div>
</body>
</html>

<script>
function atualizarCodigo() {
    var select = document.getElementById('descricao_acao');
    var input = document.getElementById('descriptionSpan');
    input.value = select.value; // Copia o valor do select para o input
}
</script>

