<div class="container positioning">
<div class="jumbotron campo_cadastro">
    <form method="post" action="processa_cadastrar_interdicao.php" onsubmit="return validarFormCadastroInterdicao()">
        <?php if(isset($_GET['sucesso'])){ ?>
            <div class="alert alert-success" role="alert">
                Chamado cadastrada com sucesso.
            </div>
            <?php } ?>
            <?php if(isset($_GET['erroDB'])){ ?>
            <div class="alert alert-danger" role="alert">
                Falha ao cadastrar chamado.
            </div>
        <?php } ?>
        <div class="box">
            <nav>
            <h3>Dados ocorrência:</h3>
            </nav>
            <div>
                <span class="titulo">Nº ocorrência: </span><span><?php echo $_POST['id_ocorrencia']; ?></span>
                <span class="titulo">Título: </span><span><?php echo $_POST['titulo_ocorrencia']; ?></span>
            </div><hr>
            <div>
                <span class="titulo">Endereço principal: </span><span ng-model="sel_endereco" ng-init="sel_endereco='<?php echo $_POST['endereco_principal']; ?>'"><?php echo $_POST['endereco_principal']; ?></span>
                <br><br>
            </div>
            <div ng-show="sel_endereco == 'Coordenada'">
                <div>
                    <span class="titulo">Latitude: </span><span><?php echo $_POST['latitude']; ?></span>
                    <span class="titulo">Longitude: </span><span><?php echo $_POST['longitude']; ?></span>
                    <br>
                    <button type="button" class="btn-default btn-small inline open-AddBookDialog" data-toggle="modal" data-id="map"><span class="glyphicon glyphicon-map-marker"></span></button>
                </div>
                <span id="erroLatLgn" class="alertErro hide">Latitude e/ou Longitude inválida(s).</span>
            </div>
            <div ng-show="sel_endereco == 'Logradouro'">
                <div>
                    <span class="titulo">CEP: </span><span><?php echo $_POST['cep']; ?></span>
                    <span class="titulo">Logradouro: </span><span><?php echo $_POST['logradouro']; ?></span>
                    <span class="titulo">Número: </span><span><?php echo $_POST['numero']; ?></span>
                </div><br>
                <div>
                    <span class="titulo">Bairro: </span><span><?php echo $_POST['bairro']; ?></span> 
                    <span class="titulo">Cidade: </span><span><?php echo $_POST['cidade']; ?></span>
                </div><br>
                <div>
                    <span class="titulo">Referência: </span><span><?php echo $_POST['referencia']; ?></span>
                </div><br>
            </div>
        </div>
        <div class="box">
            <div>
                <span>Data: <span style="color:red;">*</span></span>
                <span style="position:relative;left:23%">Horário: <span style="color:red;">*</span></span> 
                <br>
                <input id="data" name="data" type="date" class="form-control" style="width:30%;display:inline;" max="<?php echo date('Y-m-d'); ?>" required>
                <input type="time" name="horario" class="form-control" style="width:30%;display:inline;" required>
            </div><br>
        </div>
        <div class="box">
            <div>
                Tipo: <span style="color:red;">*</span>
                <label for="tipo"></label>
                <select name="tipo" class="form-control" style="width:30%;" required>
                    <option value="Parcial">Parcial</option>
                    <option value="Total">Total</option>
                </select>
            </div>
            <div>
                Descrição: <span style="color:red;">*</span>
                <textarea id="descricao" name="descricao" class="form-control" cols="30" rows="2" maxlength="100" ng-model="descricaoVal" required></textarea>
                <span class="char-count">{{descricaoVal.length || 0}}/100</span>
            </div>
        </div>
        <input type="submit" class="btn btn-default btn-md" value="Cadastrar">
    </form>
</div>
</div>
