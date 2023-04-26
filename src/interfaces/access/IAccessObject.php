<?php
namespace df\interfaces\access;

/**
 * Interface IAccessObject
 *
 * @package df\interfaces\access
 * @author Funcraft <me@funcraft.ru>
 */
interface IAccessObject extends IAccessSection
{
    /**
     * @param $section
     *
     * @return bool
     */
    public function hasSection($section): bool;
}
