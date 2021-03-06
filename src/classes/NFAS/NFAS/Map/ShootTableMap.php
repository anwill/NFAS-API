<?php

namespace NFAS\NFAS\Map;

use NFAS\NFAS\Shoot;
use NFAS\NFAS\ShootQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'Shoot' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class ShootTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'NFAS.NFAS.Map.ShootTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'Shoot';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\NFAS\\NFAS\\Shoot';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'NFAS.NFAS.Shoot';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 9;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 9;

    /**
     * the column name for the id field
     */
    const COL_ID = 'Shoot.id';

    /**
     * the column name for the club_id field
     */
    const COL_CLUB_ID = 'Shoot.club_id';

    /**
     * the column name for the date_start field
     */
    const COL_DATE_START = 'Shoot.date_start';

    /**
     * the column name for the date_end field
     */
    const COL_DATE_END = 'Shoot.date_end';

    /**
     * the column name for the description field
     */
    const COL_DESCRIPTION = 'Shoot.description';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'Shoot.status';

    /**
     * the column name for the times_round field
     */
    const COL_TIMES_ROUND = 'Shoot.times_round';

    /**
     * the column name for the targets field
     */
    const COL_TARGETS = 'Shoot.targets';

    /**
     * the column name for the max_per_target field
     */
    const COL_MAX_PER_TARGET = 'Shoot.max_per_target';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Id', 'ClubId', 'DateStart', 'DateEnd', 'Description', 'Status', 'TimesRound', 'Targets', 'MaxPerTarget', ),
        self::TYPE_CAMELNAME     => array('id', 'clubId', 'dateStart', 'dateEnd', 'description', 'status', 'timesRound', 'targets', 'maxPerTarget', ),
        self::TYPE_COLNAME       => array(ShootTableMap::COL_ID, ShootTableMap::COL_CLUB_ID, ShootTableMap::COL_DATE_START, ShootTableMap::COL_DATE_END, ShootTableMap::COL_DESCRIPTION, ShootTableMap::COL_STATUS, ShootTableMap::COL_TIMES_ROUND, ShootTableMap::COL_TARGETS, ShootTableMap::COL_MAX_PER_TARGET, ),
        self::TYPE_FIELDNAME     => array('id', 'club_id', 'date_start', 'date_end', 'description', 'status', 'times_round', 'targets', 'max_per_target', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'ClubId' => 1, 'DateStart' => 2, 'DateEnd' => 3, 'Description' => 4, 'Status' => 5, 'TimesRound' => 6, 'Targets' => 7, 'MaxPerTarget' => 8, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'clubId' => 1, 'dateStart' => 2, 'dateEnd' => 3, 'description' => 4, 'status' => 5, 'timesRound' => 6, 'targets' => 7, 'maxPerTarget' => 8, ),
        self::TYPE_COLNAME       => array(ShootTableMap::COL_ID => 0, ShootTableMap::COL_CLUB_ID => 1, ShootTableMap::COL_DATE_START => 2, ShootTableMap::COL_DATE_END => 3, ShootTableMap::COL_DESCRIPTION => 4, ShootTableMap::COL_STATUS => 5, ShootTableMap::COL_TIMES_ROUND => 6, ShootTableMap::COL_TARGETS => 7, ShootTableMap::COL_MAX_PER_TARGET => 8, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'club_id' => 1, 'date_start' => 2, 'date_end' => 3, 'description' => 4, 'status' => 5, 'times_round' => 6, 'targets' => 7, 'max_per_target' => 8, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('Shoot');
        $this->setPhpName('Shoot');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\NFAS\\NFAS\\Shoot');
        $this->setPackage('NFAS.NFAS');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('id', 'Id', 'VARCHAR', true, 36, null);
        $this->addForeignKey('club_id', 'ClubId', 'VARCHAR', 'Club', 'id', true, 36, null);
        $this->addColumn('date_start', 'DateStart', 'DATE', true, null, null);
        $this->addColumn('date_end', 'DateEnd', 'DATE', false, null, null);
        $this->addColumn('description', 'Description', 'LONGVARCHAR', false, null, null);
        $this->addColumn('status', 'Status', 'VARCHAR', false, 6, null);
        $this->addColumn('times_round', 'TimesRound', 'INTEGER', false, 2, null);
        $this->addColumn('targets', 'Targets', 'INTEGER', false, 3, null);
        $this->addColumn('max_per_target', 'MaxPerTarget', 'INTEGER', false, 2, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Club', '\\NFAS\\NFAS\\Club', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':club_id',
    1 => ':id',
  ),
), 'CASCADE', null, null, false);
        $this->addRelation('Booking', '\\NFAS\\NFAS\\Booking', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':shoot_id',
    1 => ':id',
  ),
), 'CASCADE', null, 'Bookings', false);
    } // buildRelations()
    /**
     * Method to invalidate the instance pool of all tables related to Shoot     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
        // Invalidate objects in related instance pools,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        BookingTableMap::clearInstancePool();
    }

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? ShootTableMap::CLASS_DEFAULT : ShootTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (Shoot object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = ShootTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = ShootTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + ShootTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ShootTableMap::OM_CLASS;
            /** @var Shoot $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            ShootTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = ShootTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = ShootTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Shoot $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ShootTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(ShootTableMap::COL_ID);
            $criteria->addSelectColumn(ShootTableMap::COL_CLUB_ID);
            $criteria->addSelectColumn(ShootTableMap::COL_DATE_START);
            $criteria->addSelectColumn(ShootTableMap::COL_DATE_END);
            $criteria->addSelectColumn(ShootTableMap::COL_DESCRIPTION);
            $criteria->addSelectColumn(ShootTableMap::COL_STATUS);
            $criteria->addSelectColumn(ShootTableMap::COL_TIMES_ROUND);
            $criteria->addSelectColumn(ShootTableMap::COL_TARGETS);
            $criteria->addSelectColumn(ShootTableMap::COL_MAX_PER_TARGET);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.club_id');
            $criteria->addSelectColumn($alias . '.date_start');
            $criteria->addSelectColumn($alias . '.date_end');
            $criteria->addSelectColumn($alias . '.description');
            $criteria->addSelectColumn($alias . '.status');
            $criteria->addSelectColumn($alias . '.times_round');
            $criteria->addSelectColumn($alias . '.targets');
            $criteria->addSelectColumn($alias . '.max_per_target');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(ShootTableMap::DATABASE_NAME)->getTable(ShootTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(ShootTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(ShootTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new ShootTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Shoot or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Shoot object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ShootTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \NFAS\NFAS\Shoot) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ShootTableMap::DATABASE_NAME);
            $criteria->add(ShootTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = ShootQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            ShootTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                ShootTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the Shoot table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return ShootQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Shoot or Criteria object.
     *
     * @param mixed               $criteria Criteria or Shoot object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ShootTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Shoot object
        }


        // Set the correct dbName
        $query = ShootQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // ShootTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
ShootTableMap::buildTableMap();
