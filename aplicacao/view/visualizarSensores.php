<div class="container positioning">
<div class="jumbotron campo_cadastro">
    <div class="row">
        <div class="col-sm-3">
            <span class="map-dot" style="background-color:rgb(24,240,78);"></span>
            <span class="legenda">Normal</span>
        </div>
        <div class="col-sm-3">
            <span class="map-dot" style="background-color:yellow;"></span>
            <span class="legenda">Atenção</span>
        </div>
        <div class="col-sm-3">
            <span class="map-dot" style="background-color:orange;"></span>
            <span class="legenda">Alerta</span>
        </div>
        <div class="col-sm-3">
            <span class="map-dot" style="background-color:red;"></span>
            <span class="legenda">Emergência</span>
        </div>
    </div><hr>
    <div class="row">
        <div class="col-sm-3">
            <i class="arrow-up"></i>
            <span class="legenda">Nível Subindo</span>
        </div>
        <div class="col-sm-3">
            <i class="arrow-down"></i>
            <span class="legenda">Nível Descendo</span>
        </div>
        <div class="col-sm-3">
            <i class="estavel"></i>
            <span class="legenda">Estável</span>
        </div>
    </div>
</div>
</div>
<div class="text-center">
    <img src="images/mapaSensores.png" alt="mapa" class="img-thumbnail img-mapa">
    <div class="map-information text-left" style="position: relative;top: -290px;left: 70%;">
        <span id="sensor99018" class="map-dot" style="background-color:rgb(24,240,78)"></span>
        <div class="quadro-informacao">
            <span>Nível do rio: </span><span id="nivel_rio99018"></span><i id="nivel_rio99018_indicacao"></i><br>
            <span>Nível precipitação (10min): </span><span id="nivel_precipitacao99018_10"></span><i id="nivel_precipitacao99018_indicacao_10"></i>
        </div>
    </div>
    <div class="map-information text-left" style="position: relative;top: -180px;left: 41%;">
        <span id="sensor1019" class="map-dot" style="background-color:rgb(24,240,78)"></span>
        <div class="quadro-informacao">
            <span>Temperatura: </span><span id="temperatura1019"></span><i id="temperatura1019_indicacao"></i><br>
            <span>Nível precipitação (1h): </span><span id="nivel_precipitacao1019_1"></span><i id="nivel_precipitacao1019_indicacao_1"></i><br>
            <span>Nível precipitação (12h): </span><span id="nivel_precipitacao1019_12"></span><i id="nivel_precipitacao1019_indicacao_12"></i>
        </div>
    </div>
</div>