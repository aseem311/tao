<?php
/**
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; under version 2
 * of the License (non-upgradable).
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 *
 * Copyright (c) 2016 (original work) Open Assessment Technologies SA
 *
 */
namespace oat\nbcot\scripts\install;

use core_kernel_classes_Class;
use oat\generis\model\OntologyAwareTrait;
use oat\tao\scripts\install\RegisterValidationRules;

/**
 * This post-installation script creates a new local file source for services
 */
class RegisterRequiredProperties extends RegisterValidationRules
{
    use OntologyAwareTrait;

    public function __invoke($params)
    {
        $class = new core_kernel_classes_Class(TAO_ITEM_CLASS);
        $prop = $class->createProperty('Test', 'A test property');
        $prop->setRange(new core_kernel_classes_Class(RDFS_LITERAL));


        $this->addValidator($prop->getUri(), 'notEmpty');

        return new \common_report_Report(\common_report_Report::TYPE_SUCCESS, 'validator registered');
    }
}
