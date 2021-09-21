<?php

include '../src/database/Connection.php';
include '../src/helpers/php/Utils.php';

class FinanceiroModel extends Connection
{
    private string $tipoOperacao;
    private int $valor;
    private int $valorProcessado;
    private int $qtdMov;
    

    public function getTipoOperacao()
    {
        return $this->tipoOperacao();
    }

    public function setTipoOperacao($tipoOperacao = null)
    {
        $this->tipoOperacao = $tipoOperacao;
    }

    public function getValor()
    {
        return $this->valor;
    }

    public function setValor($valor = null)
    {
        $utils  = new Utils(); 
        $this->valor = $utils->transformaReaisCentavos($valor);
    }

    public function getValorProcessado()
    {
        return $this->valorProcessado;        
    }

    public function getQtdMov()
    {
        return $this->qtdMov;
    }

    public function setQtdMov(int $qtd = null)
    {
        $this->qtdMov = $qtd;
    }

    public function buscarSaldoAtual()
    {
        
        $return = new stdClass();
        $array  = new stdClass();
        $utils  = new Utils();  
        $con    = new Connection();        
        $db     = $con->connection();
        $qry    = $db->query('select 
                                saldo 
                              from financeiro');

        $dados  = $qry->fetchAll();
        
        if(isset($dados) && !empty($dados)){

            foreach ($dados as $key => $value) {
                $array->saldo = $utils->transformaCentavosReais($value['saldo']);
            }
            
            $return->status = 'ok';
            $return->saldo   = $utils->formataMoedaBr($array->saldo);
            return $return;

        } else {

            $return->status  = 'empty';
            $return->message = 'Saldo não disponivel';
            return $return;

        }     

    }

    public function processarValor(string $saldoAtual = null, Int $valorOperacao = null)
    {

        $utils  = new Utils();

        switch ($this->tipoOperacao) {
            case 'c':
                $this->valorProcessado = $utils->transformaReaisCentavos($saldoAtual) + (int)$valorOperacao;
            break;
            case 'd':
                $this->valorProcessado = $utils->transformaReaisCentavos($saldoAtual) - (int)$valorOperacao;
            break;
            default:
                throw new Exception('Tipo de operação inválida');
            break;
        }


    }

    public function alterarSaldo()
    {

        $con    = new Connection();

        $db     = $con->connection();

        $query = "update financeiro set saldo=?
                    where id = 1";

        try {
            
            $stmt = $db->prepare($query)
                       ->execute([$this->valorProcessado]);

        } catch (PDOException $e) {
            throw new Exception('Erro ao alterar o saldo');
        }

    }

    public function gravarHistoricoMovimentacao(string $saldoAtual = null, Int $valorOperacao = null)
    {

        $con    = new Connection();
        $utils  = new Utils();
        $db     = $con->connection();

        $query = "insert into financeiro_historico (financeiro_id,
                                                    saldo,
                                                    valor_operacao,
                                                    data_operacao,
                                                    hora_operacao,
                                                    tipo_operacao)
                                                    values(?,
                                                           ?,
                                                           ?,
                                                           ?,
                                                           ?,
                                                           ?)";

        try {
            
            $stmt = $db->prepare($query)
                       ->execute([1,$utils->transformaReaisCentavos($saldoAtual), $valorOperacao, date('Y-m-d'), date('H:i:s'), $this->tipoOperacao]);

        } catch (PDOException $e) {
            throw new Exception('Erro ao alterar o saldo');
        }

    }

    public function buscarMovimentacoes()
    {

        $return = new stdClass();
        
        $utils  = new Utils();  
        $con    = new Connection();        
        $db     = $con->connection();
        $qry    = $db->query("select
                                    financeiro_historico.id,
                                    financeiro_historico.valor_operacao,
                                    financeiro_historico.saldo,
                                    to_char(financeiro_historico.data_operacao, 'DD/MM/YYYY') as data_mov,
                                    to_char(financeiro_historico.hora_operacao, 'HH24:MI') as hora_mov,
                                    financeiro_historico.tipo_operacao
                                    
                                from financeiro_historico
                                
                                order by id desc
                                LIMIT 5");

        $dados  = $qry->fetchAll();

        
        if(isset($dados) && !empty($dados)){

            foreach ($dados as $key => $value) {

                $array[$key] = array(
                    'id'             => $value['id'],
                    'valor_operacao' => $utils->formataMoedaBr($utils->transformaCentavosReais($value['valor_operacao'])),
                    'saldo'          => $utils->formataMoedaBr($utils->transformaCentavosReais($value['saldo'])),
                    'data_mov'       => $value['data_mov'].' '.$value['hora_mov'],
                    'tipo'           => $value['tipo_operacao']
                );  

            }
            
            $return->status = 'ok';
            $return->movimentacao  = $array;
            return $return;

        } else {

            $return->status  = 'empty';
            $return->message = 'Saldo não disponivel';
            return $return;

        }  

    }

    public function buscarHistoricpTransacao()
    {

    }

}