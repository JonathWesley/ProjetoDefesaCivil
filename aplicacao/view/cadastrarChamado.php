<div class="container positioning">
<div class="jumbotron campo_cadastro">
    <form method="post" action="processa_cadastrar_chamado.php">
        <?php if(isset($_GET['sucesso'])){ ?>
            <div class="alert alert-success" role="alert">
                Ocorrencia cadastrada com sucesso.
            </div>
            <?php } ?>
            <?php if(isset($_GET['erroDB'])){ ?>
            <div class="alert alert-danger" role="alert">
                Falha ao cadastrar ocorrencia.
            </div>
        <?php } ?>
        <div class="box">
            <div>
                <span>Data: <span style="color:red;">*</span></span>
                <span style="position:relative;left:23%">Horário: <span style="color:red;">*</span></span> 
                <br>
                <input id="data_chamado" name="data_chamado" type="date" class="form-control" style="width:30%;display:inline;" required>
                <input type="time" name="horario_chamado" class="form-control" style="width:30%;display:inline;" required>
            </div>
            <div>
                Origem: <span style="color:red;">*</span>
                <input type="text" name="origem_chamado" class="form-control" required>
            </div>
            <div>
                Pessoa atendida: <span style="color:red;">*</span>
                <br>
                <input type="text" id="pessoa_nome" name="nome_chamado" class="form-control inline" style="width:93%;" onkeyup="showResult(this.value,this.id)" required>
                <button type="button" class="btn-default btn-small inline open-AddBookDialog" data-toggle="modal" data-id="pessoa_nome"><span class="glyphicon glyphicon-plus"></span></button>
                <div class="autocomplete" id="livesearchpessoa_nome"></div>
                <div id="resultpessoa_nome"></div>
            </div>
        </div>
        <div class="box">
            <div>
                Endereço principal: <span style="color:red;">*</span>
                <br>
                <label for="endereco_principal"></label>
                <select name="endereco_principal" class="form-control" style="width:30%;display:inline;" ng-model="sel_endereco" ng-init="sel_endereco='Coordenada'" required>
                    <option value="Coordenada">Coordenada</option>
                    <option value="Logradouro">Logradouro</option>
                </select>
            </div>
            <div ng-show="sel_endereco == 'Coordenada'">
                <div>
                    <span>Longitude: <span style="color:red;">*</span></span> 
                    <span style="position:relative;left:19%;">Latitude: <span style="color:red;">*</span></span>
                    <br>
                    <input name="longitude" type="text" class="form-control" style="width:30%;display:inline;">
                    <input name="latitude" type="text" class="form-control" style="width:30%;display:inline;">
                </div>
            </div>
            <div ng-show="sel_endereco == 'Logradouro'">
                <div>
                    <span>CEP:</span> 
                    <span style="position:relative;left:11%">Logradouro: <span style="color:red;">*</span></span> 
                    <br>
                    <input id="cep" name="cep" type="text" class="form-control" style="width:15%;display:inline;" ng-model="cep">                
                    <input id="logradouro" name="logradouro" type="text" class="form-control" style="width:84%;display:inline;">
                </div>
                <div>
                    <span>Número: </span> <span style="color:red;">*</span>
                    <span style="position:relative;left:25%">Bairro: <span style="color:red;">*</span></span> 
                    <br>
                    <input id="complemento" name="complemento" type="text" class="form-control" style="width:35%;display:inline;">
                    <input id="bairro" name="bairro" type="text" class="form-control" style="width:64%;display:inline;">
                </div>
                <div>
                    <span>Cidade: </span> <span style="color:red;">*</span>
                    <span style="position:relative;left:32%">Referência: <span style="color:red;">*</span></span>
                    <br>
                    <input id="cidade" name="cidade" type="text" class="form-control" style="width:40%;display:inline;">
                    <input name="referencia" type="text" class="form-control" style="width:59%;display:inline;">
                </div>
            </div>
        </div>
        <div class="box">
            <div>
                Descrição: <span style="color:red;">*</span>
                <textarea id="descricao" name="descricao" class="form-control" cols="30" rows="2" maxlength = "100" ng-model="descricaoVal" required></textarea>
                <span class="char-count">{{descricaoVal.length || 0}}/100</span>
            </div>
        </div>
        <input type="submit" class="btn btn-default btn-md" value="Cadastrar">
    </form>
    <div class="modal fade" id="pessoasModal" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title">Cadastrar pessoa</h5>
                </div>
                <form method="post">
                    <div class="modal-body">
                        <nav>
                            <input id="id_pessoa" type="hidden" value="">
                            <div class="form-group">
                                Nome:
                                <input id="nome_pessoa" name="nome_pessoa" type="text" class="form-control">
                            </div>   
                            <div class="form-group">
                                CPF:
                                <input id="cpf_pessoa" name="cpf_pessoa" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                Outros documentos:
                                <input id="outros_documentos" name="outros_documentos" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                Telefone: 
                                <input id="telefone_pessoa" name="telefone_pessoa" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                Email:
                                <input id="email_pessoa" name="email_pessoa" type="email" class="form-control">
                            </div>
                        </nav>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="submitFormData" onclick="SubmitFormData()" data-dismiss="modal">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
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
            var pessoa_id = $(this).data('id');
            $(".modal-body #id_pessoa").val( pessoa_id );
            $('#pessoasModal').modal('show');
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
            var id_input = $("#id_pessoa").val();
            var nome_pessoa = $("#nome_pessoa").val();
            var email_pessoa = $("#email_pessoa").val();
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
            xmlhttp.open("GET","processa_cadastrar_pessoa.php?nome_pessoa="+nome_pessoa+"&email_pessoa="+email_pessoa+"&telefone_pessoa="+telefone_pessoa+"&cpf_pessoa="+cpf_pessoa+"&outros_documento="+outros_documentos,true);
            xmlhttp.send();
        }
    </script>
</div>
</div>
