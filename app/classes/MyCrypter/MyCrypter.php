<?php

/**
 * Created by PhpStorm.
 * User: Developer
 * Date: 27/02/2017
 * Time: 13:42
 */
class MyCrypter
{
    // se cambio questa stringa devo rigenerare la password del db
    static $key = "X5vzaxjTXprs3dfOj2bkhjScG79Qs341";
    static function myEncrypt($string){
        if($string =="") return "";
        $iv = mcrypt_create_iv(
            mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC),
            MCRYPT_DEV_URANDOM
        );

        $encrypted = base64_encode(
            $iv .
            mcrypt_encrypt(
                MCRYPT_RIJNDAEL_128,
                hash('sha256', SELF::$key, true),
                $string,
                MCRYPT_MODE_CBC,
                $iv
            )
        );
        return $encrypted;
    }

    static function myDecrypt($encrypted){
        if($encrypted =="") return "";
        $data = base64_decode($encrypted);
        $iv = substr($data, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC));

        $decrypted = rtrim(
            mcrypt_decrypt(
                MCRYPT_RIJNDAEL_128,
                hash('sha256', SELF::$key, true),
                substr($data, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC)),
                MCRYPT_MODE_CBC,
                $iv
            ),
            "\0"
        );
        return $decrypted;
    }
}