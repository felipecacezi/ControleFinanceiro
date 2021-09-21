<?php

class UteisTest extends PHPUnit\Framework\TestCase
{

   /** 
    * @dataProvider providerCentavos
    * @test 
    */
   public function transformaCentavosReaisTest($centavo, $esperado)
   {

        $utils = new Utils();        
        $this->assertEquals($esperado, $utils->transformaCentavosReais($centavo));

   }

   public function providerCentavos()
   {

        $array  = array();        
        $i = 0;

        for ($i=0; $i < 10000; $i++) { 
            
            $num = rand(0, 100000000);
            $aux = $num / 100;
            $array2 = array($num, $aux);

            array_push($array, $array2);

        }

        return $array;

   }

   /** 
    * 
    * @test 
    */
   public function formataMoedaBrTest()
   {

        $utils = new Utils();        
        $this->assertEquals('0,00', $utils->formataMoedaBr(0));

   }

}