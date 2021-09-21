const BuscarTbExtrato = function(){


    const obj = {};

    obj.init = function(){

        obj.buscar();

    }

    obj.buscar = function(){

        fetch("includes/buscarMovimentacoes.php",{
            method: "GET",
            Headers: {
                "Content-Type" : "application/json"
            }          
        }).then(function(retorno){

            return retorno.json();

        }).then(function(ret){

            console.log(ret);

            let table_element = document.getElementById('grdExtrato');

            table_element.innerHTML = '';

            let color_style = '';
            let sinal = '';

            for (let i = 0; i<=ret.movimentacao.length; i++) {

                switch (ret.movimentacao[i].tipo) {
                    case 'c':
                        color_style = " style='color:blue;' ";
                        sinal = "+";
                    break;
                    case 'd':
                        color_style = " style='color:red;' ";
                        sinal = "-";
                    break;
                }
                
                table_element.innerHTML += `<tr>
                                                <td><center>${ret.movimentacao[i].id}</center></td>
                                                <td ${color_style}>${sinal} R$ ${ret.movimentacao[i].valor_operacao}</td>
                                                <td>R$ ${ret.movimentacao[i].saldo}</td>
                                                <td>${ret.movimentacao[i].data_mov}</td>
                                            </tr>`;
                
            }

        });
    }

    return obj;
}