<?php
namespace df\interfaces\access;

use jeyroik\extas\interfaces\systems\IItem;

/**
 * Interface IAccess
 *
 * @package df\interfaces\access
 * @author Funcraft <me@funcraft.ru>
 */
interface IAccess extends IItem
{
    const SUBJECT = 'df.access';

    const FIELD__OBJECT = 'object';
    const FIELD__SECTION = 'section';
    const FIELD__SUBJECT = 'subject';
    const FIELD__OPERATION = 'operation';
    const FIELD__RULES = 'rules';

    /**
     * @return mixed
     */
    public function getObject();

    /**
     * @return string
     */
    public function getSection(): string;

    /**
     * @return string
     */
    public function getSubject(): string;

    /**
     * @return string
     */
    public function getOperation(): string;

    /**
     * @return array
     */
    public function getRules();

    /**
     * @param $object
     *
     * @return IAccess
     */
    public function setObject($object);

    /**
     * @param $section
     *
     * @return IAccess
     */
    public function setSection($section);

    /**
     * @param $subject
     *
     * @return IAccess
     */
    public function setSubject($subject);

    /**
     * @param $operation
     *
     * @return IAccess
     */
    public function setOperation($operation);

    /**
     * @param $rules
     *
     * @return IAccess
     */
    public function setRules($rules);
}
