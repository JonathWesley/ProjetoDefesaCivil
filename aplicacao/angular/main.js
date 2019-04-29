var app = angular.module("myApp", []);

app.controller("myCtrl", function($scope){
    $scope.telefone = "(47) 3268-3133";
    $scope.endereco = "R. Pardal, 111 - Ariribá, Balneário Camboriú - SC";
    $scope.pesquisa = "";
    
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

    function SubmitFormData() {
        var nome_pessoa = $("#nome_pessoa").val();
        var email_pessoa = $("#email_pessoa").val();
        var telefone_pessoa = $("#telefone_pessoa").val();
        var cpf_pessoa = $("#cpf_pessoa").val();
        var pass_pessoa = $("#pass_pessoa").val();
        
        $.post("processa_cadastrar_pessoa.php", { nome_pessoa: nome_pessoa, email_pessoa: email_pessoa,
            telefone_pessoa: telefone_pessoa, cpf_pessoa: cpf_pessoa, pass_pessoa:pass_pessoa },
        function(data) {
         //$('#results').html(data);
         //$('#myForm')[0].reset();
        });
    }

    //Variaveis para salvar no cadastramento de ocorrencias
    $scope.cep = "";
});