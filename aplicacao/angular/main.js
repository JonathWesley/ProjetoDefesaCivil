angular.module("myApp", []).controller("myCtrl", function($scope){
    $scope.telefone = "(47) 3268-3133";
    $scope.endereco = "R. Pardal, 111 - Ariribá, Balneário Camboriú - SC";
    $scope.pesquisa = "";
    $scope.sel_endereco = "Coordenada";
    $scope.categoria = 0;
    $scope.grupo = 0;
    $scope.subgrupo = 0;
    $scope.tipo = 0;
    $scope.subtipo = 0;
    
    $("#cep").focusout(function(){
        $(this).val().replace('-', '');
        $.ajax({
            url: 'https://viacep.com.br/ws/'+$(this).val()+'/json/unicode/',
            dataType: 'json',
            success: function(resposta){
                $("#logradouro").val(resposta.logradouro);
                $("#complemento").val(resposta.complemento);
                $("#bairro").val(resposta.bairro);
                $("#cidade").val(resposta.localidade);
                //$("#uf").val(resposta.uf);
                //$("#numero").focus();
            }
        });	
    });
});