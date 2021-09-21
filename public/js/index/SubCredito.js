const SubCredito = function(){

    const obj = {};
    obj.array = {};

    obj.init = function()
    {

        obj.gerarArrayDados();
        obj.gravar();

    }

    obj.gerarArrayDados = function()
    {

        obj.array.debito = document.getElementById('debito').value;

    }

    obj.gravar = function()
    {

        fetch("includes/subCredito.php",{
            method: "POST",
            Headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(obj.array)
        }).then(function(retorno){

            return retorno.json();

        }).then(function(ret){

            switch (ret.status) {
                case "ok":
                    
                    document.getElementById('saldo').value = ret.saldo;
                    document.getElementById('debito').value = '';

                    BuscarTbExtrato().init();

                    alertify.success('Movimentação consluída com sucesso!'); 

                break;
            
                default:
                    break;
            }

        });

    }

    return obj;

}