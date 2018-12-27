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
