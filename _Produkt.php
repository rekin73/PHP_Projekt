<?php
class _Produkt
{
    public $kod,$buyingPrice,$nazwa,$cena;
    public function __construct($kod,$cena,$nazwa){
        $this->kod=$kod;
        $this->cena=$cena;
        $this->buyingPrice=$cena;
        $this->nazwa=$nazwa;
    }
}
?>