//modulo do angular
angular.module("myApp", []).controller("myCtrl", function($scope){
    $scope.pesquisa = "";
    $scope.retorno = false;
    $scope.categoria = '0';
    $scope.grupo = '0';
    $scope.subgrupo = '0';
    $scope.tipo = '0';
    $scope.subtipo = '0';
    $scope.fotos = false;
});

//codigos jquery - javascript
$("#cep").focusout(function(){
    $(this).val().replace('-', '');
    $(this).val().replace('.', '');
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

$("#telefone_pessoa").mask("(00) 0000-0000");
$("#telefone").mask("(00) 00000-0000");
$("#celular_pessoa").mask("(00) 00000-0000");
$("#cep").mask("00000-000");
$("#cpf").mask("000.000.000-00");
$("#cpf_pessoa").mask("000.000.000-00");

function verificaCpf(cpf){
    cpf = cpf.split(".").join("").replace('-','');
    var numeros, digitos, soma, i, resultado;
    var digitos_iguais = true;
    digitos_iguais = 1;
    if(cpf.length < 11){
        $("#erroCpf").removeClass("hide");
        return;
    }
    for(i = 0; i < cpf.length - 1; i++){
        if (cpf.charAt(i) != cpf.charAt(i + 1)){
            digitos_iguais = false;
            break;
        }
    }
    if(!digitos_iguais){
        numeros = cpf.substring(0,9);
        digitos = cpf.substring(9);
        soma = 0;
        for (i = 10; i > 1; i--){
            soma += numeros.charAt(10 - i) * i;
        }
        resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
        if (resultado != digitos.charAt(0)){
            $("#erroCpf").removeClass("hide");
            return;
        }
        numeros = cpf.substring(0,10);
        soma = 0;
        for (i = 11; i > 1; i--){
            soma += numeros.charAt(11 - i) * i;
        }
        resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
        if (resultado != digitos.charAt(1)){
            $("#erroCpf").removeClass("hide");
            return;
        }
        $("#erroCpf").addClass("hide");
        return;
    }else{
        $("#erroCpf").removeClass("hide");
        return;
    }
}

function verificaCelular(telefone){
    if(/\([0-9]{2}\)[\s][0-9]{4,5}-[0-9]{4}/.test(telefone))
        $("#erroCelular").addClass("hide");
    else
        $("#erroCelular").removeClass("hide");
}

function verificaTelefone(telefone){
    if(/\([0-9]{2}\)\s[0-9]{4}\-[0-9]{4}/.test(telefone))
        $("#erroTelefone").addClass("hide");
    else
        $("#erroTelefone").removeClass("hide");
}

function verificaSenha(senha){
    if(!/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{6,})/.test(senha)){
        $("#erroSenha").removeClass("hide");
    }else{
        $("#erroSenha").addClass("hide");
    }
}

function verificaConfirmaSenha(confirmaSenha){
    senha = $("#senha").val();
    if(senha != confirmaSenha){
        $("#erroConfirmaSenha").removeClass("hide");
    }else{
        $("#erroConfirmaSenha").addClass("hide");
    }
}

function validarFormCadastroUsuario(){
    if(!$("#erroCpf").hasClass("hide") || !$("#erroTelefone").hasClass("hide")
       || !$("#erroSenha").hasClass("hide") || !$("#erroConfirmaSenha").hasClass("hide")){
        
        alert("Existe campo(s) infomado(s) incorretamente.");
        return false;
    }
}

function validarFormCadastroPessoa(){
    if(!$("#erroCpf").hasClass("hide") || !$("#erroTelefone").hasClass("hide")){
        alert("Existe campo(s) infomado(s) incorretamente.");
        return false;
    }
    return true;
}

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

function showResult(str, id_input) {
    var id = "livesearch"+id_input;
    if (str.length==0) { 
        document.getElementById(id).innerHTML="";
        document.getElementById(id).style.border="0px";
        return;
    }
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    } else {  // code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
            document.getElementById(id).innerHTML=this.responseText;
            document.getElementById(id).style.border="1px solid #A5ACB2";
        }
    }
    xmlhttp.open("GET","livesearch.php?q="+str+"&id="+id_input,true);
    xmlhttp.send();
}

function selecionaComplete(value, id_input){
    var id = "livesearch"+id_input;
    document.getElementById(id_input).value = value;
    document.getElementById(id).innerHTML="";
    document.getElementById(id).style.border="0px";
}

$(document).on("click", ".open-AddBookDialog", function () {
    var element_id = $(this).data('id');
    if(element_id == 'map'){
        if(navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(myMap);
            $('#map').modal('show');  
        }else{
            $('#map').modal('show');
        }
    }else{
        $(".modal-body #id_pessoa").val( element_id );
        $('#pessoasModal').modal('show');
    }
});

//POST pessoa
var input = document.getElementById("submitFormData");
// Execute a function when the user releases a key on the keyboard
input.addEventListener("keydown", function(event) {
// Number 13 is the "Enter" key on the keyboard
if (event.keyCode === 13) {
    // Cancel the default action, if needed
    event.preventDefault();
    // Trigger the button element with a click
    document.getElementById("submitFormData").click();
}
});

function SubmitFormData() {
    if(!validarFormCadastroPessoa()){
        return false;
    }

    var id_input = $("#id_pessoa").val();
    var nome_pessoa = $("#nome_pessoa").val();
    var email_pessoa = $("#email_pessoa").val();
    var celular_pessoa = $("#celular_pessoa").val();
    var telefone_pessoa = $("#telefone_pessoa").val();
    var cpf_pessoa = $("#cpf_pessoa").val();
    var outros_documentos = $("#outros_documentos").val();

    var id="result"+id_input;
    
    //$.post("processa_cadastrar_pessoa.php", { nome_pessoa: nome_pessoa, email_pessoa: email_pessoa,
    //    telefone_pessoa: telefone_pessoa, cpf_pessoa: cpf_pessoa, outros_documentos:outros_documentos, nome_salvar: nome_pessoa });
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    } else {  // code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
            document.getElementById(id).innerHTML=this.responseText;
            if(this.responseText == 'Pessoa cadastrado com sucesso'){
                document.getElementById(id).style.color="#00FF00";
                document.getElementById(id_input).value = nome_pessoa;
            }else
                document.getElementById(id).style.color="#FF0000";
        }
    }
    xmlhttp.open("GET","processa_cadastrar_pessoa.php?nome_pessoa="+nome_pessoa+"&email_pessoa="+email_pessoa+"&celular_pessoa="+celular_pessoa+"&telefone_pessoa="+telefone_pessoa+"&cpf_pessoa="+cpf_pessoa+"&outros_documento="+outros_documentos,true);
    xmlhttp.send();

    $('#pessoasModal').modal('hide');
}

function myMap(position) {
    if($('#latitude').html()){
        var latitude = parseFloat($('#latitude').html());
        var longitude = parseFloat($('#longitude').html());
        var myLatLng = {lat: latitude, lng: longitude};
    }else{
        if(position)
            var myLatLng = {lat: position.coords.latitude, lng: position.coords.longitude};
        else
            var myLatLng = {lat: -26.9939744, lng: -48.6542015};
    }

    var mapProp= {
        center:myLatLng,
        zoom:15
    };

    var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

    var marker = new google.maps.Marker({
        position: myLatLng,
        map: map
    });

    if(!$('#latitude').html()){
        google.maps.event.addListener(map, 'click', function(event) {
            $("#latitude").val(event.latLng.lat());
            $("#longitude").val(event.latLng.lng());
            myLatLng = {lat: event.latLng.lat(), lng: event.latLng.lng()}
            marker.setPosition(myLatLng);
        });
    } 
}

function getJSON(url, callback) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', url, true);
    xhr.responseType = 'json';
    xhr.onload = function() {
      var status = xhr.status;
      if (status === 200) {
        callback(null, xhr.response);
      } else {
        callback(status, xhr.response);
      }
    };
    xhr.send();
};

function ativaJson(){
    var status = 'rgb(24,240,78)'; //1->normal ; 2->alerta ; 3->emergencia

    //requisicao dos niveis de precipitacao
    getJSON('http://localhost:3000/?limite=2&cdestacao=99018&cdvariavel=9001.00', function(err, data){
        var rioAlerta = 1;
        var rioPerigo = 3;
        if(err !== null){
            alert('Erro ao carregar API - 1ª requisição');
        }else{
            $("#nivel_rio").html(data[0].Valor);
            if(data[0].Valor > rioAlerta && data[0].Valor < rioPerigo){
                status = 'yellow';
            }else if(data[0].Valor > rioPerigo){
                status = 'red';
            }
            
            if(data[0].Valor < data[1].Valor){
                $("#nivel_rio_indicacao").addClass("arrow-down");
            }else if(data[0].Valor > data[1].Valor){
                $("#nivel_rio_indicacao").addClass("arrow-up");
            }else{
                $("#nivel_rio_indicacao").addClass("estavel");
            }
        }
    });

    //requisicao da temperatura do ar
    getJSON('http://localhost:3000/?limite=2&cdestacao=99018&cdvariavel=9002.00', function(err, data){
        var chuvaAlerta = 1;
        var chuvaPerigo = 3;
        if(err !== null){
            alert('Erro ao carregar API - 2ª requisição');
        }else{
            $("#nivel_precipitacao").html(data[0].Valor);
            if(data[0].Valor > chuvaAlerta && data.Valor < chuvaPerigo){
                if(status == 'green')
                    status = 'yellow';
            }else if(data[0].Valor > chuvaPerigo){
                status = 'red';
            }
            if(data[0].Valor < data[1].Valor){
                $("#nivel_precipitacao_indicacao").addClass("arrow-down");
            }else if(data[0].Valor > data[1].Valor){
                $("#nivel_precipitacao_indicacao").addClass("arrow-up");
            }else{
                $("#nivel_precipitacao_indicacao").addClass("estavel");
            }
        }
    });

    $('#sensor').css('background-color', status);
}

function monitorarChamado() {
    if(window.XMLHttpRequest){
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    }else{  // code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
            document.getElementById('requestChamado').innerHTML=this.responseText;
        }
    }
    xmlhttp.open("GET","requestChamado.php",true);
    xmlhttp.send();
}