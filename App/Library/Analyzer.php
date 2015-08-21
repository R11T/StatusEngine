<?php
/**
 * @licence GPL-v2
 * Summary :
 * « You may copy, distribute and modify the software as long as
 * you track changes/dates of in source files and keep all modifications under GPL.
 * You can distribute your application using a GPL library commercially,
 * but you must also disclose the source code. »
 *
 * @link https://www.tldrlegal.com/l/gpl2
 * @see LICENSE file
 */
namespace App\Library;

/**
* Analyzer Builder
*
* @author Romain L.
*/
abstract class Analyzer implements \App\Library\Interfaces\IAnalyzable
{
    /**
     * Configuration data
     *
     * @var array
     *
     * @access protected
     */
    protected $config;

    /**
     * Fetch an analyzer depending on $type
     *
     * @param string $type Potential analyzer type
     * @param array $config Configuration's file's content
     *
     * @return \App\Library\Analyzer
     * @throws \Exception
     * @access public
     * @static
     */
    public static function getAnalyzer($type, array $config)
    {
        $class = '\App\Library\Analyzer\\' . ucfirst($type);
        if (class_exists($class)) {
            return new $class($config);
        } else {
            throw new \Exception('Unknown analyzer type : ' . $type);
        }
    }

    /**
     * Constructor
     *
     * @param array $config
     *
     * @access protected
     */
    protected function __construct(array $config)
    {
        $this->config = $config;
    }

    /**
     * Evaluate each analyzable for availability
     *
     * @return array
     * @access public
     */
    public function checkAvailability()
    {
        $output  = [];

        foreach ($this->config as $analyzable) {
            $output[$analyzable['name']] = $this->isAlive($analyzable);
        }
        return $output;
    }


    /**
     * Ask an analyzable its status
     *
     * @param array $analyzable
     *
     * @return array
     * @access protected
     */
    abstract protected function isAlive(array $analyzable);

}
