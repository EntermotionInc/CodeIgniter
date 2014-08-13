<?php
class TestClass
{
    protected $p;
    
    /**
     * construct
     * @see 引数は配列
     *
     * @params array $params
     * @return none
     */
    public function __construct($param)
    {
        $this->p = $param;
    }
    
    /**
     * e
     *
     * @params none
     * @return 
     */
    public function e()
    {
        print $this->p['param'];
    }
}
