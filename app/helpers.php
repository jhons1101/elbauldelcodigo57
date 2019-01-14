<?php


    use elbauldelcodigo\ParametroGral;

    /**
     * Devuelve el valor del parámetro de tipo cadena de la DB
     */
    function getParametroString ($cod) {
        return ParametroGral::where('id', '=', $cod)->firstOrFail()->txt_parametro;
    }
    
    /**
     * Devuelve el valor del parámetro de tipo numérico de la DB
     */
    function getParametroNumber ($cod) {
        return ParametroGral::where('id', '=', $cod)->firstOrFail()->num_parametro;
    }
    
    /**
     * Devuelve el slug de una cadena sin espacios y caracteres especiales
     */
    function slugify($text) {

        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);
        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);
        // trim
        $text = trim($text, '-');
        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);
        // lowercase
        $text = strtolower($text);
        
        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }