<?php

/**
 * Class Mcrypt
 * 
 * Crpytage / Decryptage de données
 * 
 * Usage:
 * 
 *
 * $oCrypt = new c_Mcrypt('cle_secrete');
 * $plaintext = "la chaine que je veux crypter";
 * 
 * $encryptedtext = $oCrypt->encrypt($plaintext);
 * 
 * $decryptedtext = $oCrypt->decrypt($encryptedtext);
 * 
 */

 
class Mcrypt {
            
    private $securekey, $td, $iv_size;
    
    function __construct($secret_passphrase, $chiffrement = MCRYPT_RIJNDAEL_256, $mode = 'ofb') {
        
        /**
         * Initialisation du module
         */
        $this->td           = mcrypt_module_open($chiffrement, '', $mode, '');
        $this->iv_size      = mcrypt_enc_get_iv_size($this->td);                
        $ks                 = mcrypt_enc_get_key_size($this->td);
        $this->securekey    = substr(md5($secret_passphrase), 0, $ks);
        
    }
    
    function __destruct() {
        mcrypt_module_close($this->td);
    }
    
    
    /**
     * Crypte input et envoi la chaine cryptée + le IV encodé en base64
     */
    function encrypt($input) {
        
        $iv = mcrypt_create_iv($this->iv_size, MCRYPT_RAND);
        mcrypt_generic_init($this->td, $this->securekey, $iv);
        $encrypted = mcrypt_generic($this->td, $input);
        mcrypt_generic_deinit($this->td);
        
        return base64_encode($iv . $encrypted);
    }
    
    /**
     * On a reçu le IV + la chaine cryptée en base 64
     * On sépare donc les 2, et on décrype la chaine
     */
    function decrypt($input) {
        
        //Séparation du IV et de la chaine cryptée
        $ciphertext_dec     = base64_decode($input);
        $iv_dec             = substr($ciphertext_dec, 0, $this->iv_size);
        $ciphertext_dec     = substr($ciphertext_dec, $this->iv_size);
        
        //Décryptage
        mcrypt_generic_init($this->td, $this->securekey, $iv_dec);
        $decrypted = mdecrypt_generic($this->td, $ciphertext_dec);
        mcrypt_generic_deinit($this->td);
        
        return $decrypted;
        
    }
}
