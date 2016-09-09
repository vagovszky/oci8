# oci8
Wrapper for PHP oci8 / Oracle functions

Oci8 is a wrapper for the PHP [Oracle OCI](http://php.net/manual/en/book.oci8.php) functions that allows interaction
with Oracle databases by using objects in place of the regular `oci_*` functions.

`this package is based on https://github.com/jpina/oci8`

Oci8 converts the warnings thrown by the `oci_*` function into `Oci8Exceptions` for better error handling.

## Install

Via Composer

``` bash
$ composer require vagovszky/oci8
```

## Usage

Connect to a database, execute a query and fetch a row:

``` php
$db = new Oci8\Connection('username', 'password', 'SID');
$statement = $db->parse('SELECT * FROM dual');
$statement->execute();
$row = $statement->fetchAssoc();
```