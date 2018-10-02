<?php

namespace NFAS\NFAS\Base;

use \Exception;
use \PDO;
use NFAS\NFAS\Club as ChildClub;
use NFAS\NFAS\ClubQuery as ChildClubQuery;
use NFAS\NFAS\Map\ClubTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'Club' table.
 *
 *
 *
 * @method     ChildClubQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildClubQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildClubQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildClubQuery orderByPassword($order = Criteria::ASC) Order by the password column
 *
 * @method     ChildClubQuery groupById() Group by the id column
 * @method     ChildClubQuery groupByName() Group by the name column
 * @method     ChildClubQuery groupByEmail() Group by the email column
 * @method     ChildClubQuery groupByPassword() Group by the password column
 *
 * @method     ChildClubQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildClubQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildClubQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildClubQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildClubQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildClubQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildClubQuery leftJoinLicence($relationAlias = null) Adds a LEFT JOIN clause to the query using the Licence relation
 * @method     ChildClubQuery rightJoinLicence($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Licence relation
 * @method     ChildClubQuery innerJoinLicence($relationAlias = null) Adds a INNER JOIN clause to the query using the Licence relation
 *
 * @method     ChildClubQuery joinWithLicence($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Licence relation
 *
 * @method     ChildClubQuery leftJoinWithLicence() Adds a LEFT JOIN clause and with to the query using the Licence relation
 * @method     ChildClubQuery rightJoinWithLicence() Adds a RIGHT JOIN clause and with to the query using the Licence relation
 * @method     ChildClubQuery innerJoinWithLicence() Adds a INNER JOIN clause and with to the query using the Licence relation
 *
 * @method     ChildClubQuery leftJoinShoot($relationAlias = null) Adds a LEFT JOIN clause to the query using the Shoot relation
 * @method     ChildClubQuery rightJoinShoot($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Shoot relation
 * @method     ChildClubQuery innerJoinShoot($relationAlias = null) Adds a INNER JOIN clause to the query using the Shoot relation
 *
 * @method     ChildClubQuery joinWithShoot($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Shoot relation
 *
 * @method     ChildClubQuery leftJoinWithShoot() Adds a LEFT JOIN clause and with to the query using the Shoot relation
 * @method     ChildClubQuery rightJoinWithShoot() Adds a RIGHT JOIN clause and with to the query using the Shoot relation
 * @method     ChildClubQuery innerJoinWithShoot() Adds a INNER JOIN clause and with to the query using the Shoot relation
 *
 * @method     \NFAS\NFAS\LicenceQuery|\NFAS\NFAS\ShootQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildClub findOne(ConnectionInterface $con = null) Return the first ChildClub matching the query
 * @method     ChildClub findOneOrCreate(ConnectionInterface $con = null) Return the first ChildClub matching the query, or a new ChildClub object populated from the query conditions when no match is found
 *
 * @method     ChildClub findOneById(string $id) Return the first ChildClub filtered by the id column
 * @method     ChildClub findOneByName(string $name) Return the first ChildClub filtered by the name column
 * @method     ChildClub findOneByEmail(string $email) Return the first ChildClub filtered by the email column
 * @method     ChildClub findOneByPassword(string $password) Return the first ChildClub filtered by the password column *

 * @method     ChildClub requirePk($key, ConnectionInterface $con = null) Return the ChildClub by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildClub requireOne(ConnectionInterface $con = null) Return the first ChildClub matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildClub requireOneById(string $id) Return the first ChildClub filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildClub requireOneByName(string $name) Return the first ChildClub filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildClub requireOneByEmail(string $email) Return the first ChildClub filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildClub requireOneByPassword(string $password) Return the first ChildClub filtered by the password column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildClub[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildClub objects based on current ModelCriteria
 * @method     ChildClub[]|ObjectCollection findById(string $id) Return ChildClub objects filtered by the id column
 * @method     ChildClub[]|ObjectCollection findByName(string $name) Return ChildClub objects filtered by the name column
 * @method     ChildClub[]|ObjectCollection findByEmail(string $email) Return ChildClub objects filtered by the email column
 * @method     ChildClub[]|ObjectCollection findByPassword(string $password) Return ChildClub objects filtered by the password column
 * @method     ChildClub[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ClubQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \NFAS\NFAS\Base\ClubQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\NFAS\\NFAS\\Club', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildClubQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildClubQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildClubQuery) {
            return $criteria;
        }
        $query = new ChildClubQuery();
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
     * @return ChildClub|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ClubTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ClubTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildClub A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, name, email, password FROM Club WHERE id = :p0';
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
            /** @var ChildClub $obj */
            $obj = new ChildClub();
            $obj->hydrate($row);
            ClubTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildClub|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildClubQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ClubTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildClubQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ClubTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildClubQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($id)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClubTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildClubQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClubTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%', Criteria::LIKE); // WHERE email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildClubQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClubTableMap::COL_EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the password column
     *
     * Example usage:
     * <code>
     * $query->filterByPassword('fooValue');   // WHERE password = 'fooValue'
     * $query->filterByPassword('%fooValue%', Criteria::LIKE); // WHERE password LIKE '%fooValue%'
     * </code>
     *
     * @param     string $password The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildClubQuery The current query, for fluid interface
     */
    public function filterByPassword($password = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($password)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClubTableMap::COL_PASSWORD, $password, $comparison);
    }

    /**
     * Filter the query by a related \NFAS\NFAS\Licence object
     *
     * @param \NFAS\NFAS\Licence|ObjectCollection $licence the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildClubQuery The current query, for fluid interface
     */
    public function filterByLicence($licence, $comparison = null)
    {
        if ($licence instanceof \NFAS\NFAS\Licence) {
            return $this
                ->addUsingAlias(ClubTableMap::COL_ID, $licence->getClubId(), $comparison);
        } elseif ($licence instanceof ObjectCollection) {
            return $this
                ->useLicenceQuery()
                ->filterByPrimaryKeys($licence->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByLicence() only accepts arguments of type \NFAS\NFAS\Licence or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Licence relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildClubQuery The current query, for fluid interface
     */
    public function joinLicence($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Licence');

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
            $this->addJoinObject($join, 'Licence');
        }

        return $this;
    }

    /**
     * Use the Licence relation Licence object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \NFAS\NFAS\LicenceQuery A secondary query class using the current class as primary query
     */
    public function useLicenceQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinLicence($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Licence', '\NFAS\NFAS\LicenceQuery');
    }

    /**
     * Filter the query by a related \NFAS\NFAS\Shoot object
     *
     * @param \NFAS\NFAS\Shoot|ObjectCollection $shoot the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildClubQuery The current query, for fluid interface
     */
    public function filterByShoot($shoot, $comparison = null)
    {
        if ($shoot instanceof \NFAS\NFAS\Shoot) {
            return $this
                ->addUsingAlias(ClubTableMap::COL_ID, $shoot->getClubId(), $comparison);
        } elseif ($shoot instanceof ObjectCollection) {
            return $this
                ->useShootQuery()
                ->filterByPrimaryKeys($shoot->getPrimaryKeys())
                ->endUse();
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
     * @return $this|ChildClubQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   ChildClub $club Object to remove from the list of results
     *
     * @return $this|ChildClubQuery The current query, for fluid interface
     */
    public function prune($club = null)
    {
        if ($club) {
            $this->addUsingAlias(ClubTableMap::COL_ID, $club->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the Club table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ClubTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ClubTableMap::clearInstancePool();
            ClubTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ClubTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ClubTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ClubTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ClubTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ClubQuery
