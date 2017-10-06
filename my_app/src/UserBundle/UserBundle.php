<?php
/**
 * User bundle.
 */

namespace UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class UserBundle.
 *
 * @package UserBundle
 */


class UserBundle extends Bundle
{

/**
Get parent method.
 */
    public function getParent()
    {
        return 'FOSUserBundle';
    }

}
