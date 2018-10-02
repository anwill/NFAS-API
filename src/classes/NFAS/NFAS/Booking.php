<?php

namespace NFAS\NFAS;

use NFAS\NFAS\Base\Booking as BaseBooking;
use Propel\Runtime\Connection\ConnectionInterface;
use \Ramsey\Uuid\Uuid;

/**
 * Skeleton subclass for representing a row from the 'Booking' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class Booking extends BaseBooking
{
    public function preInsert(ConnectionInterface $con = null)
    {
        $this->setID(Uuid::uuid1());
        return true;
    }
}
