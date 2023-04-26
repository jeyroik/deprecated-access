<?php
namespace df\components\dispatchers\access;

use df\interfaces\extensions\access\IAccessContextExtension;
use df\interfaces\players\IPlayerRepository;
use gosp\webhooks\components\dispatchers\auth\AuthDispatcherCookieCleaner;
use gosp\webhooks\components\dispatchers\auth\AuthDispatcherCookieSaver;
use jeyroik\extas\components\dispatchers\DispatcherAbstract;
use jeyroik\extas\components\systems\SystemContainer;
use jeyroik\extas\interfaces\systems\contexts\IContextOnFailure;
use jeyroik\extas\interfaces\systems\IContext;

/**
 * Class AccessDispatcherCurrentPlayerCookie
 *
 * @package df\components\dispatchers\access
 * @author aivanov@fix.ru
 */
class AccessDispatcherCurrentPlayerCookie extends DispatcherAbstract
{
    protected $requireInterfaces = [
        IContextOnFailure::class
    ];

    /**
     * @param IContext|IContextOnFailure $context
     *
     * @return IContext
     * @throws
     */
    protected function dispatch(IContext $context): IContext
    {
        if (isset($_COOKIE[AuthDispatcherCookieSaver::COOKIE__FIELD])) {
            list($hash, $name) = explode('#!', $_COOKIE[AuthDispatcherCookieSaver::COOKIE__FIELD]);
            if (sha1($name . AuthDispatcherCookieSaver::HOURS__30) == $hash) {
                /**
                 * var $playerRepo IPlayerRepository
                 */
                $playerRepo = SystemContainer::getItem(IPlayerRepository::class);
                $context[IAccessContextExtension::CONTEXT_ITEM__PLAYER_CURRENT] = $playerRepo->find(['name' => $name])
                    ->one();
                $context->setSuccess();
            } else {
                $cookieCleaner = new AuthDispatcherCookieCleaner();
                $cookieCleaner($this->currentState, $context);

                $context->setFail();
            }
        } else {
            $context->setFail();
        }

        return $context;
    }
}
