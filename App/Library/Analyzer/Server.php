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
namespace App\Library\Analyzer;

/**
 * Check servers/services statuses
 *
 * @author Romain L.
 */
class Server extends \App\Library\Analyzer
{
    /**
     * Ask a service its status
     *
     * @param array $server Server's data
     *
     * @return array
     * @access protected
     */
    protected function isAlive(array $server)
    {
        $errNo      = -1;
        $errStr     = '';
        $timeout    = 3;
        $start      = microtime(true);
        $connection = @fsockopen($server['host'], $server['port'], $errNo, $errStr, $timeout);
        $end        = microtime(true);
        if (is_resource($connection)) {
            $status = 'Success !';
            fclose($connection);
        } else {
            $status = 'Failed !';
        }
        return [
            'status' => $status,
            'code'   => $errNo,
            'msg'    => $errStr,
            'responseDelay' => $end - $start,
        ];
    }
}
