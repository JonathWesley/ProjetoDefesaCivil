    <div class="container positioning">
    <div class="jumbotron">
        <div class="box">
            <div class="input-group">
                <input id="pesquisa" type="text" class="form-control" name="pesquisa" placeholder="Pesquisa" ng-model="pesquisa">
                <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
            </div>
        </div>
        <div class="box" ng-click="exibirOcorrencia()" ng-repeat="x in ocorrencias | filter:pesquisa">
            <nav>
                <span>ID:</span>
                <span>{{x.id}}</span>
            </nav>
            <nav>
                <span>Cobrade:</span>
                <span>{{x.cobrade}}</span>
            </nav>
            <nav>
                <span>Prioridade:</span>
                <span>{{x.prioridade}}</span>
            </nav>
        </div>
    </div>
    </div>
    </div>