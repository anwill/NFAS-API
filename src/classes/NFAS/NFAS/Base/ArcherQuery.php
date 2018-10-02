<?php

namespace NFAS\NFAS\Base;

use \Exception;
use \PDO;
use NFAS\NFAS\Archer as ChildArcher;
use NFAS\NFAS\ArcherQuery as ChildArcherQuery;
use NFAS\NFAS\Map\ArcherTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'Archer' table.
 *
 *
 *
 * @method     ChildArcherQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildArcherQuery orderByBookingId($order = Criteria::ASC) Order by the booking_id column
 * @method     ChildArcherQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildArcherQuery orderByClass($order = Criteria::ASC) Order by the class column
 * @method     ChildArcherQuery orderByGender($order = Criteria::ASC) Order by the gender column
 * @method     ChildArcherQuery orderByAge($order = Criteria::ASC) Order by the age column
 * @method     ChildArcherQuery orderByClub($order = Criteria::ASC) Order by the club column
 *
 * @method     ChildArcherQuery groupById() Group by the id column
 * @method     ChildArcherQuery groupByBookingId() Group by the booking_id column
 * @method     ChildArcherQuery groupByName() Group by the name column
 * @method     ChildArcherQuery groupByClass() Group by the class column
 * @method     ChildArcherQuery groupByGender() Group by the gender column
 * @method     ChildArcherQuery groupByAge() Group by the age column
 * @method     ChildArcherQuery groupByClub() Group by the club column
 *
 * @method     ChildArcherQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildArcherQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildArcherQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildArcherQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildArcherQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildArcherQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildArcherQuery leftJoinBooking($relationAlias = null) Adds a LEFT JOIN clause to the query using the Booking relation
 * @method     ChildArcherQuery rightJoinBooking($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Booking relation
 * @method     ChildArcherQuery innerJoinBooking($relationAlias = null) Adds a INNER JOIN clause to the query using the Booking relation
 *
 * @method     ChildArcherQuery joinWithBooking($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Booking relation
 *
 * @method     ChildArcherQuery leftJoinWithBooking() Adds a LEFT JOIN clause and with to the query using the Booking relation
 * @method     ChildArcherQuery rightJoinWithBooking() Adds a RIGHT JOIN clause and with to the query using the Booking relation
 * @method     ChildArcherQuery innerJoinWithBooking() Adds a INNER JOIN clause and with to the query using the Booking relation
 *
 * @method     \NFAS\NFAS\BookingQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildArcher findOne(ConnectionInterface $con = null) Return the first ChildArcher matching the query
 * @method     ChildArcher findOneOrCreate(ConnectionInterface $con = null) Return the first ChildArcher matching the query, or a new ChildArcher object populated from the query conditions when no match is found
 *
 * @method     ChildArcher findOneById(string $id) Return the first ChildArcher filtered by the id column
 * @method     ChildArcher findOneByBookingId(string $booking_id) Return the first ChildArcher filtered by the booking_id column
 * @method     ChildArcher findOneByName(string $name) Return the first ChildArcher filtered by the name column
 * @method     ChildArcher findOneByClass(string $class) Return the first ChildArcher filtered by the class column
 * @method     ChildArcher findOneByGender(string $gender) Return the first ChildArcher filtered by the gender column
 * @method     ChildArcher findOneByAge(string $age) Return the first ChildArcher filtered by the age column
 * @method     ChildArcher findOneByClub(string $club) Return the first ChildArcher filtered by the club column *

 * @method     ChildArcher requirePk($key, ConnectionInterface $con = null) Return the ChildArcher by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildArcher requireOne(ConnectionInterface $con = null) Return the first ChildArcher matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildArcher requireOneById(string $id) Return the first ChildArcher filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildArcher requireOneByBookingId(string $booking_id) Return the first ChildArcher filtered by the booking_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildArcher requireOneByName(string $name) Return the first ChildArcher filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildArcher requireOneByClass(string $class) Return the first ChildArcher filtered by the class column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildArcher requireOneByGender(string $gender) Return the first ChildArcher filtered by the gender column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildArcher requireOneByAge(string $age) Return the first ChildArcher filtered by the age column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildArcher requireOneByClub(string $club) Return the first ChildArcher filtered by the club column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildArcher[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildArcher objects based on current ModelCriteria
 * @method     ChildArcher[]|ObjectCollection findById(string $id) Return ChildArcher objects filtered by the id column
 * @method     ChildArcher[]|ObjectCollection findByBookingId(string $booking_id) Return ChildArcher objects filtered by the booking_id column
 * @method     ChildArcher[]|ObjectCollection findByName(string $name) Return ChildArcher objects filtered by the name column
 * @method     ChildArcher[]|ObjectCollection findByClass(string $class) Return ChildArcher objects filtered by the class column
 * @method     ChildArcher[]|ObjectCollection findByGender(string $gender) Return ChildArcher objects filtered by the gender column
 * @method     ChildArcher[]|ObjectCollection findByAge(string $age) Return ChildArcher objects filtered by the age column
 * @method     ChildArcher[]|ObjectCollection findByClub(string $club) Return ChildArcher objects filtered by the club column
 * @method     ChildArcher[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ArcherQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \NFAS\NFAS\Base\ArcherQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\NFAS\\NFAS\\Archer', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildArcherQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildArcherQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildArcherQuery) {
            return $criteria;
        }
        $query = new ChildArcherQuery();
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
     * @return ChildArcher|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ArcherTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ArcherTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildArcher A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, booking_id, name, class, gender, age, club FROM Archer WHERE id = :p0';
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
            /** @var ChildArcher $obj */
            $obj = new ChildArcher();
            $obj->hydrate($row);
            ArcherTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildArcher|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildArcherQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ArcherTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildArcherQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ArcherTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildArcherQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($id)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ArcherTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the booking_id column
     *
     * Example usage:
     * <code>
     * $query->filterByBookingId('fooValue');   // WHERE booking_id = 'fooValue'
     * $query->filterByBookingId('%fooValue%', Criteria::LIKE); // WHERE booking_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $bookingId The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildArcherQuery The current query, for fluid interface
     */
    public function filterByBookingId($bookingId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bookingId)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ArcherTableMap::COL_BOOKING_ID, $bookingId, $comparison);
    }

    /**
     * Filter the query on the name column
     *
     * Example usage:
     * <code>
     * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
     * $query->filterByName('%fooValue%', Criteria::LIKE); // WHERE name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildArcherQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ArcherTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the class column
     *
     * Example usage:
     * <code>
     * $query->filterByClass('fooValue');   // WHERE class = 'fooValue'
     * $query->filterByClass('%fooValue%', Criteria::LIKE); // WHERE class LIKE '%fooValue%'
     * </code>
     *
     * @param     string $class The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildArcherQuery The current query, for fluid interface
     */
    public function filterByClass($class = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($class)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ArcherTableMap::COL_CLASS, $class, $comparison);
    }

    /**
     * Filter the query on the gender column
     *
     * Example usage:
     * <code>
     * $query->filterByGender('fooValue');   // WHERE gender = 'fooValue'
     * $query->filterByGender('%fooValue%', Criteria::LIKE); // WHERE gender LIKE '%fooValue%'
     * </code>
     *
     * @param     string $gender The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildArcherQuery The current query, for fluid interface
     */
    public function filterByGender($gender = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($gender)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ArcherTableMap::COL_GENDER, $gender, $comparison);
    }

    /**
     * Filter the query on the age column
     *
     * Example usage:
     * <code>
     * $query->filterByAge('fooValue');   // WHERE age = 'fooValue'
     * $query->filterByAge('%fooValue%', Criteria::LIKE); // WHERE age LIKE '%fooValue%'
     * </code>
     *
     * @param     string $age The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildArcherQuery The current query, for fluid interface
     */
    public function filterByAge($age = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($age)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ArcherTableMap::COL_AGE, $age, $comparison);
    }

    /**
     * Filter the query on the club column
     *
     * Example usage:
     * <code>
     * $query->filterByClub('fooValue');   // WHERE club = 'fooValue'
     * $query->filterByClub('%fooValue%', Criteria::LIKE); // WHERE club LIKE '%fooValue%'
     * </code>
     *
     * @param     string $club The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildArcherQuery The current query, for fluid interface
     */
    public function filterByClub($club = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($club)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ArcherTableMap::COL_CLUB, $club, $comparison);
    }

    /**
     * Filter the query by a related \NFAS\NFAS\Booking object
     *
     * @param \NFAS\NFAS\Booking|ObjectCollection $booking The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildArcherQuery The current query, for fluid interface
     */
    public function filterByBooking($booking, $comparison = null)
    {
        if ($booking instanceof \NFAS\NFAS\Booking) {
            return $this
                ->addUsingAlias(ArcherTableMap::COL_BOOKING_ID, $booking->getId(), $comparison);
        } elseif ($booking instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ArcherTableMap::COL_BOOKING_ID, $booking->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildArcherQuery The current query, for fluid interface
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
     * @param   ChildArcher $archer Object to remove from the list of results
     *
     * @return $this|ChildArcherQuery The current query, for fluid interface
     */
    public function prune($archer = null)
    {
        if ($archer) {
            $this->addUsingAlias(ArcherTableMap::COL_ID, $archer->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the Archer table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ArcherTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ArcherTableMap::clearInstancePool();
            ArcherTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ArcherTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ArcherTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ArcherTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ArcherTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ArcherQuery
