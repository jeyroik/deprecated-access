<?php
namespace df\components\access;

use df\interfaces\access\IAccess;
use df\interfaces\access\IAccessRepository;
use df\interfaces\access\IAccessSubject;
use jeyroik\extas\components\systems\SystemContainer;

/**
 * Class AccessSubject
 *
 * @package df\components\access
 * @author Funcraft <me@funcraft.ru>
 */
class AccessSubject extends AccessOperation implements IAccessSubject
{
    protected $subject = '';

    /**
     * AccessSection constructor.
     *
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $this->subject && ($config[IAccess::FIELD__SUBJECT] = $this->subject);

        parent::__construct($config);
    }

    /**
     * @param $operation
     * @param string $subject
     * @param string $section
     *
     * @return bool
     */
    public function hasOperation($operation, $subject = '', $section = ''): bool
    {
        $repo = $this->getRepo();

        $operation = $repo->find([
            IAccess::FIELD__OBJECT => $this->getObject(),
            IAccess::FIELD__SECTION => $section ?: $this->getSection(),
            IAccess::FIELD__SUBJECT => $subject ?: $this->getSubject(),
            IAccess::FIELD__OPERATION => $operation
        ])->one();

        return $operation ? true : false;
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
        return 'df.access.subject';
    }
}
