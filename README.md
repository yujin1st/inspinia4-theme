# Asset bundle for  inspinia4-theme  
http://wrapbootstrap.com/preview/WB0R5L90S

## Install

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```bash
$ php composer.phar require --prefer-dist yujin1st/inspinia4-theme "*"
```

or add

```json
"yujin1st/inspinia4-theme": "*"
```

to the require section of your `composer.json` file.

## Usage

Either add 
```php
yujin1st\inspinia4theme\AppAsset
```
to depends section of your asset bundle 

or directly use it in layout file

```php
yujin1st\inspinia4theme\AppAsset::register($this);
```
