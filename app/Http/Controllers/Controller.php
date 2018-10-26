<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function createapp($email, $password){
    	   $url = "https://api.heroku.com/apps";
           $ch = curl_init($url);
           curl_setopt($ch, CURLOPT_POST, true);
           curl_setopt($ch, CURLOPT_USERPWD, $email.":".$password);
           $headers = ['Accept: application/vnd.heroku+json; version=3',"Content-Type: application/json"];
       	   curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
           $result = curl_exec($ch);
	   return $result;
	   }

	   public function buildapp($email, $password, $appname, $framework){
	       	  $url = "https://api.heroku.com/apps/".$appname."/builds";
	       	  $ch = curl_init($url);
	       	  curl_setopt($ch, CURLOPT_POST, true);
	       	  curl_setopt($ch, CURLOPT_USERPWD, $email.":".$password);
	       	  $headers = ['Accept: application/vnd.heroku+json; version=3',"Content-Type: application/json"];
	       	  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	       	  $data = '{"source_blob":{"url":'.'"https://arcane-coast-61901.herokuapp.com/framework/'.$framework.'.tar.gz"'.'}}';
		  $result = curl_exec($ch);
	}
}
