<?php

namespace Core\Autoload;

/**
 * Class NamespaceAutoload
 */
class NamespaceAutoload
{
    /**
     * Storage for saving namespace name and path to it in format key - value
     *
     * @var array
     */
    public $namespacesMap = array();

    /**
     * Add name of namespace and path to it to storage
     *
     * @param string $namespace name
     * @param string $dir path
     * @return bool result
     */
    public function addNamespace($namespace, $dir)
    {
        if (is_dir($dir)) {
            $this->namespacesMap[$namespace] = $dir;

            return true;
        }

        return false;
    }

    /**
     * Register autoloader
     */
    public function register()
    {
        spl_autoload_register(array($this, 'autoload'));
    }

    /**
     * Resolve path to require namespace from storage and did require_once for wanted class
     *
     * @param string $class wanted class name
     * @return bool result
     */
    protected function autoload($class)
    {
        $pathParts = explode("\\", $class);
        if (is_array($pathParts)) {
            $className = array_pop($pathParts);
            $namespace = '\\' . array_shift($pathParts);
            $namespacePrefix = implode('/', $pathParts);

            if (!empty($this->namespacesMap[$namespace])) {
                $dir = $this->namespacesMap[$namespace];
                $relativePath = mb_strtolower($namespacePrefix);
                $filePath = "{$dir}/{$relativePath}/${className}.php";

                if (file_exists($filePath)) {
                    require_once $filePath;

                    return true;
                }
            }
        }
        return false;
    }
}