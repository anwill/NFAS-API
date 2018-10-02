<?php

namespace NFAS\NFAS\Base;

use \Exception;
use \PDO;
use NFAS\NFAS\Shoot as ChildShoot;
use NFAS\NFAS\ShootQuery as ChildShootQuery;
use NFAS\NFAS\Map\ShootTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'Shoot' table.
 *
 *
 *
 * @method     ChildShootQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildShootQuery orderByClubId($order = Criteria::ASC) Order by the club_id column
 * @method     ChildShootQuery orderByDateStart($order = Criteria::ASC) Order by the date_start column
 * @method     ChildShootQuery orderByDateEnd($order = Criteria::ASC) Order by the date_end column
 * @method     ChildShootQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildShootQuery orderByStatus($order = Criteria::ASC) Order by the status column
 *
 * @method     ChildShootQuery groupById() Group by the id column
 * @method     ChildShootQuery groupByClubId() Group by the club_id column
 * @method     ChildShootQuery groupByDateStart() Group by the date_start column
 * @method     ChildShootQuery groupByDateEnd() Group by the date_end column
 * @method     ChildShootQuery groupByDescription() Group by the description column
 * @method     ChildShootQuery groupByStatus() Group by the status column
 *
 * @method     ChildShootQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildShootQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildShootQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildShootQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildShootQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildShootQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildShootQuery leftJoinClub($relationAlias = null) Adds a LEFT JOIN clause to the query using the Club relation
 * @method     ChildShootQuery rightJoinClub($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Club relation
 * @method     ChildShootQuery innerJoinClub($relationAlias = null) Adds a INNER JOIN clause to the query using the Club relation
 *
 * @method     ChildShootQuery joinWithClub($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Club relation
 *
 * @method     ChildShootQuery leftJoinWithClub() Adds a LEFT JOIN clause and with to the query using the Club relation
 * @method     ChildShootQuery rightJoinWithClub() Adds a RIGHT JOIN clause and with to the query using the Club relation
 * @method     ChildShootQuery innerJoinWithClub() Adds a INNER JOIN clause and with to the query using the Club relation
 *
 * @method     ChildShootQuery leftJoinBooking($relationAlias = null) Adds a LEFT JOIN clause to the query using the Booking relation
 * @method     ChildShootQuery rightJoinBooking($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Booking relation
 * @method     ChildShootQuery innerJoinBooking($relationAlias = null) Adds a INNER JOIN clause to the query using the Booking relation
 *
 * @method     ChildShootQuery joinWithBooking($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Booking relation
 *
 * @method     ChildShootQuery leftJoinWithBooking() Adds a LEFT JOIN clause and with to the query using the Booking relation
 * @method     ChildShootQuery rightJoinWithBooking() Adds a RIGHT JOIN clause and with to the query using the Booking relation
 * @method     ChildShootQuery innerJoinWithBooking() Adds a INNER JOIN clause and with to the query using the Booking relation
 *
 * @method     \NFAS\NFAS\ClubQuery|\NFAS\NFAS\BookingQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildShoot findOne(ConnectionInterface $con = null) Return the first ChildShoot matching the query
 * @method     ChildShoot findOneOrCreate(ConnectionInterface $con = null) Return the first ChildShoot matching the query, or a new ChildShoot object populated from the query conditions when no match is found
 *
 * @method     ChildShoot findOneById(string $id) Return the first ChildShoot filtered by the id column
 * @method     ChildShoot findOneByClubId(string $club_id) Return the first ChildShoot filtered by the club_id column
 * @method     ChildShoot findOneByDateStart(string $date_start) Return the first ChildShoot filtered by the date_start column
 * @method     ChildShoot findOneByDateEnd(string $date_end) Return the first ChildShoot filtered by the date_end column
 * @method     ChildShoot findOneByDescription(string $description) Return the first ChildShoot filtered by the description column
 * @method     ChildShoot findOneByStatus(string $status) Return the first ChildShoot filtered by the status column *

 * @method     ChildShoot requirePk($key, ConnectionInterface $con = null) Return the ChildShoot by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildShoot requireOne(ConnectionInterface $con = null) Return the first ChildShoot matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildShoot requireOneById(string $id) Return the first ChildShoot filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildShoot requireOneByClubId(string $club_id) Return the first ChildShoot filtered by the club_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildShoot requireOneByDateStart(string $date_start) Return the first ChildShoot filtered by the date_start column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildShoot requireOneByDateEnd(string $date_end) Return the first ChildShoot filtered by the date_end column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildShoot requireOneByDescription(string $description) Return the first ChildShoot filtered by the description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildShoot requireOneByStatus(string $status) Return the first ChildShoot filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildShoot[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildShoot objects based on current ModelCriteria
 * @method     ChildShoot[]|ObjectCollection findById(string $id) Return ChildShoot objects filtered by the id column
 * @method     ChildShoot[]|ObjectCollection findByClubId(string $club_id) Return ChildShoot objects filtered by the club_id column
 * @method     ChildShoot[]|ObjectCollection findByDateStart(string $date_start) Return ChildShoot objects filtered by the date_start column
 * @method     ChildShoot[]|ObjectCollection findByDateEnd(string $date_end) Return ChildShoot objects filtered by the date_end column
 * @method     ChildShoot[]|ObjectCollection findByDescription(string $description) Return ChildShoot objects filtered by the description column
 * @method     ChildShoot[]|ObjectCollection findByStatus(string $status) Return ChildShoot objects filtered by the status column
 * @method     ChildShoot[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ShootQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \NFAS\NFAS\Base\ShootQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\NFAS\\NFAS\\Shoot', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildShootQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildShootQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildShootQuery) {
            return $criteria;
        }
        $query = new ChildShootQuery();
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
     * @return ChildShoot|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ShootTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ShootTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildShoot A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, club_id, date_start, date_end, description, status FROM Shoot WHERE id = :p0';
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
            /** @var ChildShoot $obj */
            $obj = new ChildShoot();
            $obj->hydrate($row);
            ShootTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildShoot|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildShootQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ShootTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildShootQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ShootTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildShootQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($id)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ShootTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildShootQuery The current query, for fluid interface
     */
    public function filterByClubId($clubId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($clubId)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ShootTableMap::COL_CLUB_ID, $clubId, $comparison);
    }

    /**
     * Filter the query on the date_start column
     *
     * Example usage:
     * <code>
     * $query->filterByDateStart('2011-03-14'); // WHERE date_start = '2011-03-14'
     * $query->filterByDateStart('now'); // WHERE date_start = '2011-03-14'
     * $query->filterByDateStart(array('max' => 'yesterday')); // WHERE date_start > '2011-03-13'
     * </code>
     *
     * @param     mixed $dateStart The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildShootQuery The current query, for fluid interface
     */
    public function filterByDateStart($dateStart = null, $comparison = null)
    {
        if (is_array($dateStart)) {
            $useMinMax = false;
            if (isset($dateStart['min'])) {
                $this->addUsingAlias(ShootTableMap::COL_DATE_START, $dateStart['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateStart['max'])) {
                $this->addUsingAlias(ShootTableMap::COL_DATE_START, $dateStart['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ShootTableMap::COL_DATE_START, $dateStart, $comparison);
    }

    /**
     * Filter the query on the date_end column
     *
     * Example usage:
     * <code>
     * $query->filterByDateEnd('2011-03-14'); // WHERE date_end = '2011-03-14'
     * $query->filterByDateEnd('now'); // WHERE date_end = '2011-03-14'
     * $query->filterByDateEnd(array('max' => 'yesterday')); // WHERE date_end > '2011-03-13'
     * </code>
     *
     * @param     mixed $dateEnd The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildShootQuery The current query, for fluid interface
     */
    public function filterByDateEnd($dateEnd = null, $comparison = null)
    {
        if (is_array($dateEnd)) {
            $useMinMax = false;
            if (isset($dateEnd['min'])) {
                $this->addUsingAlias(ShootTableMap::COL_DATE_END, $dateEnd['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateEnd['max'])) {
                $this->addUsingAlias(ShootTableMap::COL_DATE_END, $dateEnd['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ShootTableMap::COL_DATE_END, $dateEnd, $comparison);
    }

    /**
     * Filter the query on the description column
     *
     * Example usage:
     * <code>
     * $query->filterByDescription('fooValue');   // WHERE description = 'fooValue'
     * $query->filterByDescription('%fooValue%', Criteria::LIKE); // WHERE description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $description The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildShootQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ShootTableMap::COL_DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query on the status column
     *
     * Example usage:
     * <code>
     * $query->filterByStatus('fooValue');   // WHERE status = 'fooValue'
     * $query->filterByStatus('%fooValue%', Criteria::LIKE); // WHERE status LIKE '%fooValue%'
     * </code>
     *
     * @param     string $status The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildShootQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($status)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ShootTableMap::COL_STATUS, $status, $comparison);
    }

    /**
     * Filter the query by a related \NFAS\NFAS\Club object
     *
     * @param \NFAS\NFAS\Club|ObjectCollection $club The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildShootQuery The current query, for fluid interface
     */
    public function filterByClub($club, $comparison = null)
    {
        if ($club instanceof \NFAS\NFAS\Club) {
            return $this
                ->addUsingAlias(ShootTableMap::COL_CLUB_ID, $club->getId(), $comparison);
        } elseif ($club instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ShootTableMap::COL_CLUB_ID, $club->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildShootQuery The current query, for fluid interface
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
     * Filter the query by a related \NFAS\NFAS\Booking object
     *
     * @param \NFAS\NFAS\Booking|ObjectCollection $booking the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildShootQuery The current query, for fluid interface
     */
    public function filterByBooking($booking, $comparison = null)
    {
        if ($booking instanceof \NFAS\NFAS\Booking) {
            return $this
                ->addUsingAlias(ShootTableMap::COL_ID, $booking->getShootId(), $comparison);
        } elseif ($booking instanceof ObjectCollection) {
            return $this
                ->useBookingQuery()
                ->filterByPrimaryKeys($booking->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByBooking() only accepts arguments of type \NFAS\NFAS\Booking or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Booking relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildShootQuery The current query, for fluid interface
     */
    public function joinBooking($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Booking');

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
            $this->addJoinObject($join, 'Booking');
        }

        return $this;
    }

    /**
     * Use the Booking relation Booking object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \NFAS\NFAS\BookingQuery A secondary query class using the current class as primary query
     */
    public function useBookingQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBooking($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Booking', '\NFAS\NFAS\BookingQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildShoot $shoot Object to remove from the list of results
     *
     * @return $this|ChildShootQuery The current query, for fluid interface
     */
    public function prune($shoot = null)
    {
        if ($shoot) {
            $this->addUsingAlias(ShootTableMap::COL_ID, $shoot->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the Shoot table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ShootTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ShootTableMap::clearInstancePool();
            ShootTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ShootTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ShootTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ShootTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ShootTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ShootQuery
