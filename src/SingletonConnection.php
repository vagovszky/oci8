<?php

namespace Oci8;

/**
 * Class SingletonConnection
 * @package Oci8
 * @see http://php.net/manual/en/book.oci8.php
 */
class SingletonConnection extends Connection
{
    /**
     * Connect to an Oracle database
     *
     * New instances of this class will use the same connection during the script life cycle.
     *
     * @param $username
     * @param string $password
     * @param string $connectionString
     * @param string $characterSet
     * @param int $sessionMode
     * @return resource
     * @see http://php.net/manual/en/function.oci-connect.php
     */
    protected function connect(
        $username,
        $password = null,
        $connectionString = null,
        $characterSet = null,
        $sessionMode = 0
    ) {
        set_error_handler($this->getErrorHandler());
        $connection = oci_connect($username, $password, $connectionString, $characterSet, $sessionMode);
        restore_error_handler();
        return $connection;
    }
}
