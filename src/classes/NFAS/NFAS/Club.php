<?php

namespace NFAS\NFAS;

use NFAS\NFAS\Base\Club as BaseClub;
use Propel\Runtime\Connection\ConnectionInterface;
use \Ramsey\Uuid\Uuid;

/**
 * Skeleton subclass for representing a row from the 'Club' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class Club extends BaseClub
{
    public function preInsert(ConnectionInterface $con = null)
    {
        // ID
        $this->setID(Uuid::uuid1());
        return true;
    }

    public function createPassword() {
        $password = bin2hex(random_bytes(5));
        $hashed_password = password_hash($password,PASSWORD_BCRYPT, ['cost'=>14]);
        $this->setPassword($hashed_password);
        return $password;
    }

    public function exists($name, $email) {
        $email_exists = ClubQuery::create()->filterByEmail($email)->findOne();
        $name_exists = ClubQuery::create()->filterByName($name)->findOne();

        if ($email_exists || $name_exists) {
            return true;
        }

        return false;
    }

}
