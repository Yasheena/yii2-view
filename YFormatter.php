<?php

namespace yasheena\view;

use yii\i18n\Formatter;

class YFormatter extends Formatter
{
    /**
     * Formats the value as an HTML-encoded plain text. If the value contains \n or \r
     * the first line will be returned only.
     * @param string $value the value to be formatted.
     * @return string the formatted result.
     */
    public function asNtext1line($value)
    {
        if ($value === null) {
            return $this->nullDisplay;
        }
        
        if ((false !== ($n = strpos($value, "\n"))) || (false !== ($n = strpos($value, "\r")))) {
        	if (($n > 0) && (substr($value, $n - 1, 1) == "\r")) {
        		$n--;
        	}
        	$value = substr($value, 0, $n - 1) . ' ...';	 
        }
        return Html::encode($value);
    }

}
