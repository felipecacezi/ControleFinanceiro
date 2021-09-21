<?php

include '../src/classes/models/FinanceiroModel.php';

class Financeiro
{

    private float $credito    = 0;
    private float $debito     = 0;
    private float $saldoAtual = 0;


    public function setCredito($credito = null)
    {
        $this->credito = $credio;
    }

    public function setDebito($debito = null)
    {
        $this->debito = $debito;
    }

    public function getCredito()
    {
        return $this->credito;
    }

    public function getDebito()
    {
        return $this->debito;
    }

    public function getSaldoAtual()
    {

        $financeiro = new FinanceiroModel();
        $saldoAtual = $financeiro->buscarSaldoAtual();
        return $saldoAtual;

    }

    public function initTransacaoCredito($dados = null)
    {

        $dados      = json_decode($dados);

        $financeiro = new FinanceiroModel();        

        $saldoAtual = $financeiro->buscarSaldoAtual();        

        $financeiro->setValor($dados->credito);

        $financeiro->setTipoOperacao('c');        

        $financeiro->processarValor($saldoAtual->saldo, (int)$financeiro->getValor());        

        $financeiro->alterarSaldo();

        $financeiro->gravarHistoricoMovimentacao($saldoAtual->saldo, (int)$financeiro->getValor());

        return $financeiro->buscarSaldoAtual();
        
    }

    public function initTransacaoDebito($dados)
    {

        $dados      = json_decode($dados);

        $financeiro = new FinanceiroModel();        

        $saldoAtual = $financeiro->buscarSaldoAtual();        

        $financeiro->setValor($dados->debito);

        $financeiro->setTipoOperacao('d');        

        $financeiro->processarValor($saldoAtual->saldo, (int)$financeiro->getValor());        

        $financeiro->alterarSaldo();

        $financeiro->gravarHistoricoMovimentacao($saldoAtual->saldo, (int)$financeiro->getValor());

        return $financeiro->buscarSaldoAtual();

    }

    public function initBuscarMovimentacoes(int $qtd = null)
    {

        $financeiro = new FinanceiroModel();     
        
        $financeiro->setQtdMov($qtd);

        return $financeiro->buscarMovimentacoes();

    }

}