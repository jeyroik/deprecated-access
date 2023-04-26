<?php
namespace df\interfaces\access;

/**
 * Interface IAccessSection
 *
 * @package df\interfaces\access
 * @author Funcraft <me@funcraft.ru>
 */
interface IAccessSection extends IAccessSubject
{
    /**
     * @param $subject
     * @param string $section
     *
     * @return bool
     */
    public function hasSubject($subject, $section = ''): bool;
}
