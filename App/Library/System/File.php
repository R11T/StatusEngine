<?php
namespace App\Library\System;

/**
 * File manager
 *
 * @author Romain L.
 */
class File
{
    /**
     * File path
     *
     * @var string
     *
     * @access private
     */
    private $path;

    /**
     * Constructor
     *
     * @param string $path
     *
     * @access public
     */
    public function __construct($path)
    {
        $this->path = $path;
    }

    /**
     * Return content file
     *
     * @return string
     * @access public
     */
    public function getAsString()
    {
        return file_get_contents($this->path);
    }

    /**
     * Get json data
     *
     * @return array
     * @throws \Exception if file isn't a valid json file
     * @access public
     */
    public function getAsJson()
    {
        $content = json_decode($this->getAsString(), true);
        if (JSON_ERROR_NONE !== json_last_error()) {
            throw new \Exception('Config is not a valid json file : ' . json_last_error_msg());
        }
        return $content;
    }
}
