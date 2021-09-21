document.addEventListener("DOMContentLoaded", function() {

    const btnAddCredito  = document.getElementById('btnAddCredito');
    const btnSubCredito  = document.getElementById('btnSubCredito');
    const creditoElement = document.getElementById('credito');
    const debitoElement  = document.getElementById('debito');
    
    BuscarSaldoAtual().init();
    BuscarTbExtrato().init();
    
    VMasker(creditoElement).maskMoney();
    VMasker(debitoElement).maskMoney();

    btnAddCredito.addEventListener("click",function(){

        AddCredito().init();

    });

    btnSubCredito.addEventListener("click",function(){

        SubCredito().init();

    });

});