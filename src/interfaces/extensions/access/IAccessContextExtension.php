<?php
namespace df\interfaces\extensions\access;

use df\interfaces\access\IAccess;
use df\interfaces\access\IAccessSection;
use df\interfaces\access\IAccessSubject;
use df\interfaces\players\IPlayer;

/**
 * Interface IAccessContextExtension
 *
 * @package df\interfaces\extensions\access
 * @author Funcraft <me@funcraft.ru>
 */
interface IAccessContextExtension
{
    const CONTEXT_ITEM__PLAYER_CURRENT = 'df.player.current';

    /**
     * @param $accessData
     *
     * @return IAccess
     */
    public function createAccess($accessData): IAccess;

    /**
     * @return IPlayer
     */
    public function getCurrentPlayer();

    /**
     * @param $object
     * @param $section
     * @param $subject
     * @param $operation
     *
     * @return bool
     */
    public function hasAccess($object, $section, $subject, $operation): bool;

    /**
     * @param $object
     * @param $name
     *
     * @return IAccessSection
     */
    public function getAccessSection($object, $name): IAccessSection;

    /**
     * @param $object
     * @param $section
     * @param $subject
     *
     * @return IAccessSubject
     */
    public function getAccessSubject($object, $section, $subject): IAccessSubject;
}
