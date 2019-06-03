<div class="container positioning">
<div class="jumbotron campo_cadastro">
    <form method="post" action="processa_cadastrar_chamado.php">
        <?php if(isset($_GET['sucesso'])){ ?>
            <div class="alert alert-success" role="alert">
                Ocorrencia cadastrada com sucesso.
            </div>
            <?php } ?>
            <?php if(isset($_GET['erroDB'])){ ?>
            <div class="alert alert-danger" role="alert">
                Falha ao cadastrar ocorrencia.
            </div>
        <?php } ?>
        <div class="box">
            <div>
                Data: <span style="color:red;">*</span>
                <input id="data_chamado" name="data_chamado" type="date" class="form-control">
            </div>
            <div>
                Horário: <span style="color:red;">*</span>
                <input type="time" name="horario_chamado" class="form-control">
            </div>
            <div>
                Origem: <span style="color:red;">*</span>
                <input type="text" name="origem_chamado" class="form-control">
            </div>
            <div>
                Nome: <span style="color:red;">*</span>
                <input type="text" name="nome_chamado" class="form-control">
            </div>
            <div>
                Telefone: <span style="color:red;">*</span>
                <input type="text" name="telefone_chamado" class="form-control">
            </div>
        </div>
        <div class="box">
            <div>
                Endereço principal: <span style="color:red;">*</span>
                <label for="endereco_principal"></label>
                <select name="endereco_principal" class="form-control" ng-model="sel_endereco" ng-init="sel_endereco='Coordenada'" required>
                    <option value="Coordenada">Coordenada</option>
                    <option value="Logradouro">Logradouro</option>
                </select>
            </div>
            <div ng-show="sel_endereco == 'Coordenada'">
                <div>
                    Longitude: <span style="color:red;">*</span>
                    <input name="longitude" type="text" class="form-control">
                </div>
                <div>
                    Latitude: <span style="color:red;">*</span>
                    <input name="latitude" type="text" class="form-control">
                </div>
            </div>
            <div ng-show="sel_endereco == 'Logradouro'">
                <div>
                    CEP:
                    <input id="cep" name="cep" type="text" class="form-control" ng-model="cep">
                </div>
                <div>
                    Logradouro: <span style="color:red;">*</span>
                    <input id="logradouro" name="logradouro" type="text" class="form-control">
                </div>
                <div>
                    Número:
                    <input id="complemento" name="complemento" type="text" class="form-control">
                </div>
                <div>
                    Bairro:
                    <input id="bairro" name="bairro" type="text" class="form-control">
                </div>
                <div>
                    Cidade:
                    <input id="cidade" name="cidade" type="text" class="form-control">
                </div>
                <div>
                    Referência:
                    <input name="referencia" type="text" class="form-control">
                </div>
            </div>
        </div>
        <div class="box">
            <div>
                Descrição:
                <textarea id="descricao" name="descricao" class="form-control" cols="30" rows="2" maxlength = "100" ng-model="descricaoVal"></textarea>
                <span class="char-count">{{descricaoVal.length || 0}}/100</span>
            </div>
        </div>
        <input type="submit" class="btn btn-default btn-md" value="Cadastrar">
    </form>
</div>
</div>
