<?php
/**
 * @todo    General file information
 *
 * @author  Tim Lochmüller
 */

namespace HDNET\CalendarizeNews\Persistence;

use TYPO3\CMS\Extbase\Persistence\Generic\Query;

/**
 * @todo General class information
 */
class IndexQuery extends Query
{
    /**
     * Executes the query against the database and returns the result.
     *
     * @param $returnRawQueryResult boolean avoids the object mapping by the persistence
     *
     * @return \TYPO3\CMS\Extbase\Persistence\QueryResultInterface|array The query result object or an array if $returnRawQueryResult is TRUE
     *
     * @api
     */
    public function execute($returnRawQueryResult = false)
    {
        $querySettings = $this->getQuerySettings();
        $deprecatedRawResult = method_exists(
            $querySettings,
            'getReturnRawQueryResult'
        ) && true === $querySettings->getReturnRawQueryResult();
        if (true === $returnRawQueryResult || $deprecatedRawResult) {
            return $this->persistenceManager->getObjectDataByQuery($this);
        }

        return $this->objectManager->get(\HDNET\CalendarizeNews\Persistence\IndexResult::class, $this);
    }
}
