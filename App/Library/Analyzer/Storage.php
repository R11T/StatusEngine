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
 * Check storages statuses
 *
 * @author Romain L.
 */
class Storage extends \App\Library\Analyzer
{
    /**
     * Ask a storage its status
     *
     * @param array $storage Storage's data
     *
     * @return array
     * @access protected
     */
    protected function isAlive(array $storage)
    {
        $errNo   = -1;
        $content = [];
        $errStr  = 'No such file or directory';
        $start   = microtime(true);
        if (file_exists($storage['mountingPoint'])) {
            exec('df ' . escapeshellarg($storage['mountingPoint']), $content, $errNo);
            if (0 !== $errNo) {
                $status = 'Failed !';
                $errStr = implode(', ', $content);
            } else {
                $status = 'Success !';
                $errStr = '';
            }
        }
        $end = microtime(true);
        return [
            'status' => $status,
            'code'   => $errNo,
            'msg'    => $errStr,
            'responseDelay' => $end - $start,
        ];
    }
}
