<?php
//source originale: https://github.com/freesms/apitools

class FreeSms {
    
    //Url of Free Mobile API
    const API_URL = "https://smsapi.free-mobile.fr/sendmsg";
        
    private $login;
    private $passkey;
    
    /**
     * Login and Passkey provided by freemobile
     */
    public function __construct($login, $passkey)
    {
        $this->login    = $login;
        $this->passkey  = $passkey;
    }
    
    
    /**
     * Send a SMS
     */
    public function send($message_content)
    {
        $aParams = array("user" => $this->login,
                         "pass" => $this->passkey,
                         "msg"  => $message_content);
        
        $result_code = self::http_response(self::API_URL, $aParams);
        $error_message = self::get_response_code_message($result_code);
			
        if($result_code == 200) {
			throw new Exception($error_message);
        } else {
            throw new Exception("Free Api Error. Code: " . $result_code . "\n\n" . $error_message);
        }
        
    }
        
    
    /**
     * Call Free moble API via Curl
     */
    private static function http_response($url, $get_data = null, $post_data = null) 
    {
        if(!empty($get_data)) {
            $url .= '?'. http_build_query($get_data);
        }
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, TRUE);
        curl_setopt($ch, CURLOPT_NOBODY, TRUE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        
        if(!empty($post_data)) {
            curl_setopt($ch,CURLOPT_POST, true);
            curl_setopt($ch,CURLOPT_POSTFIELDS, http_build_query($post_data));
        }
        
        $head = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        return $httpCode;
    } 
    
    /**
     * Return the string corresponding to the http code result when calling free mobile API
     */
    private static function get_response_code_message($error_code)
    {
        $aMessages = array(200 => "Le SMS a été envoyé sur votre mobile.",
                           400 => "Un des paramètres obligatoires est manquant.",
                           402 => "Trop de SMS ont été envoyés en trop peu de temps.",
                           403 => "Le service n'est pas activé sur l'espace abonné, ou login / clé incorrect.",
                           500 => "Erreur côté serveur. Veuillez réessayer ultérieurement.");
        if(array_key_exists($error_code, $aMessages)) {
            return $aMessages[$error_code];
        } else {
            return "Erreur inconnue.";
        }
    }
}
    
