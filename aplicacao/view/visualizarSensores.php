<div class="container positioning">
<div class="jumbotron campo_cadastro">
    <div class="row">
        <div class="col-sm-3">
            <span class="map-dot" style="background-color:rgb(24,240,78);"></span>
            <span class="legenda">Normal</span>
        </div>
        <div class="col-sm-3">
            <span class="map-dot" style="background-color:yellow;"></span>
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
    <div class="map-information text-left">
        <span id="sensor" class="map-dot"></span>
        <div class="quadro-informacao">
            <span>Nível do rio: </span><span id="nivel_rio"></span><i id="nivel_rio_indicacao"></i><br>
            <span>Nível precipitação: </span><span id="nivel_precipitacao"></span><i id="nivel_precipitacao_indicacao"></i>
        </div>
    </div>
</div>