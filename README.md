# Semej (Session Message Manager)

show alert messages using easily using `Semej`

## Installation

just include `Semej.php` file in to your document and Enjoy!
```php
include_once "dist/Semej.php";
```

## Usage
Set arguments (`Status`, `Title`, `Body`)
```php
Semej::set('false', 'Error 404', 'File Not Found!');
```
print `status`
```php
Semej::status();
```
print `title`
```php
Semej::title();
```
print `Body`
```php
Semej::message();
```
### print complete alert
this method require to `bootstrap CDN` included!
with this method you can show the full alert message in your document.
in the method, valid `status` value is on of These: 
`info` `primary` `danger` `dark` `warning` `success` `secondary` `light`
```php
Semej::show('danger', 'error', 'file not found!');
```
