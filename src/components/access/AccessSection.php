<?php
namespace df\components\access;

use df\interfaces\access\IAccess;
use df\interfaces\access\IAccessSection;

/**
 * Class AccessSection
 *
 * @package df\components\access
 * @author Funcraft <me@funcraft.ru>
 */
class AccessSection extends AccessSubject implements IAccessSection
{
    protected $section = '';

    /**
     * AccessSection constructor.
     *
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $this->section && ($config[IAccess::FIELD__SECTION] = $this->section);

        parent::__construct($config);
    }

    /**
     * @param $subject
     * @param string $section
     *
     * @return bool
     */
    public function hasSubject($subject, $section = ''): bool
    {
        $repo = $this->getRepo();
        $subject = $repo->find([
            IAccess::FIELD__OBJECT => $this->getObject(),
            IAccess::FIELD__SECTION => $section ?: $this->getSection(),
            IAccess::FIELD__SUBJECT => $subject
        ])->one();

        return $subject ? true : false;
    }

    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return 'df.access.section';
    }
}
