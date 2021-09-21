const BuscarSaldoAtual = function(){


    const obj = {};

    obj.init = function(){

        obj.buscar();

    }

    obj.buscar = function(){

        fetch("includes/buscarSaldoAtual.php",{
            method: "GET",
            Headers: {
                "Content-Type" : "application/json"
            }          
        }).then(function(retorno){

            return retorno.json();

        }).then(function(ret){

            document.getElementById('saldo').value = ret.saldo;

        });
    }

    return obj;
}