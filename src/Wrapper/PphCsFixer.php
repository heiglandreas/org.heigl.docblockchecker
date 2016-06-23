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

namespace Org_Heigl\DocBlockChecker\Wrapper;

use Org_Heigl\DocBlockChecker\Validator\ValidatorInterface;
use Symfony\CS\FixerInterface;

class PphCsFixer implements FixerInterface
{
    protected $validator;

    public function __construct(ValidatorInterface $validator)
    {
        $this->validator = $validator;
    }

    /**
     * Fixes a file.
     *
     * @param \SplFileInfo $file    A \SplFileInfo instance
     * @param string       $content The file content
     *
     * @return string The fixed file content
     */
    public function fix(\SplFileInfo $file, $content)
    {

        return $this->validator->proposedFix();
    }

    /**
     * Returns the description of the fixer.
     * A short one-line description of what the fixer does.
     *
     * @return string The description of the fixer
     */
    public function getDescription()
    {
        return $this->validator->getDescription();
    }

    /**
     * Returns the level of CS standard.
     * Can be one of:
     *  - self::PSR0_LEVEL,
     *  - self::PSR1_LEVEL,
     *  - self::PSR2_LEVEL,
     *  - self::SYMFONY_LEVEL,
     *  - self::CONTRIB_LEVEL.
     */
    public function getLevel()
    {
        return FixerInterface::CONTRIB_LEVEL;
    }

    /**
     * Returns the name of the fixer.
     * The name must be all lowercase and without any spaces.
     *
     * @return string The name of the fixer
     */
    public function getName()
    {
        return $this->validator->getName();
    }

    /**
     * Returns the priority of the fixer.
     * The default priority is 0 and higher priorities are executed first.
     *
     * @return int
     */
    public function getPriority()
    {
        return $this->validator->getPriority();
    }

    /**
     * Returns true if the file is supported by this fixer.
     *
     * @return bool true if the file is supported by this fixer, false otherwise
     */
    public function supports(\SplFileInfo $file)
    {
        $supportedExtensions = ['php'];

        return in_array($file->getExtension(), $supportedExtensions);
    }
}