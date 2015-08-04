<?php

namespace c006\products\assets;

/**
 * Class AppFile
 */
class AppFile
{
    /**
     * Used with {recursiveDirectory}
     *  (Example)
     *  $path  = \Yii::getPathOfAlias('application.extensions.PayPal');
     *  $path  = AppFile::cleanBackslashInPath($path);
     *  $array = AppFile::recursiveDirectory($path, $path);
     *  $array = AppFile::recursiveAutoLoadClass($array);
     *  foreach ($array as $class) {
     *     $class = str_replace($path, '', $class);
     *     \Yii::import("application.extensions.PayPal" . $class);
     *  }
     *
     * @param $directory_array
     *
     * @return array
     */
    public static function autoLoadClassArray($directory_array)
    {
        $array_out = array();
        foreach ($directory_array as $items) {
            foreach ($items as $array) {
                if (!$array['is_dir'] && $array['extension'] == 'php')
                    $array_out[] = $array['path'] . '/' . $array['file'];
                else if (isset($array['sub_folders'])) {
                    $array_out = array_merge((array)$array_out, (array)self::autoLoadClassArray($array['sub_folders']));
                }
            }
        }

        return $array_out;
    }

    /**
     * @param $source
     * @param $dest
     */
    public static function copyDirectory($source, $dest)
    {
        if (!is_dir($source))
            return;
        if (!is_dir($dest))
            @mkdir($dest);
        $files = scandir($source);
        foreach ($files as $file) {
            if ($file != "." && $file != "..") {
                if (is_dir($source . "\\" . $file)) {
                    AppFile:: copyDirectory($source . "\\" . $file, $dest . "\\" . $file);
                } else if (is_file($source . "\\" . $file)) {
                    copy($source . "\\" . $file, $dest . "\\" . $file);
                }
            }
        }
    }

    /**
     * @param $source
     *
     * @return bool
     */
    public static function deleteDirectory($source)
    {
        if (!is_dir($source))
            return FALSE;
        $files = scandir($source);
        foreach ($files as $file) {
            if ($file != "." && $file != "..") {
                if (is_dir($source . "/" . $file)) {
                    AppFile:: deleteDirectory($source . "/" . $file);
                    //                        chmod($source . "/" . $file, 0777);
                    unlink($source . "/" . $file);
                } else if (is_file($source . "/" . $file)) {
                    //                        chmod($source . "/" . $file, 0777);
                    unlink($source . "/" . $file);
                }
            }
        }

        return TRUE;
    }

    /**
     * @param $path
     */
    public static function deleteEmptyDirectory($path)
    {
        @unlink($path);
    }

    /**
     * @param $path
     *
     * @return mixed
     */
    public static function  fileFromPath($path)
    {
        $path = str_replace('\\', '/', $path);
        $f    = explode('/', $path);

        return $f[sizeof($f) - 1];
    }

    /**
     * @param $path
     *
     * @return mixed
     */
    public static function getLastFolderInPath($path)
    {
        $path  = AppFile::cleanBackslashInPath($path);
        $array = explode('/', $path);

        return $array[sizeof($array) - 1];
    }

    /**
     * Unifies all slashes to backslash
     *
     * @param $path
     *
     * @return mixed
     */
    public static function cleanBackslashInPath($path)
    {
        return str_replace('\\', '/', $path);
    }

    /**
     * @param $filePath
     *
     * @return string
     */
    public static function readFile($filePath)
    {
        return file_get_contents($filePath);
    }

    /**
     * @param $path
     * @param $base_path
     *
     * @return array
     */
    public static function recursiveDirectory($path, $base_path)
    {
        $array = array();
        if (!is_dir($path))
            die("No Directory: " . $path);
        $items = scandir($path);
        foreach ($items as $item) {
            if ($item != "." && $item != "..") {
                if (is_file($path . "/" . $item)) {
                    $array[]['item'] = array(
                        'is_dir'    => FALSE,
                        'path'      => $path,
                        'relative'  => str_replace($base_path, '', $path),
                        'file'      => $item,
                        'extension' => AppFile::fileExtension($item),
                    );
                }
            }
        }
        foreach ($items as $item) {
            if ($item != "." && $item != "..") {
                if (is_dir($path . "/" . $item)) {
                    $array[]['item'] = array(
                        'is_dir'      => TRUE,
                        'path'        => $path,
                        'relative'    => str_replace($base_path, '', $path),
                        'folder'      => $item,
                        'depth'       => AppFile::folderCountInPath(str_replace($base_path, '', $path . "/" . $item)),
                        'sub_folders' => AppFile::recursiveDirectory($path . "/" . $item, $base_path),
                    );
                }
            }
        }

        return $array;
    }

    /**
     * @param $file_name
     *
     * @return mixed
     */
    public static function  fileExtension($file_name)
    {
        $f = explode('.', $file_name);

        return strtolower($f[sizeof($f) - 1]);
    }

    /**
     * @param $path
     *
     * @return int
     */
    public static function folderCountInPath($path)
    {
        $path = AppFile::cleanBackslashInPath($path);
        $path = AppFile::removeTrailingBackSlash($path);

        return sizeof(explode('/', $path));
    }

    /**
     * @param $path
     *
     * @return string
     */
    public static function removeTrailingBackSlash($path)
    {
        if (substr($path, strlen($path) - 1, 1) == "/") {
            return substr($path, 0, strlen($path) - 1);
        }

        return $path;
    }

    /**
     * @param $path
     *
     * @return mixed
     */
    public static function removeDoubleBackslash($path)
    {
        return str_replace('//', '/', $path);
    }

    /**
     * @param $filePath
     * @param $data
     */
    public static function writeFile($filePath, $data)
    {
        @unlink($filePath);
        $fh = fopen($filePath, 'w') or die("can't open file");
        fwrite($fh, $data);
        fclose($fh);
    }

    public static function cleanFileName($file)
    {
        $ext  = self::fileExtension($file);
        $file = self::removeFileExtension($file);
        $file = preg_replace('/[^0-9|A-Z|a-z|_|-]/', '', $file);

        return $file . '.' . $ext;
    }

    /**
     * @param $file_name
     *
     * @return string
     */
    public static function  removeFileExtension($file_name)
    {
        $f = explode('.', $file_name);
        unset($f[sizeof($f) - 1]);

        return implode('.', $f);
    }

    public static function checkFolderExists($path)
    {
        if (!is_dir($path))
            mkdir($path);
    }

    public static function buildPath($path)
    {
        $dirs      = '';
        $base_path = AppFile::getBasePath();
        $path      = AppFile::cleanBackslashInPath($path);
        $path      = str_replace($base_path, '', $path);
        foreach (explode('/', $path) as $dir) {
            if (!$dir)
                continue;
            $dirs .= '/' . $dir;
            if (!is_dir($base_path . $dirs))
                mkdir($base_path . $dirs);
        }

    }

    public static function getBasePath()
    {
        $path = AppFile::cleanBackslashInPath(\Yii::app()->basePath);
        $path = str_replace('protected', '', $path);

        return preg_replace('/\/$/', '', $path);
    }
}
