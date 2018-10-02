<?php

namespace NFAS\NFAS\Base;

use \Exception;
use \PDO;
use NFAS\NFAS\Booking as ChildBooking;
use NFAS\NFAS\BookingQuery as ChildBookingQuery;
use NFAS\NFAS\Map\BookingTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'Booking' table.
 *
 *
 *
 * @method     ChildBookingQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildBookingQuery orderByShootId($order = Criteria::ASC) Order by the shoot_id column
 * @method     ChildBookingQuery orderByShootTogether($order = Criteria::ASC) Order by the shoot_together column
 * @method     ChildBookingQuery orderByShootDays($order = Criteria::ASC) Order by the shoot_days column
 * @method     ChildBookingQuery orderByPermission($order = Criteria::ASC) Order by the permission column
 * @method     ChildBookingQuery orderByBookerEmail($order = Criteria::ASC) Order by the booker_email column
 * @method     ChildBookingQuery orderByNotes($order = Criteria::ASC) Order by the notes column
 * @method     ChildBookingQuery orderByDateBooked($order = Criteria::ASC) Order by the date_booked column
 *
 * @method     ChildBookingQuery groupById() Group by the id column
 * @method     ChildBookingQuery groupByShootId() Group by the shoot_id column
 * @method     ChildBookingQuery groupByShootTogether() Group by the shoot_together column
 * @method     ChildBookingQuery groupByShootDays() Group by the shoot_days column
 * @method     ChildBookingQuery groupByPermission() Group by the permission column
 * @method     ChildBookingQuery groupByBookerEmail() Group by the booker_email column
 * @method     ChildBookingQuery groupByNotes() Group by the notes column
 * @method     ChildBookingQuery groupByDateBooked() Group by the date_booked column
 *
 * @method     ChildBookingQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildBookingQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildBookingQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildBookingQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildBookingQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildBookingQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildBookingQuery leftJoinShoot($relationAlias = null) Adds a LEFT JOIN clause to the query using the Shoot relation
 * @method     ChildBookingQuery rightJoinShoot($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Shoot relation
 * @method     ChildBookingQuery innerJoinShoot($relationAlias = null) Adds a INNER JOIN clause to the query using the Shoot relation
 *
 * @method     ChildBookingQuery joinWithShoot($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Shoot relation
 *
 * @method     ChildBookingQuery leftJoinWithShoot() Adds a LEFT JOIN clause and with to the query using the Shoot relation
 * @method     ChildBookingQuery rightJoinWithShoot() Adds a RIGHT JOIN clause and with to the query using the Shoot relation
 * @method     ChildBookingQuery innerJoinWithShoot() Adds a INNER JOIN clause and with to the query using the Shoot relation
 *
 * @method     ChildBookingQuery leftJoinArcher($relationAlias = null) Adds a LEFT JOIN clause to the query using the Archer relation
 * @method     ChildBookingQuery rightJoinArcher($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Archer relation
 * @method     ChildBookingQuery innerJoinArcher($relationAlias = null) Adds a INNER JOIN clause to the query using the Archer relation
 *
 * @method     ChildBookingQuery joinWithArcher($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Archer relation
 *
 * @method     ChildBookingQuery leftJoinWithArcher() Adds a LEFT JOIN clause and with to the query using the Archer relation
 * @method     ChildBookingQuery rightJoinWithArcher() Adds a RIGHT JOIN clause and with to the query using the Archer relation
 * @method     ChildBookingQuery innerJoinWithArcher() Adds a INNER JOIN clause and with to the query using the Archer relation
 *
 * @method     \NFAS\NFAS\ShootQuery|\NFAS\NFAS\ArcherQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildBooking findOne(ConnectionInterface $con = null) Return the first ChildBooking matching the query
 * @method     ChildBooking findOneOrCreate(ConnectionInterface $con = null) Return the first ChildBooking matching the query, or a new ChildBooking object populated from the query conditions when no match is found
 *
 * @method     ChildBooking findOneById(string $id) Return the first ChildBooking filtered by the id column
 * @method     ChildBooking findOneByShootId(string $shoot_id) Return the first ChildBooking filtered by the shoot_id column
 * @method     ChildBooking findOneByShootTogether(boolean $shoot_together) Return the first ChildBooking filtered by the shoot_together column
 * @method     ChildBooking findOneByShootDays(string $shoot_days) Return the first ChildBooking filtered by the shoot_days column
 * @method     ChildBooking findOneByPermission(boolean $permission) Return the first ChildBooking filtered by the permission column
 * @method     ChildBooking findOneByBookerEmail(string $booker_email) Return the first ChildBooking filtered by the booker_email column
 * @method     ChildBooking findOneByNotes(string $notes) Return the first ChildBooking filtered by the notes column
 * @method     ChildBooking findOneByDateBooked(string $date_booked) Return the first ChildBooking filtered by the date_booked column *

 * @method     ChildBooking requirePk($key, ConnectionInterface $con = null) Return the ChildBooking by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBooking requireOne(ConnectionInterface $con = null) Return the first ChildBooking matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildBooking requireOneById(string $id) Return the first ChildBooking filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBooking requireOneByShootId(string $shoot_id) Return the first ChildBooking filtered by the shoot_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBooking requireOneByShootTogether(boolean $shoot_together) Return the first ChildBooking filtered by the shoot_together column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBooking requireOneByShootDays(string $shoot_days) Return the first ChildBooking filtered by the shoot_days column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBooking requireOneByPermission(boolean $permission) Return the first ChildBooking filtered by the permission column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBooking requireOneByBookerEmail(string $booker_email) Return the first ChildBooking filtered by the booker_email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBooking requireOneByNotes(string $notes) Return the first ChildBooking filtered by the notes column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBooking requireOneByDateBooked(string $date_booked) Return the first ChildBooking filtered by the date_booked column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildBooking[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildBooking objects based on current ModelCriteria
 * @method     ChildBooking[]|ObjectCollection findById(string $id) Return ChildBooking objects filtered by the id column
 * @method     ChildBooking[]|ObjectCollection findByShootId(string $shoot_id) Return ChildBooking objects filtered by the shoot_id column
 * @method     ChildBooking[]|ObjectCollection findByShootTogether(boolean $shoot_together) Return ChildBooking objects filtered by the shoot_together column
 * @method     ChildBooking[]|ObjectCollection findByShootDays(string $shoot_days) Return ChildBooking objects filtered by the shoot_days column
 * @method     ChildBooking[]|ObjectCollection findByPermission(boolean $permission) Return ChildBooking objects filtered by the permission column
 * @method     ChildBooking[]|ObjectCollection findByBookerEmail(string $booker_email) Return ChildBooking objects filtered by the booker_email column
 * @method     ChildBooking[]|ObjectCollection findByNotes(string $notes) Return ChildBooking objects filtered by the notes column
 * @method     ChildBooking[]|ObjectCollection findByDateBooked(string $date_booked) Return ChildBooking objects filtered by the date_booked column
 * @method     ChildBooking[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class BookingQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \NFAS\NFAS\Base\BookingQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\NFAS\\NFAS\\Booking', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildBookingQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildBookingQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildBookingQuery) {
            return $criteria;
        }
        $query = new ChildBookingQuery();
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
     * @return ChildBooking|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(BookingTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = BookingTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildBooking A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, shoot_id, shoot_together, shoot_days, permission, booker_email, notes, date_booked FROM Booking WHERE id = :p0';
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
            /** @var ChildBooking $obj */
            $obj = new ChildBooking();
            $obj->hydrate($row);
            BookingTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildBooking|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildBookingQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(BookingTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildBookingQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(BookingTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildBookingQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($id)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookingTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the shoot_id column
     *
     * Example usage:
     * <code>
     * $query->filterByShootId('fooValue');   // WHERE shoot_id = 'fooValue'
     * $query->filterByShootId('%fooValue%', Criteria::LIKE); // WHERE shoot_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shootId The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBookingQuery The current query, for fluid interface
     */
    public function filterByShootId($shootId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shootId)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookingTableMap::COL_SHOOT_ID, $shootId, $comparison);
    }

    /**
     * Filter the query on the shoot_together column
     *
     * Example usage:
     * <code>
     * $query->filterByShootTogether(true); // WHERE shoot_together = true
     * $query->filterByShootTogether('yes'); // WHERE shoot_together = true
     * </code>
     *
     * @param     boolean|string $shootTogether The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBookingQuery The current query, for fluid interface
     */
    public function filterByShootTogether($shootTogether = null, $comparison = null)
    {
        if (is_string($shootTogether)) {
            $shootTogether = in_array(strtolower($shootTogether), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(BookingTableMap::COL_SHOOT_TOGETHER, $shootTogether, $comparison);
    }

    /**
     * Filter the query on the shoot_days column
     *
     * Example usage:
     * <code>
     * $query->filterByShootDays('fooValue');   // WHERE shoot_days = 'fooValue'
     * $query->filterByShootDays('%fooValue%', Criteria::LIKE); // WHERE shoot_days LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shootDays The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBookingQuery The current query, for fluid interface
     */
    public function filterByShootDays($shootDays = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shootDays)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookingTableMap::COL_SHOOT_DAYS, $shootDays, $comparison);
    }

    /**
     * Filter the query on the permission column
     *
     * Example usage:
     * <code>
     * $query->filterByPermission(true); // WHERE permission = true
     * $query->filterByPermission('yes'); // WHERE permission = true
     * </code>
     *
     * @param     boolean|string $permission The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBookingQuery The current query, for fluid interface
     */
    public function filterByPermission($permission = null, $comparison = null)
    {
        if (is_string($permission)) {
            $permission = in_array(strtolower($permission), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(BookingTableMap::COL_PERMISSION, $permission, $comparison);
    }

    /**
     * Filter the query on the booker_email column
     *
     * Example usage:
     * <code>
     * $query->filterByBookerEmail('fooValue');   // WHERE booker_email = 'fooValue'
     * $query->filterByBookerEmail('%fooValue%', Criteria::LIKE); // WHERE booker_email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $bookerEmail The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBookingQuery The current query, for fluid interface
     */
    public function filterByBookerEmail($bookerEmail = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bookerEmail)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookingTableMap::COL_BOOKER_EMAIL, $bookerEmail, $comparison);
    }

    /**
     * Filter the query on the notes column
     *
     * Example usage:
     * <code>
     * $query->filterByNotes('fooValue');   // WHERE notes = 'fooValue'
     * $query->filterByNotes('%fooValue%', Criteria::LIKE); // WHERE notes LIKE '%fooValue%'
     * </code>
     *
     * @param     string $notes The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBookingQuery The current query, for fluid interface
     */
    public function filterByNotes($notes = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($notes)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookingTableMap::COL_NOTES, $notes, $comparison);
    }

    /**
     * Filter the query on the date_booked column
     *
     * Example usage:
     * <code>
     * $query->filterByDateBooked('2011-03-14'); // WHERE date_booked = '2011-03-14'
     * $query->filterByDateBooked('now'); // WHERE date_booked = '2011-03-14'
     * $query->filterByDateBooked(array('max' => 'yesterday')); // WHERE date_booked > '2011-03-13'
     * </code>
     *
     * @param     mixed $dateBooked The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBookingQuery The current query, for fluid interface
     */
    public function filterByDateBooked($dateBooked = null, $comparison = null)
    {
        if (is_array($dateBooked)) {
            $useMinMax = false;
            if (isset($dateBooked['min'])) {
                $this->addUsingAlias(BookingTableMap::COL_DATE_BOOKED, $dateBooked['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateBooked['max'])) {
                $this->addUsingAlias(BookingTableMap::COL_DATE_BOOKED, $dateBooked['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookingTableMap::COL_DATE_BOOKED, $dateBooked, $comparison);
    }

    /**
     * Filter the query by a related \NFAS\NFAS\Shoot object
     *
     * @param \NFAS\NFAS\Shoot|ObjectCollection $shoot The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildBookingQuery The current query, for fluid interface
     */
    public function filterByShoot($shoot, $comparison = null)
    {
        if ($shoot instanceof \NFAS\NFAS\Shoot) {
            return $this
                ->addUsingAlias(BookingTableMap::COL_SHOOT_ID, $shoot->getId(), $comparison);
        } elseif ($shoot instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BookingTableMap::COL_SHOOT_ID, $shoot->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByShoot() only accepts arguments of type \NFAS\NFAS\Shoot or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Shoot relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildBookingQuery The current query, for fluid interface
     */
    public function joinShoot($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Shoot');

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
            $this->addJoinObject($join, 'Shoot');
        }

        return $this;
    }

    /**
     * Use the Shoot relation Shoot object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \NFAS\NFAS\ShootQuery A secondary query class using the current class as primary query
     */
    public function useShootQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinShoot($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Shoot', '\NFAS\NFAS\ShootQuery');
    }

    /**
     * Filter the query by a related \NFAS\NFAS\Archer object
     *
     * @param \NFAS\NFAS\Archer|ObjectCollection $archer the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildBookingQuery The current query, for fluid interface
     */
    public function filterByArcher($archer, $comparison = null)
    {
        if ($archer instanceof \NFAS\NFAS\Archer) {
            return $this
                ->addUsingAlias(BookingTableMap::COL_ID, $archer->getBookingId(), $comparison);
        } elseif ($archer instanceof ObjectCollection) {
            return $this
                ->useArcherQuery()
                ->filterByPrimaryKeys($archer->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByArcher() only accepts arguments of type \NFAS\NFAS\Archer or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Archer relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildBookingQuery The current query, for fluid interface
     */
    public function joinArcher($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Archer');

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
            $this->addJoinObject($join, 'Archer');
        }

        return $this;
    }

    /**
     * Use the Archer relation Archer object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \NFAS\NFAS\ArcherQuery A secondary query class using the current class as primary query
     */
    public function useArcherQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinArcher($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Archer', '\NFAS\NFAS\ArcherQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildBooking $booking Object to remove from the list of results
     *
     * @return $this|ChildBookingQuery The current query, for fluid interface
     */
    public function prune($booking = null)
    {
        if ($booking) {
            $this->addUsingAlias(BookingTableMap::COL_ID, $booking->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the Booking table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(BookingTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            BookingTableMap::clearInstancePool();
            BookingTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(BookingTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(BookingTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            BookingTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            BookingTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // BookingQuery
