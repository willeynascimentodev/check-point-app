$(document).ready(function() {

    function limpa_formulário_cep() {
        // Limpa valores do formulário de cep.
        $("#endereco").val("");
    }
    
    //Quando o campo cep perde o foco.
    $("#cep").blur(function() {

        //Limpando alerta de erro
        $("#alert-cep").text("");

        //Nova variável "cep" somente com dígitos.
        var cep = $(this).val().replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche o campo endereço com "..." enquanto consulta webservice.
                $("#endereco").val("...");
            
                var endereco = "";

                //Consulta o webservice viacep.com.br/
                $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                    if (!("erro" in dados)) {
                        //concatena endereço e atribui ao campo correto
                        endereco = dados.logradouro + ", " + dados.bairro + ", " + dados.localidade + " - " + dados.uf;
                        console.log(endereco);
                        $("#endereco").val(endereco);
                        $("#alert-cep").text("");
                    } //end if.
                    else {
                        //CEP pesquisado não foi encontrado.
                        limpa_formulário_cep();
                        $("#alert-cep").text("CEP não encontrado.");
                    }
                });
            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                $("#alert-cep").text("Formato de CEP Inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    });
});