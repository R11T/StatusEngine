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
namespace App\Library\Interfaces;

/**
 * Describe an analyzer's "contract"
 *
 * @author Romain L.
 */
interface IAnalyzer
{
    /**
     * Evaluate each elements of the analyzer for availability
     *
     * @return array
     * @access public
     */
    public function checkAvailability();
}
