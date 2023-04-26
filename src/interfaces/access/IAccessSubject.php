<?php
namespace df\interfaces\access;

/**
 * Interface IAccessSubject
 *
 * @package df\interfaces\access
 * @author Funcraft <me@funcraft.ru>
 */
interface IAccessSubject extends IAccess
{
    /**
     * @param $operation
     * @param string $subject
     * @param string $section
     *
     * @return bool
     */
    public function hasOperation($operation, $subject = '', $section = ''): bool;
}
