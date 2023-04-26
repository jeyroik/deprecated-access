<?php
namespace df\components\access;

use df\interfaces\access\IAccessRepository;
use jeyroik\extas\components\systems\repositories\RepositoryMongo;

/**
 * Class AccessRepository
 *
 * @package df\components\access
 * @author Funcraft <me@funcraft.ru>
 */
class AccessRepository extends RepositoryMongo implements IAccessRepository
{
    protected $collectionName = 'df__access';
    protected $itemClass = Access::class;
}
