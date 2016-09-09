<?php

namespace Oci8;

interface FieldInterface
{
    public function getName();

    public function getPrecision();

    public function getRawType();

    public function getScale();

    public function getSize();

    public function getType();

    public function getValue();

    public function isNull();
}
