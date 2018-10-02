<?php

namespace NFAS\NFAS;

use NFAS\NFAS\Base\Licence as BaseLicence;
use Propel\Runtime\Connection\ConnectionInterface;
use \Ramsey\Uuid\Uuid;

/**
 * Skeleton subclass for representing a row from the 'Licence' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class Licence extends BaseLicence
{
    public function preInsert(ConnectionInterface $con = null)
    {
        $this->setID(Uuid::uuid1());
        return true;
    }

    public function validLicence($id) {

        $licence = LicenceQuery::create()
            ->where("Licence.id = '" . $id . "'")
            ->where('Licence.start <= DATE(NOW())')
            ->where('Licence.end >= DATE(NOW())');


        if ($licence->findOne()) {
            return true;
        } else {
            return $licence->toString();
        }
    }
}
