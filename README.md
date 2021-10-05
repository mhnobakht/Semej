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
delete `session`
```php
Semej::unset();
```
### print complete alert
this method require to `bootstrap CDN` included!
with this method you can show the full alert message in your document.
in the method, valid `status` value is on of These: 
`info` `primary` `danger` `dark` `warning` `success` `secondary` `light`
```php
// set message like this
Semej::set('danger', 'error', 'file not found!');

// and show message like this
Semej::show();
```

### alert message using sweet alert
this method require to `sweetalert js cdn` included!
with thie method you can alert the body of message in your document.
```php
Semej::alert();
```
