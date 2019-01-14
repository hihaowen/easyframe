<?php

namespace Core\Psr;

/**
 * Psr - 4 标准下的自动加载器
 *
 * Class Psr4Autoloader
 *
 * @author haowenzhi <haowenzhi@cmcm.com>
 */
class Psr4AutoLoader
{
    /**
     * 前缀集合
     *
     * @var array
     */
    protected $prefixes = [];

    /**
     * 添加自动加载前缀、路径
     *
     * @param string $prefix
     * @param string $basePath
     * @param bool $prepend
     * @return void
     */
    public function addPrefix($prefix, $basePath, $prepend = false)
    {
        $prefix = trim($prefix, '\\');

        if (! isset($this->prefixes[$prefix])) $this->prefixes[$prefix] = [];

        if ($prepend) {
            array_unshift($this->prefixes[$prefix], $basePath);
        } else {
            array_push($this->prefixes[$prefix], $basePath);
        }
    }

    /**
     * 开启自动加载
     *
     * @return void
     */
    public function register()
    {
        spl_autoload_register(array($this, 'loadClass'));
    }

    /**
     * require 类文件
     *
     * @param $class
     * @return bool
     */
    protected function loadClass($class)
    {
        // 循环以 "\" 分割前缀看是否在已注册的前缀集合里面
        // 如果有则拼接看文件是否存在
        // 存在则直接包含进来

        $prefix = $class;

        while (false !== $pos = strrpos($prefix, '\\'))
        {
            $relativeClass = substr($class, $pos + 1);

            $prefix = substr($class, 0, $pos);

            if (! isset($this->prefixes[$prefix])) {
                continue;
            }

            $basePaths = $this->prefixes[$prefix];

            if (empty($basePaths)) continue;

            while ($basePath = array_shift($basePaths))
            {
                $basePath = rtrim($basePath, '/') . '/';

                $classFile = $basePath . str_replace('\\', '/', $relativeClass) . '.php';

                if (! $this->requireClassFile($classFile)) break;

                return $classFile;
            }
        }

        return false;
    }

    /**
     * 包含类文件
     *
     * @param $classFile
     * @return bool
     */
    private function requireClassFile($classFile)
    {
        if (file_exists($classFile)) {
            require_once $classFile;

            return true;
        }

        return false;
    }
}

/**
$classLoader = new Psr4AutoLoader;
$classLoader->addPrefix('\\App\\A\\B', '/to/path/App/A/B');
$classLoader->register();
new \App\A\B\TestB;
*/
