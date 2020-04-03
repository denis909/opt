<?php

namespace Denis909\Opt;

class Opt
{

    protected $_opt = [];

    protected $_short;

    protected $_long = [];

    public function __construct($short = null, $long = [])
    {
        $this->_short = $short;

        $this->_long = $long;
    }

    public function addShort(array $opt)
    {
        foreach($opt as $key)
        {
            if (array_search($key, $this->_short) === false)
            {
                $this->_short = $key;
            }
        }
    }

    public function addLong(array $opt)
    {
        foreach($opt as $key)
        {
            if (array_search($key, $this->_long) === false)
            {
                $this->_long = $key;
            }
        }
    }    

    public function getOpt()
    {
        if (!$this->_opt)
        {
            $this->_opt = getopt($this->_short, $this->_long);
        }
    
        return $this->_opt;
    }

    public function getValue($name, $default = null)
    {
        $opt = $this->getOpt();

        return $opt[$name] ?? $default;
    }

}