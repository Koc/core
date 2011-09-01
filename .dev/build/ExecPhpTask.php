<?php
/**
 * Created by JetBrains PhpStorm.
 * User: humanoid
 * Date: 31.08.11
 * Time: 10:20
 * To change this template use File | Settings | File Templates.
 */

class ExecPhpTask extends Task
{
    private $filename;
    private $dir;
    private $fun;
    private $args = array();

    function setFilename($file)
    {
        $this->filename = $file;
    }

    function setDir($dir)
    {
        $this->dir = $dir;
    }
    function setFun($fun)
    {
        $this->fun = $fun;
    }

    public function __set($name, $value)
    {
        $this->args[$name] = $value;
    }

    function main()
    {
        if (is_dir($this->dir)) {
            chdir($this->dir);
        }
        include($this->filename);
        if (function_exists($this->fun)) {
            $rf = new ReflectionFunction($this->fun);
            $newArgs = array();
            foreach($rf->getParameters() as $param){
                $newArgs[] = $this->args[$param->name];
            }

            call_user_func_array($this->fun, $newArgs);
        }
    }
}
