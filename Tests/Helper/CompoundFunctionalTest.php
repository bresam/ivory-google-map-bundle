<?php

/*
 * This file is part of the Ivory Google Map package.
 *
 * (c) Eric GELOEN <geloen.eric@gmail.com>
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 */

namespace Ivory\GoogleMapBundle\Tests\Helper;

use Ivory\Tests\GoogleMap\Helper\Functional\CompoundFunctionalTest as BaseCompoundFunctionalTest;

/**
 * @author GeLo <geloen.eric@gmail.com>
 *
 * @group functional
 */
class CompoundFunctionalTest extends BaseCompoundFunctionalTest
{
    /**
     * {@inheritdoc}
     */
    protected function createApiHelper()
    {
        return HelperFactory::createApiHelper();
    }

    /**
     * {@inheritdoc}
     */
    protected function createMapHelper()
    {
        return HelperFactory::createMapHelper();
    }

    /**
     * {@inheritdoc}
     */
    protected function createPlaceAutocompleteHelper()
    {
        return HelperFactory::createPlaceAutocompleteHelper();
    }
}
