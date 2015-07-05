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
        $path     = CONFIG_DIR . 'config.json';
        $config   = (new System\File($path))->getAsJson();
        $analyzer = new Analyzer($config['servers']);
        $results = $analyzer->checkServiceAvailability();
        print_r($results);
    }
}
