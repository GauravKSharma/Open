<?php 

class Language {

    private $_lang=array();          //store user selected language array

    public function __construct($language) {
        $this->_lang=$language;
    }

    public function __get($key){
        return $this->_lang[$key];
    }

}

if(isset($_SESSION['lang'])){
    $selectedLang=$_SESSION['lang'];
}
else
{
    $selectedLang='en';
}
require_once "$selectedLang.php";
$lang= new Language($_languageConstants);
?>
