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
<div class="text-center map-image">
    <div class="map-information" style="top:200px;left:200px;">
        <span id="sensor1" class="map-dot"></span>
        <div class="quadro-informacao">
            Temperatura do ar: <span id="temp_ar1"></span><br>
            Nível precipitação: <span id="nivel_precipitacao1"></span>
        </div>
    </div>
    <div class="map-information" style="top:200px;left:600px;">
        <span id="sensor2" class="map-dot"></span>
        <div class="quadro-informacao">
            Temperatura do ar: <span id="temp_ar2"></span><br>
            Nível precipitação: <span id="nivel_precipitacao2"></span>
        </div>
    </div>
    <div class="map-information" style="top:100px;left:200px;">
        <span id="sensor3" class="map-dot"></span>
        <div class="quadro-informacao">
            Temperatura do ar: <span id="temp_ar3"></span><br>
            Nível precipitação: <span id="nivel_precipitacao3"></span>
        </div>
    </div>
    <img src="images/mapaSensores.png" alt="mapa" class="img-thumbnail">
</div>