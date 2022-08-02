<?php

namespace App\Services\MoneyFlow;

interface IMoneyFlowCartaoCredito
{
    /**
     * Excecuta a tokenização de um número de cartão de crédito
     *
     * @param string $holder Nome conforme impresso no cartão
     * @param string $cardNumber Número do cartão
     * @param string $expirationDate Data de expiração MM/YYYY
     * @param string $securityCode Código de segurança XXX
     * @return string Token
     */
    public function tokenize(string $holder, string $cardNumber, string $expirationDate, string $securityCode) : string;
}
