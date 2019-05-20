angular.module("myApp", []).controller("myCtrl", function($scope){
    $scope.telefone = "(47) 3268-3133";
    $scope.endereco = "R. Pardal, 111 - Ariribá, Balneário Camboriú - SC";
    $scope.pesquisa = "";
    $scope.retorno = false;
    $scope.categoria = '0';
    $scope.grupo = '0';
    $scope.subgrupo = '0';
    $scope.tipo = '0';
    $scope.subtipo = '0';

    
    $("#editEnderecoBtn").click(function(){
        if($("#coordenada_principal").html() == "Coordenada")
            $("#coordenada_principal").replaceWith($('<label for="endereco_principal"></label><select id="endereco_principal" name="endereco_principal" class="form-control" ng-model="sel_endereco" required><option value="Coordenada">Coordenada</option><option value="Logradouro">Logradouro</option></select>'));
        else
            $("#coordenada_principal").replaceWith($('<label for="endereco_principal"></label><select id="endereco_principal" name="endereco_principal" class="form-control" ng-model="sel_endereco" required><option value="Logradouro">Logradouro</option><option value="Coordenada">Coordenada</option></select>'));
        $("#logradouro").replaceWith($('<input id="logradouro" name="logradouro" type="text" class="form-control" value="'+$('#logradouro').html()+'">'));
        $("#numero").replaceWith($('<input id="numero" name="numero" type="text" class="form-control" value="'+$('#numero').html()+'">'));
        $('#referencia').replaceWith($('<input id="referencia" name="referencia" type="text" class="form-control" value="'+$('#referencia').html()+'">'));
        $('#latitude').replaceWith($('<input id="latitude" name="latitude" type="text" class="form-control" value="'+$('#latitude').html()+'">'));
        $('#longitude').replaceWith($('<input id="longitude" name="longitude" type="text" class="form-control" value="'+$('#longitude').html()+'">'));
        $('#editEnderecoBtn').replaceWith($('<button id="editEnderecoBtn" type="button" class="btn btn-default btn-sm" onclick="salva()">Salvar</button>'));
    });

    $("#editAgentesBtn").click(function(){
        $("#agente_principal").replaceWith($('<input id="agente_principal" name="agente_principal" type="text" class="form-control" value="'+$('#agente_principal').html()+'">'));
        $("#agente_apoio_1").replaceWith($('<input id="agente_apoio_1" name="agente_apoio_1" type="text" class="form-control" value="'+$('#agente_apoio_1').html()+'">'));
        $('#agente_apoio_2').replaceWith($('<input id="agente_apoio_2" name="agente_apoio_2" type="text" class="form-control" value="'+$('#agente_apoio_2').html()+'">'));
        $('#editAgentesBtn').replaceWith($('<button id="editAgentesBtn" type="button" class="btn btn-default btn-sm" onclick="salva()">Salvar</button>'));
    });

    $("#editOcorrenciaBtn").click(function(){
        $("#ocorr_referencia").replaceWith($('<input id="ocorr_referencia" name="ocorr_referencia" type="text" class="form-control" value="'+$('#ocorr_referencia').html()+'">'));
        //$("#data_lancamento").replaceWith($('<input id="data_lancamento" name="data_lancamento" type="date" class="form-control" value="'+$('#data_lancamento').val()+'">'));
        //$("#data_ocorrencia").replaceWith($('<input id="data_ocorrencia" name="data_ocorrencia" type="date" class="form-control" value="'+$('#data_ocorrencia').val()+'">'));
        $("#ocorr_descricao").replaceWith($('<input id="ocorr_descricao" name="ocorr_descricao" type="text" class="form-control" value="'+$('#ocorr_descricao').html()+'">'));
        $("#ocorr_origem").replaceWith($('<input id="ocorr_origem" name="ocorr_origem" type="text" class="form-control" value="'+$('#ocorr_origem').html()+'">'));
        $('#editOcorrenciaBtn').replaceWith($('<button id="editOcorrenciaBtn" type="button" class="btn btn-default btn-sm" onclick="salva()">Salvar</button>'));
    });

    $("#editAtendidosBtn").click(function(){
        $("#atendido_1").replaceWith($('<input id="atendido_1" name="atendido_1" type="text" class="form-control" value="'+$('#atendido_1').html()+'">'));
        $("#atendido_2").replaceWith($('<input id="atendido_2" name="atendido_2" type="text" class="form-control" value="'+$('#atendido_2').html()+'">'));
        $('#editAtendidosBtn').replaceWith($('<button id="editAtendidosBtn" type="button" class="btn btn-default btn-sm" onclick="salva()">Salvar</button>'));
    });

    $("#editTipoBtn").click(function(){
        $("#ocorr_cobrade").replaceWith($('<input id="ocorr_cobrade" name="ocorr_cobrade" type="text" class="form-control" value="'+$('#ocorr_cobrade').html()+'">'));
        $("#ocorr_natureza").replaceWith($('<input id="ocorr_natureza" name="ocorr_natureza" type="text" class="form-control" value="'+$('#ocorr_natureza').html()+'">'));
        $('#editTipoBtn').replaceWith($('<button id="editTipoBtn" type="button" class="btn btn-default btn-sm" onclick="salva()">Salvar</button>'));
    });

    $("#editStatusEdit").click(function(){
        $("#").replaceWith($('<input id="" name="" type="text" class="form-control" value="'+$('#').html()+'">'));
        $('#editStatusEdit').replaceWith($('<button id="editStatusEdit" type="button" class="btn btn-default btn-sm" onclick="salva()">Salvar</button>'));
    });

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

//ordenar tabela de ocorrencias
function sortTable(n) {
    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    table = document.getElementById("tabela");
    switching = true;
    //Set the sorting direction to ascending:
    dir = "asc"; 
    /*Make a loop that will continue until
    no switching has been done:*/
    while (switching) {
        //start by saying: no switching is done:
        switching = false;
        rows = table.rows;
        /*Loop through all table rows (except the
        first, which contains table headers):*/
        for (i = 1; i < (rows.length - 1); i++) {
            //start by saying there should be no switching:
            shouldSwitch = false;
            /*Get the two elements you want to compare,
            one from current row and one from the next:*/
            x = rows[i].getElementsByTagName("td")[n];
            y = rows[i + 1].getElementsByTagName("td")[n];
            /*check if the two rows should switch place,
            based on the direction, asc or desc:*/
            if (dir == "asc") {
                if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                    //if so, mark as a switch and break the loop:
                    shouldSwitch= true;
                    break;
                }
            } else if (dir == "desc") {
                if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                    //if so, mark as a switch and break the loop:
                    shouldSwitch = true;
                    break;
                }
            }
        }
        if (shouldSwitch) {
            /*If a switch has been marked, make the switch
            and mark that a switch has been done:*/
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
            //Each time a switch is done, increase this count by 1:
            switchcount ++;      
        } else {
            /*If no switching has been done AND the direction is "asc",
            set the direction to "desc" and run the while loop again.*/
            if (switchcount == 0 && dir == "asc") {
            dir = "desc";
            switching = true;
            }
        }
    }
}