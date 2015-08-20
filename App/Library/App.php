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
 * App 
 *
 * @author Romain L.
 */
class App
{
    /**
     * Launch data gathering
     *
     * @return void
     * @access public
     */
    public function start()
    {
        $configPath         = CONFIG_DIR . 'config.json';
        $resultsPath        = DATA_DIR . 'result.json';
        $config             = (new System\File($configPath))->getJson();
        foreach ($config as $type => $elements) {
            $results[$type] = Analyzer::getAnalyzer($type, $elements)->checkAvailability();
        }
        (new System\File($resultsPath))->storeResults($results);
    }

    /**
     * Show data embedded in results file
     *
     * @return void
     * @access public
     */
    public function show()
    {
        $path    = DATA_DIR . 'result.json';
        $results = (new System\File($path))->getJson();
        print_r($results);
    }
}
