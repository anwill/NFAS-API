<?php

namespace NFAS\NFAS\Map;

use NFAS\NFAS\Booking;
use NFAS\NFAS\BookingQuery;
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
 * This class defines the structure of the 'Booking' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class BookingTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'NFAS.NFAS.Map.BookingTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'Booking';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\NFAS\\NFAS\\Booking';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'NFAS.NFAS.Booking';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 8;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 8;

    /**
     * the column name for the id field
     */
    const COL_ID = 'Booking.id';

    /**
     * the column name for the shoot_id field
     */
    const COL_SHOOT_ID = 'Booking.shoot_id';

    /**
     * the column name for the shoot_together field
     */
    const COL_SHOOT_TOGETHER = 'Booking.shoot_together';

    /**
     * the column name for the shoot_days field
     */
    const COL_SHOOT_DAYS = 'Booking.shoot_days';

    /**
     * the column name for the permission field
     */
    const COL_PERMISSION = 'Booking.permission';

    /**
     * the column name for the booker_email field
     */
    const COL_BOOKER_EMAIL = 'Booking.booker_email';

    /**
     * the column name for the notes field
     */
    const COL_NOTES = 'Booking.notes';

    /**
     * the column name for the date_booked field
     */
    const COL_DATE_BOOKED = 'Booking.date_booked';

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
        self::TYPE_PHPNAME       => array('Id', 'ShootId', 'ShootTogether', 'ShootDays', 'Permission', 'BookerEmail', 'Notes', 'DateBooked', ),
        self::TYPE_CAMELNAME     => array('id', 'shootId', 'shootTogether', 'shootDays', 'permission', 'bookerEmail', 'notes', 'dateBooked', ),
        self::TYPE_COLNAME       => array(BookingTableMap::COL_ID, BookingTableMap::COL_SHOOT_ID, BookingTableMap::COL_SHOOT_TOGETHER, BookingTableMap::COL_SHOOT_DAYS, BookingTableMap::COL_PERMISSION, BookingTableMap::COL_BOOKER_EMAIL, BookingTableMap::COL_NOTES, BookingTableMap::COL_DATE_BOOKED, ),
        self::TYPE_FIELDNAME     => array('id', 'shoot_id', 'shoot_together', 'shoot_days', 'permission', 'booker_email', 'notes', 'date_booked', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'ShootId' => 1, 'ShootTogether' => 2, 'ShootDays' => 3, 'Permission' => 4, 'BookerEmail' => 5, 'Notes' => 6, 'DateBooked' => 7, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'shootId' => 1, 'shootTogether' => 2, 'shootDays' => 3, 'permission' => 4, 'bookerEmail' => 5, 'notes' => 6, 'dateBooked' => 7, ),
        self::TYPE_COLNAME       => array(BookingTableMap::COL_ID => 0, BookingTableMap::COL_SHOOT_ID => 1, BookingTableMap::COL_SHOOT_TOGETHER => 2, BookingTableMap::COL_SHOOT_DAYS => 3, BookingTableMap::COL_PERMISSION => 4, BookingTableMap::COL_BOOKER_EMAIL => 5, BookingTableMap::COL_NOTES => 6, BookingTableMap::COL_DATE_BOOKED => 7, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'shoot_id' => 1, 'shoot_together' => 2, 'shoot_days' => 3, 'permission' => 4, 'booker_email' => 5, 'notes' => 6, 'date_booked' => 7, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
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
        $this->setName('Booking');
        $this->setPhpName('Booking');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\NFAS\\NFAS\\Booking');
        $this->setPackage('NFAS.NFAS');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('id', 'Id', 'VARCHAR', true, 36, null);
        $this->addForeignKey('shoot_id', 'ShootId', 'VARCHAR', 'Shoot', 'id', true, 36, null);
        $this->addColumn('shoot_together', 'ShootTogether', 'BOOLEAN', true, 1, false);
        $this->addColumn('shoot_days', 'ShootDays', 'VARCHAR', false, 30, null);
        $this->addColumn('permission', 'Permission', 'BOOLEAN', true, 1, false);
        $this->addColumn('booker_email', 'BookerEmail', 'VARCHAR', true, 150, null);
        $this->addColumn('notes', 'Notes', 'LONGVARCHAR', false, 1000, null);
        $this->addColumn('date_booked', 'DateBooked', 'TIMESTAMP', true, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Shoot', '\\NFAS\\NFAS\\Shoot', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':shoot_id',
    1 => ':id',
  ),
), 'CASCADE', null, null, false);
        $this->addRelation('Archer', '\\NFAS\\NFAS\\Archer', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':booking_id',
    1 => ':id',
  ),
), 'CASCADE', null, 'Archers', false);
    } // buildRelations()
    /**
     * Method to invalidate the instance pool of all tables related to Booking     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
        // Invalidate objects in related instance pools,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        ArcherTableMap::clearInstancePool();
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
        return $withPrefix ? BookingTableMap::CLASS_DEFAULT : BookingTableMap::OM_CLASS;
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
     * @return array           (Booking object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = BookingTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = BookingTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + BookingTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = BookingTableMap::OM_CLASS;
            /** @var Booking $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            BookingTableMap::addInstanceToPool($obj, $key);
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
            $key = BookingTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = BookingTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Booking $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                BookingTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(BookingTableMap::COL_ID);
            $criteria->addSelectColumn(BookingTableMap::COL_SHOOT_ID);
            $criteria->addSelectColumn(BookingTableMap::COL_SHOOT_TOGETHER);
            $criteria->addSelectColumn(BookingTableMap::COL_SHOOT_DAYS);
            $criteria->addSelectColumn(BookingTableMap::COL_PERMISSION);
            $criteria->addSelectColumn(BookingTableMap::COL_BOOKER_EMAIL);
            $criteria->addSelectColumn(BookingTableMap::COL_NOTES);
            $criteria->addSelectColumn(BookingTableMap::COL_DATE_BOOKED);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.shoot_id');
            $criteria->addSelectColumn($alias . '.shoot_together');
            $criteria->addSelectColumn($alias . '.shoot_days');
            $criteria->addSelectColumn($alias . '.permission');
            $criteria->addSelectColumn($alias . '.booker_email');
            $criteria->addSelectColumn($alias . '.notes');
            $criteria->addSelectColumn($alias . '.date_booked');
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
        return Propel::getServiceContainer()->getDatabaseMap(BookingTableMap::DATABASE_NAME)->getTable(BookingTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(BookingTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(BookingTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new BookingTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Booking or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Booking object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(BookingTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \NFAS\NFAS\Booking) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(BookingTableMap::DATABASE_NAME);
            $criteria->add(BookingTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = BookingQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            BookingTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                BookingTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the Booking table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return BookingQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Booking or Criteria object.
     *
     * @param mixed               $criteria Criteria or Booking object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(BookingTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Booking object
        }


        // Set the correct dbName
        $query = BookingQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // BookingTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BookingTableMap::buildTableMap();
