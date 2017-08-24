<?php
class Cryptography{
    private $key="01234567890123456789012345678901";
    private $iv="0123456789012345";
    /*public function genMD5($text){
    
    }*/
    /*public function gensha1($text){
     
     }*/
    public function encryptdata($text){
        return (mcrypt_encrypt(MCRYPT_RIJNDAEL_128,$this->key,$text,MCRYPT_MODE_CBC,$this->iv));
    }
     public function decryptdata($text){
        return (mcrypt_decrypt(MCRYPT_RIJNDAEL_128,$this->key,$text,MCRYPT_MODE_CBC,$this->iv));
    }
}
?>