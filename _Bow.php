<?php
class _Bow extends _Produkt
{
    public $cenaOwaga;
    public $buyingPrice;
    function __construct($kod,$cena,$nazwa,$cenaOwaga){
        parent::__construct($kod,$cena,$nazwa);
        $this->cenaOwaga=$cenaOwaga;
    }
    public function setBuyingPrice($int){
        if($int>20){
        $this->buyingPrice=$this->cena+($this->cenaOwaga*($int-20));
        }else{
            $this->buyingPrice=$this->cena;
        }
    }
}

?>