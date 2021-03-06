<?php

/* 
 * Objetivo desta classe é simular um sorteio
 * neste exemplo usarei a função nativa do php mt_rand()
 * mas pode-se substituí-la por outro método
 */

class Sorteio{
    private static $limit = 50; //limite de números a serem sorteados
    private static $sorted = array();//valores sorteados
    
    /*
     * Função para executar o sorteio
     * retorna um array contendo os valores sorteados
     */
    public static function init(){
        while(count(self::$sorted) < self::$limit)://Enquanto não atingir a quantidade limite continua atribuindo números sorteados
            
            $value = self::raffle();//Valor sorteado
            
            if(!in_array($value, self::$sorted))//Se o valor sorteado for diferente dos demais atribui
                self::$sorted[] = $value;
            
        endwhile;
        
        sort(self::$sorted);
        
        return self::$sorted;
    }
    
    /*
     * Função apenas para retornar os valores sorteados, caso estes valores tenham se perdido. Apenas para não realizar o sorteio novamente
     */
    public static function get_raffled(){
        return self::$sorted;
    }

    /*
     * Função para realizar o sorteio unitário,
     * pode-se substituir esse valor por qualquer ou tro método. Ex. Realizar um request para pegar o valor
     * retorna um numero inteiro (em caso de alteração pode retornar uma string)
     */
    private static function raffle(){
        return mt_rand(1, 100);
    }
    
}