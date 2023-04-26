<?php
namespace df\components\access;

use df\interfaces\access\IAccess;
use df\interfaces\access\IAccessOperation;
use df\interfaces\access\IAccessRepository;
use jeyroik\extas\components\systems\SystemContainer;

/**
 * Class AccessOperation
 *
 * @package df\components\access
 * @author aivanov@fix.ru
 */
class AccessOperation extends Access implements IAccessOperation
{
    protected $operation = '';

    /**
     * AccessSection constructor.
     *
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $this->operation && ($config[IAccess::FIELD__OPERATION] = $this->operation);

        parent::__construct($config);
    }

    /**
     * @return bool
     * @throws \Exception
     */
    public function create(): bool
    {
file_put_contents('/tmp/df.log', 'start op'.PHP_EOL, FILE_APPEND);
        $repo = $this->getRepo();
        $operation = $this->getOne();

        if (!$operation) {
file_put_contents('/tmp/df.log', 'operation. before insert'.PHP_EOL, FILE_APPEND);
            $operation = $repo->create($this->__toArray());
file_put_contents('/tmp/df.log', 'operation. after insert'.PHP_EOL, FILE_APPEND);
            return $operation ? true : false;
        }
file_put_contents('/tmp/df.log', 'wtf'.PHP_EOL, FILE_APPEND);
        throw new \Exception('Operation already exists');
    }

    /**
     * @return bool
     * @throws \Exception
     */
    public function update(): bool
    {
        $operation = $this->getOne();

        if ($operation) {
            $updated = $this->getRepo()->update($operation);
            return $updated ? true : false;
        }

        throw new \Exception('Unknown operation');
    }

    /**
     * @return bool
     * @throws
     */
    public function delete(): bool
    {
        $operation = $this->getOne();

        if ($operation) {
            $deleted = $this->getRepo()->delete($operation);
            return $deleted ? true : false;
        }

        throw new \Exception('Unknown operation');
    }

    /**
     * @return bool
     */
    public function exists(): bool
    {
        $operation = $this->getOne();

        return $operation ? true : false;
    }

    /**
     * @return mixed
     */
    protected function getOne()
    {
        $repo = $this->getRepo();
        $where = [
            IAccess::FIELD__OBJECT => $this->getObject()
        ];

        $this->getSection() && ($where[IAccess::FIELD__SECTION] = $this->getSection());
        $this->getSubject() && ($where[IAccess::FIELD__SUBJECT] = $this->getSubject());
        $this->getOperation() && ($where[IAccess::FIELD__OPERATION] = $this->getOperation());

        return $repo->find($where)->one();
    }

    /**
     * @return IAccessRepository
     */
    protected function getRepo(): IAccessRepository
    {
        return SystemContainer::getItem(IAccessRepository::class);
    }

    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return 'df.access.operation';
    }
}
