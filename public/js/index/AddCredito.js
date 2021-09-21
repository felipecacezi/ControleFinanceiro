const AddCredito = function(){

    const obj = {};
    obj.array = {};

    obj.init = function()
    {

        obj.gerarArrayDados();
        obj.gravar();

    }

    obj.gerarArrayDados = function()
    {

        obj.array.credito = document.getElementById('credito').value;

    }

    obj.gravar = function()
    {

        fetch("includes/addCredito.php",{
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
                    document.getElementById('credito').value = '';

                    BuscarTbExtrato().init();

                    alertify.success('Movimentação concluída com sucesso!'); 

                break;
            
                default:
                    break;
            }

        });

    }

    return obj;

}