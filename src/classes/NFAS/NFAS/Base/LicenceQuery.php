<?php

namespace NFAS\NFAS\Base;

use \Exception;
use \PDO;
use NFAS\NFAS\Licence as ChildLicence;
use NFAS\NFAS\LicenceQuery as ChildLicenceQuery;
use NFAS\NFAS\Map\LicenceTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'Licence' table.
 *
 *
 *
 * @method     ChildLicenceQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildLicenceQuery orderByClubId($order = Criteria::ASC) Order by the club_id column
 * @method     ChildLicenceQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method     ChildLicenceQuery orderByStart($order = Criteria::ASC) Order by the start column
 * @method     ChildLicenceQuery orderByEnd($order = Criteria::ASC) Order by the end column
 *
 * @method     ChildLicenceQuery groupById() Group by the id column
 * @method     ChildLicenceQuery groupByClubId() Group by the club_id column
 * @method     ChildLicenceQuery groupByType() Group by the type column
 * @method     ChildLicenceQuery groupByStart() Group by the start column
 * @method     ChildLicenceQuery groupByEnd() Group by the end column
 *
 * @method     ChildLicenceQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildLicenceQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildLicenceQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildLicenceQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildLicenceQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildLicenceQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildLicenceQuery leftJoinClub($relationAlias = null) Adds a LEFT JOIN clause to the query using the Club relation
 * @method     ChildLicenceQuery rightJoinClub($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Club relation
 * @method     ChildLicenceQuery innerJoinClub($relationAlias = null) Adds a INNER JOIN clause to the query using the Club relation
 *
 * @method     ChildLicenceQuery joinWithClub($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Club relation
 *
 * @method     ChildLicenceQuery leftJoinWithClub() Adds a LEFT JOIN clause and with to the query using the Club relation
 * @method     ChildLicenceQuery rightJoinWithClub() Adds a RIGHT JOIN clause and with to the query using the Club relation
 * @method     ChildLicenceQuery innerJoinWithClub() Adds a INNER JOIN clause and with to the query using the Club relation
 *
 * @method     \NFAS\NFAS\ClubQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildLicence findOne(ConnectionInterface $con = null) Return the first ChildLicence matching the query
 * @method     ChildLicence findOneOrCreate(ConnectionInterface $con = null) Return the first ChildLicence matching the query, or a new ChildLicence object populated from the query conditions when no match is found
 *
 * @method     ChildLicence findOneById(string $id) Return the first ChildLicence filtered by the id column
 * @method     ChildLicence findOneByClubId(string $club_id) Return the first ChildLicence filtered by the club_id column
 * @method     ChildLicence findOneByType(string $type) Return the first ChildLicence filtered by the type column
 * @method     ChildLicence findOneByStart(string $start) Return the first ChildLicence filtered by the start column
 * @method     ChildLicence findOneByEnd(string $end) Return the first ChildLicence filtered by the end column *

 * @method     ChildLicence requirePk($key, ConnectionInterface $con = null) Return the ChildLicence by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLicence requireOne(ConnectionInterface $con = null) Return the first ChildLicence matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildLicence requireOneById(string $id) Return the first ChildLicence filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLicence requireOneByClubId(string $club_id) Return the first ChildLicence filtered by the club_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLicence requireOneByType(string $type) Return the first ChildLicence filtered by the type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLicence requireOneByStart(string $start) Return the first ChildLicence filtered by the start column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLicence requireOneByEnd(string $end) Return the first ChildLicence filtered by the end column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildLicence[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildLicence objects based on current ModelCriteria
 * @method     ChildLicence[]|ObjectCollection findById(string $id) Return ChildLicence objects filtered by the id column
 * @method     ChildLicence[]|ObjectCollection findByClubId(string $club_id) Return ChildLicence objects filtered by the club_id column
 * @method     ChildLicence[]|ObjectCollection findByType(string $type) Return ChildLicence objects filtered by the type column
 * @method     ChildLicence[]|ObjectCollection findByStart(string $start) Return ChildLicence objects filtered by the start column
 * @method     ChildLicence[]|ObjectCollection findByEnd(string $end) Return ChildLicence objects filtered by the end column
 * @method     ChildLicence[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class LicenceQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \NFAS\NFAS\Base\LicenceQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\NFAS\\NFAS\\Licence', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildLicenceQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildLicenceQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildLicenceQuery) {
            return $criteria;
        }
        $query = new ChildLicenceQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildLicence|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(LicenceTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = LicenceTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildLicence A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, club_id, type, start, end FROM Licence WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildLicence $obj */
            $obj = new ChildLicence();
            $obj->hydrate($row);
            LicenceTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildLicence|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildLicenceQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(LicenceTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildLicenceQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(LicenceTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById('fooValue');   // WHERE id = 'fooValue'
     * $query->filterById('%fooValue%', Criteria::LIKE); // WHERE id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $id The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLicenceQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($id)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LicenceTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the club_id column
     *
     * Example usage:
     * <code>
     * $query->filterByClubId('fooValue');   // WHERE club_id = 'fooValue'
     * $query->filterByClubId('%fooValue%', Criteria::LIKE); // WHERE club_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $clubId The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLicenceQuery The current query, for fluid interface
     */
    public function filterByClubId($clubId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($clubId)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LicenceTableMap::COL_CLUB_ID, $clubId, $comparison);
    }

    /**
     * Filter the query on the type column
     *
     * Example usage:
     * <code>
     * $query->filterByType('fooValue');   // WHERE type = 'fooValue'
     * $query->filterByType('%fooValue%', Criteria::LIKE); // WHERE type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $type The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLicenceQuery The current query, for fluid interface
     */
    public function filterByType($type = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($type)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LicenceTableMap::COL_TYPE, $type, $comparison);
    }

    /**
     * Filter the query on the start column
     *
     * Example usage:
     * <code>
     * $query->filterByStart('2011-03-14'); // WHERE start = '2011-03-14'
     * $query->filterByStart('now'); // WHERE start = '2011-03-14'
     * $query->filterByStart(array('max' => 'yesterday')); // WHERE start > '2011-03-13'
     * </code>
     *
     * @param     mixed $start The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLicenceQuery The current query, for fluid interface
     */
    public function filterByStart($start = null, $comparison = null)
    {
        if (is_array($start)) {
            $useMinMax = false;
            if (isset($start['min'])) {
                $this->addUsingAlias(LicenceTableMap::COL_START, $start['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($start['max'])) {
                $this->addUsingAlias(LicenceTableMap::COL_START, $start['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LicenceTableMap::COL_START, $start, $comparison);
    }

    /**
     * Filter the query on the end column
     *
     * Example usage:
     * <code>
     * $query->filterByEnd('2011-03-14'); // WHERE end = '2011-03-14'
     * $query->filterByEnd('now'); // WHERE end = '2011-03-14'
     * $query->filterByEnd(array('max' => 'yesterday')); // WHERE end > '2011-03-13'
     * </code>
     *
     * @param     mixed $end The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLicenceQuery The current query, for fluid interface
     */
    public function filterByEnd($end = null, $comparison = null)
    {
        if (is_array($end)) {
            $useMinMax = false;
            if (isset($end['min'])) {
                $this->addUsingAlias(LicenceTableMap::COL_END, $end['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($end['max'])) {
                $this->addUsingAlias(LicenceTableMap::COL_END, $end['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LicenceTableMap::COL_END, $end, $comparison);
    }

    /**
     * Filter the query by a related \NFAS\NFAS\Club object
     *
     * @param \NFAS\NFAS\Club|ObjectCollection $club The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildLicenceQuery The current query, for fluid interface
     */
    public function filterByClub($club, $comparison = null)
    {
        if ($club instanceof \NFAS\NFAS\Club) {
            return $this
                ->addUsingAlias(LicenceTableMap::COL_CLUB_ID, $club->getId(), $comparison);
        } elseif ($club instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(LicenceTableMap::COL_CLUB_ID, $club->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByClub() only accepts arguments of type \NFAS\NFAS\Club or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Club relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildLicenceQuery The current query, for fluid interface
     */
    public function joinClub($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Club');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Club');
        }

        return $this;
    }

    /**
     * Use the Club relation Club object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \NFAS\NFAS\ClubQuery A secondary query class using the current class as primary query
     */
    public function useClubQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinClub($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Club', '\NFAS\NFAS\ClubQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildLicence $licence Object to remove from the list of results
     *
     * @return $this|ChildLicenceQuery The current query, for fluid interface
     */
    public function prune($licence = null)
    {
        if ($licence) {
            $this->addUsingAlias(LicenceTableMap::COL_ID, $licence->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the Licence table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(LicenceTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            LicenceTableMap::clearInstancePool();
            LicenceTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(LicenceTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(LicenceTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            LicenceTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            LicenceTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // LicenceQuery
