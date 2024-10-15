<?php

require_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Identificação do Usuário do SUS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                        url: '../buscar/buscapais.php',
                        type: 'GET',
                        data: { term: term },
                        dataType: 'json',
                        success: function(data) {
                            $('#resultado').empty();
                            if (data.length > 0) {
                                data.forEach(function(item) {
                                    $('#resultado').append(
                                        '<li class="list-group-item" data-descricao="' + item.descricao + '" data-pais="' + item.pais + '">' + item.descricao + '</li>'
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
                var pais = $(this).data('pais');
                $('#descricao').val(descricao);
                $('#pais').val(pais);
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
                    $('#pais').val('');
                }
            });
        });
    </script>
</head>
<body>
    <div class="mt-4">
        <!-- Cabeçalho -->
        <div class="text-center text-bg-dark mb-4">
            <span class="text-white">Identificação do Usuário do SUS</span>
        </div>

        <!-- Formulário -->
        <form action="../formulario/insere_paciente.php" method="post">
            <!-- Nº Prontuário e CNS/CPF Paciente -->
            <div class="input-group input-group-sm mb-4">
                <span class="input-group-text" id="inputGroup-sizing-sm">Nome Paciente</span>
                <input type="text" name="nome_paciente" class="form-control text-uppercase" aria-label="Nome do Paciente"
                    aria-describedby="inputGroup-sizing-sm"
                    oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '')">

                <span class="input-group-text" id="inputGroup-sizing-sm">Nº Prontuário</span>
                <input type="number" name="n_prontuario" class="form-control" aria-label="Número do Prontuário"
                    aria-describedby="inputGroup-sizing-sm">

                <span class="input-group-text" id="inputGroup-sizing-sm">CNS/CPF Paciente</span>
                <input type="number" name="cns_cpf" class="form-control" aria-label="CNS ou CPF do Paciente"
                    aria-describedby="inputGroup-sizing-sm">
            </div>

            <!-- Sexo, Data de Nascimento -->
            <div class="input-group input-group-sm mb-3">
            <label for="sexo" class="input-group-text">Sexo</label>
                <select id="sexo" name="sexo" class="form-select" onchange="toggleCustomInput()">
                    <option value="m">Masculino</option>
                    <option value="f">Feminino</option>
                </select>

                <span class="input-group-text" id="inputGroup-sizing-sm">Dt. Nascimento</span>
                <input type="date" name="dt_nascimento" class="form-control" aria-label="Data de Nascimento"
                    aria-describedby="inputGroup-sizing-sm">
            </div>

            <!-- Seção Pesquisa e Resultado -->
            <div class="input-group mb-3 result-container">
                <span class="input-group-text">País</span>
                <input type="search" name="descricao" id="descricao" class="form-control form-control-lg" placeholder="Digite" aria-label="Pesquisar">
                <ul id="resultado" class="list-group mt-2"></ul>
                <!-- Seção País -->
                <label class="input-group-text">Descrição</label>
                <input type="text" id="pais" name="pais" class="form-control">
            </div>

            <!-- Raça/Cor e Etnia Indígena -->
            <div class="input-group input-group-sm mb-3">
                <label for="options" class="input-group-text">Raça/Cor</label>
                <select id="options" name="options" class="form-select" onchange="toggleCustomInput()">
                    <option value="01">01 BRANCA</option>
                    <option value="02">02 PRETA</option>
                    <option value="03">03 PARDA</option>
                    <option value="04">04 AMARELA</option>
                    <option value="05">05 INDÍGENA</option>
                </select>

                <span class="input-group-text" id="inputGroup-sizing-sm">Etnia</span>
                <input type="text" name="etnia_indigena" class="form-control text-uppercase" aria-label="Etnia Indígena"
                    aria-describedby="inputGroup-sizing-sm" oninput="this.value = this.value.replace(/[^a-zA-Z]/g, '')">
            </div>

            <!-- Nome da Mãe e Nome do Responsável -->
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Nome da Mãe</span>
                <input type="text" name="nome_mae" class="form-control text-uppercase" aria-label="Nome da Mãe"
                    aria-describedby="inputGroup-sizing-sm" oninput="this.value = this.value.replace(/[^a-zA-Z]/g, '')">

                <span class="input-group-text" id="inputGroup-sizing-sm">Nome do Responsável</span>
                <input type="text" name="nome_responsavel" class="form-control text-uppercase" aria-label="Nome do Responsável"
                    aria-describedby="inputGroup-sizing-sm" oninput="this.value = this.value.replace(/[^a-zA-Z]/g, '')">
            </div>

            <!-- Município de Residência, CEP, Endereço e Complemento -->
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Município de Residência</span>
                <input type="text" name="municipio_residencia" class="form-control text-uppercase" aria-label="Município de Residência"
                    aria-describedby="inputGroup-sizing-sm">

                <span class="input-group-text" id="inputGroup-sizing-sm">CEP</span>
                <input type="text" name="cep" id="cep" class="form-control" placeholder="Digite seu CEP"
                    oninput="formatCEP(this)" maxlength="9">

                <span class="input-group-text" id="inputGroup-sizing-sm">Endereço</span>
                <input type="text" name="endereco" class="form-control text-uppercase" aria-label="Endereço"
                    aria-describedby="inputGroup-sizing-sm">
            </div>

            <!-- Complemento, Telefone Celular, Telefone de Contato e Situação de Rua -->
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Complemento</span>
                <input type="text" name="complemento" class="form-control text-uppercase" aria-label="Complemento"
                    aria-describedby="inputGroup-sizing-sm">
                <span class="input-group-text" id="inputGroup-sizing-sm">Telefone Celular</span>
                <input type="tel" name="telefone_celular" class="form-control" aria-label="Telefone Celular"
                    aria-describedby="inputGroup-sizing-sm" oninput="formatPhoneNumber(this)" maxlength="15">

                <span class="input-group-text" id="inputGroup-sizing-sm">Telefone de Contato</span>
                <input type="tel" name="telefone_contato" class="form-control" aria-label="Telefone de Contato"
                    aria-describedby="inputGroup-sizing-sm" oninput="formatPhoneNumber(this)" maxlength="15">

                <span class="input-group-text" id="inputGroup-sizing-sm">Em Situação de Rua?</span>
                <input type="text" name="situacao_rua" class="form-control text-uppercase" aria-label="Em Situação de Rua?"
                    aria-describedby="inputGroup-sizing-sm" oninput="this.value = this.value.replace(/[^a-zA-Z]/g, '')">
            </div>

            <!-- Botão de Enviar -->
            <div class="text-right mb-3">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </form>
    </div>
</body>
</html>

