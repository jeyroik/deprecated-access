<?php
namespace df\interfaces\access;

/**
 * Interface IAccessOperation
 *
 * @package df\interfaces\access
 * @author aivanov@fix.ru
 */
interface IAccessOperation extends IAccess
{
    /**
     * @return bool
     */
    public function create(): bool;

    /**
     * @return bool
     */
    public function update(): bool;

    /**
     * @return bool
     */
    public function delete(): bool;

    /**
     * @return bool
     */
    public function exists(): bool;
}
