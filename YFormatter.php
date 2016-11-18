<?php

namespace yasheena\view;

use Yii;
use yii\i18n\Formatter;
use yii\helpers\Html;

class YFormatter extends Formatter
{
    /**
     * @inheritdoc
     */
    public function init()
    {
    	// Use the original fomatter settings also for this instance
    	$config = Yii::$app->getComponents();
    	$config = $config['formatter'];
    	unset($config['class']);	// Ignore the class setting
		Yii::configure($this, $config);
       	parent::init();
	}
	
	/**
     * Formats the value as an HTML-encoded plain text. If the value contains \n or \r
     * the first line will be returned only.
     * @param string $value the value to be formatted.
     * @return string the formatted result.
     */
    public function asNtext1line($value, $maxlen = null)
    {
        if ($value === null) {
            return $this->nullDisplay;
        }
        $suffix = '';
        if ((false !== ($n = strpos($value, "\n"))) || (false !== ($n = strpos($value, "\r")))) {
        	if (($n > 0) && (substr($value, $n - 1, 1) == "\r")) {
        		$n--;
        	}
        	$value = substr($value, 0, $n - 1);
        	$suffix = ' ...';	 
        }
        if ($maxlen) {
        	if ((strlen($value) + strlen($suffix) > $maxlen)) {
				$suffix = ' ...';
				$value = substr($value, 0, $maxlen - strlen($suffix));        		
        	}
        }
        return Html::encode($value . $suffix);
    }

}
