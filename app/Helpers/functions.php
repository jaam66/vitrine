<?php

use Illuminate\Support\Str;

function lower($inputString){
    $outputString    = utf8_decode($inputString);
    $outputString    = strtolower($outputString);
    $outputString    = utf8_encode($outputString);
    $table = array(
        'À'=>'à', 'Á'=>'á', 'Â'=>'â', 'Ã'=>'ã', 'Ä'=>'ä', 'Ç'=>'ç', 'È'=>'è', 'É'=>'é', 'Ê'=>'ê', 'Ë'=>'ë',
        'Ì'=>'ì', 'Í'=>'í', 'Î'=>'î', 'Ï'=>'ï', 'Ñ'=>'ñ', 'Ò'=>'ò', 'Ó'=>'ó', 'Ô'=>'ô', 'Õ'=>'õ', 'Ö'=>'ö',
        'Ù'=>'ù', 'Ú'=>'ú', 'Û'=>'û', 'Ỳ'=>'ỳ', 'Ý'=>'ý', 'Ÿ'=>'ÿ', 'Ŕ'=>'ŕ',
    );
    $outputString = strtr($outputString, $table);
    return $outputString;
}

function normalize($string){
    $table = array(
        'Š'=>'S', 'š'=>'s', 'Đ'=>'Dj', 'đ'=>'dj', 'Ž'=>'Z', 'ž'=>'z', 'Č'=>'C', 'č'=>'c', 'Ć'=>'C', 'ć'=>'c',
        'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
        'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O',
        'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss',
        'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e',
        'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o',
        'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b',
        'ÿ'=>'y', 'Ŕ'=>'R', 'ŕ'=>'r', '*'=>'', ';'=>'', '.'=>'', '\''=>'', '´'=>'', '-'=>'', '_'=>' ',
    );
    return strtr($string, $table);
}

if(!function_exists('getLimitTexto'))
{
    function getLimitTexto(string $texto, int $limit = 8): string
    {
        return Str::limit($texto, $limit, '');
    }
}

if (!function_exists('getInitials')) {
    function getInitials($name)
    {
        $words = explode(' ', $name);
        $initials = '';

        foreach ($words as $word) {
            $initials .= strtoupper(substr($word, 0, 1));
            if (strlen($initials) >= 2) {
                break;
            }
        }

        return $initials;
    }
}

if (!function_exists('geraOs')) {
    function geraOs()
    {
        $data = date('dmyhis');
        //	echo $data;
            $var = sprintf('%03X', mt_rand(0, 0xFFF));
            // echo "<br>";
        //	$codigo = $var."_".$data;
            $codigo = "OS-".$var.$data;
            // echo "<br>";
            // echo $codigo;
        return $codigo;
    }
}

if (!function_exists('getUserName')) {
    function getUserName($name)
    {
        $nome_formatado = lower($name);
        $nome_formatado = normalize($nome_formatado);
        $nomes = explode(' ', $nome_formatado);
        $user_name = $nomes[0]."_".$nomes[1];
        return $user_name;
    }
}

if (!function_exists('confereSenha')) {
    function confereSenha($password,$password_confirm)
    {
        $iguais = FALSE;
        if($password == $password_confirm){
            $iguais = TRUE;
        }
        return $iguais;
    }
}

if (!function_exists('getAdmin')) {
    function getAdmin($admin)
    {
        // dd($admin);
        $retorno = "SIM";
        if($admin == 0){
            $retorno = "NÃO";
        }
        return $retorno;
    }
}