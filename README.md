Helpful extensions for views
============================

This packet contains some helpful code for creating views for the framework YII2.

YFormatter: Extended YII2-Formatter
	New format: ntext1line => Returns the first line only (useful for text fields in grids)

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist yasheena/yii2-view "*"
```

or add

```
"yasheena/yii2-view": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by:

YFormatter: Add the following line to your grid options and you can use the new formats:

```
'formatter' => new \yasheena\view\YFormatter()
```
