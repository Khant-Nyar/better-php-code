<?php

function transfer(Account $from, Account $to, $amount, $currency)
{
    $from->debit($amount, $currency);
    $to->credit($amount, $currency);
}