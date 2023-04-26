<?php
namespace df\components\access;

use df\interfaces\access\IAccess;
use jeyroik\extas\components\systems\Item;

/**
 * Class Access
 *
 * @package df\components\access
 * @author Funcraft <me@funcraft.ru>
 */
class Access extends Item implements IAccess
{
    /**
     * @return mixed
     */
    public function getObject()
    {
        return $this->config[static::FIELD__OBJECT] ?? '';
    }

    /**
     * @return string
     */
    public function getSection(): string
    {
        return $this->config[static::FIELD__SECTION] ?? '';
    }

    /**
     * @return string
     */
    public function getSubject(): string
    {
        return $this->config[static::FIELD__SUBJECT] ?? '';
    }

    /**
     * @return string
     */
    public function getOperation(): string
    {
        return $this->config[static::FIELD__OPERATION] ?? '';
    }

    /**
     * @return array
     */
    public function getRules()
    {
        return $this->config[static::FIELD__RULES] ?? [];
    }

    /**
     * @param $object
     *
     * @return IAccess
     */
    public function setObject($object)
    {
        $this->config[static::FIELD__OBJECT] = $object;

        return $this;
    }

    /**
     * @param $section
     *
     * @return IAccess
     */
    public function setSection($section)
    {
        $this->config[static::FIELD__SECTION] = $section;

        return $this;
    }

    /**
     * @param $subject
     *
     * @return IAccess
     */
    public function setSubject($subject)
    {
        $this->config[static::FIELD__SUBJECT] = $subject;

        return $this;
    }

    /**
     * @param $operation
     *
     * @return IAccess
     */
    public function setOperation($operation)
    {
        $this->config[static::FIELD__OPERATION] = $operation;

        return $this;
    }

    /**
     * @param $rules
     *
     * @return IAccess
     */
    public function setRules($rules)
    {
        $this->config[static::FIELD__RULES] = $rules;

        return $this;
    }

    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return static::SUBJECT;
    }
}
