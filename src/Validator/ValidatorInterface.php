<?php
/**
 * Copyright (c) Andreas Heigl<andreas@heigl.org>
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @author    Andreas Heigl<andreas@heigl.org>
 * @copyright Andreas Heigl
 * @license   http://www.opensource.org/licenses/mit-license.php MIT-License
 * @since     23.06.2016
 * @link      http://github.com/heiglandreas/org.heigl.docblocchecker
 */

namespace Org_Heigl\DocBlockChecker\Validator;

use Org_Heigl\DocBlockChecker\ValidationResult\ValidationResultInterface;

interface ValidatorInterface
{
    const LOW = 16;

    const MEDIUM = 64;

    const HIGH = 128;
    
    /**
     * get a description of what this validator does
     *
     * @return string
     */
    public function getDescription();

    /**
     * Get the name of the rule
     *
     * @return string
     */
    public function getName();

    /**
     * Gets a proposed fix of the issue.
     *
     * @return string
     */
    public function getProposedFix();

    /**
     * Get the priority of the validator.
     *
     * The higher the number, the higher the priority and the earlier the validator
     * is run in the validation-chain.
     *
     * @return int
     */
    public function getPriority();

    /**
     * @return ValidationResultInterface
     */
    public function validate();

    /**
     * Get an integer how severe the rule should count.
     *
     * This should return one of this interfaces constants.
     *
     * @return int
     */
    public function getSeverity();
}