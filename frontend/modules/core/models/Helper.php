<?php

namespace app\modules\core\models;

class Helper
{
    /**
     * Replace placeholders in string
     *
     * @param string $str String with placeholders
     * @param string[] $placeholders Placeholders for replace
     * @return string
     */
    public static function replacePlaceholders($str, $placeholders)
    {
        $replacePlaceholders = [];

        preg_match_all('#\{.*?\}#', $str, $findPlaceholders);

        if (!isset($findPlaceholders[ 0 ])) {
            return $str;
        }

        foreach ($findPlaceholders[ 0 ] as $placeholder) {
            if (empty($placeholders) || !isset($placeholders[ $placeholder ])) {
               $replacePlaceholders[ $placeholder ] = '';
               continue;
            }

            $replacePlaceholders[ $placeholder ] = $placeholders[ $placeholder ];
        }

        return strtr($str, $replacePlaceholders);
    }
}
