<?php 

class VK_Stripe {
  public $url = 'https://api.stripe.com/v1/';
  public $secret_key;
  public $fields = array();
  function process () {
        $headers = array('Authorization: Bearer '. $this->secret_key);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($this->fields));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $output = curl_exec($ch);
        curl_close($ch);
        return json_decode($output, true); // return php array with api response
    }
}


?>
