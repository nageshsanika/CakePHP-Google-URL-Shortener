## CakePHP-Google-URL-Shortener Plugin ######by NageswaraRao S

*If you want send urls through out tweats, sms or other texts which should stay as short as possible and could contain urls. There are many use cases where such a shortening service might be useful. The one is fast and reliable and without costs.*


### Usage

####Step 1:
```
Extract the Lib/GoogleURLAPI.php file and place in app/Lib/GoogleURLAPI.php

``` 

####Step 2:
```
Configure Google URL Shortener Server API key in Cofig/core.php

Configure::write('GoogleURLAPIServerKey', 'your key');

```
####Step 3:


######In Controller first include library file 
``` 
App::uses('GoogleURLAPI', 'Lib'); //for cakephp 2.x
```
now call short or long function like follow

######for URL Shortening:

```  
$longUrl='http://somethingbigurl.com/comehere/about';  //long url

$postData = array('longUrl' => $longUrl); //setting up the post data to function

$googleURL=new GoogleUrlApi(); //object initialization 

$info = $googleURL->generateShortURL($postData); //calling short url function, it will return json 

if($info != null){

  $shortURL=$info->id; //this is url short url
  
  echo $shortURL;
  
}  
```
######getting long urls from existing urls

```  
$shortURL='http://googl.something';  //short url 

$googleURL=new GoogleUrlApi(); //object initialization 

$info = $googleURL->getLongURLfromShortURL($shortURL); //calling long url function, it will return json 

if($info != null){

  $longURL=$info->longUrl;  
  
  echo $longURL;
  
}  
```




