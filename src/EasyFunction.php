<?php

namespace Bagsiz\EasyFunctions;

class EasyFunction
{
    /**
     *
     * Check a model's field against a random value
     *
     */
    public static function checkFieldForRandom($model, string $field, string $type = 'str', int $length = 8)
    {
        if($type == 'str') {
            $rnd = self::randomStr($length);
        } else if($type == 'int') {
            $rnd = self::randomInt($length);
        }

        $continue = true;
		while ($continue) {

			$check = $model->where($field, $rnd)->first();

			if (!$check)
				$continue = false;

			return $rnd;
		}
    }

    private static function randomStr($length = 16)
    {
        $string = '';

        while (($len = strlen($string)) < $length) {
            $size = $length - $len;

            $bytes = random_bytes($size);

            $string .= substr(str_replace(['/', '+', '='], '', base64_encode($bytes)), 0, $size);
        }

        return $string;
    }

    private static function randomInt($length = 4)
    {
        $rand   = '';
        while( !( isset( $rand[$length-1] ) ) ) {
            $rand   .= mt_rand( );
        }
        return substr( $rand , 0 , $length );
    }
}