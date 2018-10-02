<?php

namespace NFAS\NFAS;

use NFAS\NFAS\Base\Shoot as BaseShoot;
use Propel\Runtime\Connection\ConnectionInterface;
use \Ramsey\Uuid\Uuid;

/**
 * Skeleton subclass for representing a row from the 'Shoot' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class Shoot extends BaseShoot
{
    public function preInsert(ConnectionInterface $con = null)
    {
        $this->setID(Uuid::uuid1());
        return true;
    }

    public function validShoot($id) {

        $shoot = ShootQuery::create()
            ->filterById($id)
            ->where('Shoot.date_start >= DATE(NOW())');
        if ($shoot->findOne()) {
            return true;
        } else {
            return $shoot->toString();
        }
    }
}
