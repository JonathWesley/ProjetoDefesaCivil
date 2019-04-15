    <div class="container positioning">
        <div class="jumbotron">
            <div class="box">
                <div class="input-group">
                    <input id="pesquisa" type="text" class="form-control" name="pesquisa" placeholder="Pesquisa" ng-model="pesquisa">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                </div>
            </div>
            <div class="box" ng-click="exibirUsuario()" ng-repeat="x in usuarios | filter:pesquisa">
                <nav>
                    <span>Código de pessoa:</span>
                    <span>{{x.codPessoa}}</span>
                </nav>
                <nav>
                    <span>Nome:</span>
                    <span>{{x.nome}}</span>
                </nav>
            </div>
        </div>
    </div>