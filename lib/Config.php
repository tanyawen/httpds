<?php
/**
 * Created by PhpStorm.
 * User: tankal
 * Date: 16/9/12
 * Time: 下午9:38
 */

namespace lib;


class Config implements \arrayAccess
{
    private  $_config = [];
    private  $_path  = null;
    public function __construct($path)
    {
        $this->_path = $path;
    }

    /**
     * @param mixed $offset
     * @return bool
     */
    public function offsetExists($offset)
    {
        return isset($this->_config[$offset]);
    }

    /**
     * @param mixed $offset
     * @param mixed $value
     * @throws \Exception
     */
    public function offsetSet($offset, $value)
    {
        throw  new \Exception('connot set config');
    }

    /**
     * @param mixed $offset
     */
    public function offsetUnset($offset)
    {
        unset($this->_config[$offset]);
    }

    /**
     * @param mixed $offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        if (!isset($this->_config[$offset])) {
            $this->_config[$offset] = require $this->_path.'/'.$offset.'.php';
        }
        return $this->_config[$offset];
    }
}