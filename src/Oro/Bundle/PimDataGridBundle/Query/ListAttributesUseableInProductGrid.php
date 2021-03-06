<?php

declare(strict_types=1);

namespace Oro\Bundle\PimDataGridBundle\Query;

/**
 * @author    Laurent Petard <laurent.petard@akeneo.com>
 * @copyright 2018 Akeneo SAS (http://www.akeneo.com)
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
interface ListAttributesUseableInProductGrid
{
    const ATTRIBUTES_PER_PAGE = 25;

    /**
     * Fetch a paginated list of attributes for the product grid
     *
     * @param string $locale        Code of the locale for the translation of the labels
     * @param int    $page          Number of the page (start at 1)
     * @param string $searchOnLabel String to search in the attribute label
     * @param int    $userId        Context's user id
     *
     * @return array
     */
    public function fetch(string $locale, int $page, string $searchOnLabel, int $userId): array;
}
