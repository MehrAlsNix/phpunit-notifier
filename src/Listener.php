<?php
/**
 * PHPUnit Notifier
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 *
 * @copyright 2015 MehrAlsNix (http://www.mehralsnix.de)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 * @link      https://github.com/MehrAlsNix/phpunit-notifier
 */

namespace MehrAlsNix\PhpUnit\Notifier;

use Exception;
use MehrAlsNix\Notifier\Exception as NotifierException;
use MehrAlsNix\Notifier\Notify;
use PHPUnit_Framework_AssertionFailedError as AssertionFailedError;
use PHPUnit_Framework_BaseTestListener as BaseTestListener;
use PHPUnit_Framework_Test as Test;

/**
 * Notification Listener.
 */
class Listener extends BaseTestListener
{
    /**
     * An error occurred.
     *
     * @param Test $test
     * @param Exception $e
     * @param float $time
     *
     * @return bool
     */
    public function addError(Test $test, Exception $e, $time)
    {
        try {
            Notify::getInstance()
                ->setTitle('Error')
                ->setMessage($e->getMessage())
                ->send();
        } catch (NotifierException $e) {
            return false;
        }

        return true;
    }

    /**
     * A failure occurred.
     *
     * @param Test $test
     * @param AssertionFailedError $e
     * @param float $time
     *
     * @return bool
     */
    public function addFailure(Test $test, AssertionFailedError $e, $time)
    {
        try {
            Notify::getInstance()
                ->setTitle('Failure')
                ->setMessage($e->getMessage())
                ->send();
        } catch (NotifierException $e) {
            return false;
        }

        return true;
    }

    /**
     * Incomplete test.
     *
     * @param Test $test
     * @param Exception $e
     * @param float $time
     *
     * @return bool
     */
    public function addIncompleteTest(Test $test, Exception $e, $time)
    {
        try {
            Notify::getInstance()
                ->setTitle('Incomplete Test')
                ->setMessage($e->getMessage())
                ->send();
        } catch (NotifierException $e) {
            return false;
        }

        return true;
    }

    /**
     * Risky test.
     *
     * @param Test $test
     * @param Exception $e
     * @param float $time
     *
     * @return bool
     */
    public function addRiskyTest(Test $test, Exception $e, $time)
    {
        try {
            Notify::getInstance()
                ->setTitle('Risky Test')
                ->setMessage($e->getMessage())
                ->send();
        } catch (NotifierException $e) {
            return false;
        }

        return true;
    }

    /**
     * Skipped test.
     *
     * @param Test $test
     * @param Exception $e
     * @param float $time
     *
     * @return bool
     */
    public function addSkippedTest(Test $test, Exception $e, $time)
    {
        try {
            Notify::getInstance()
                ->setTitle('Skipped Test')
                ->setMessage($e->getMessage())
                ->send();
        } catch (NotifierException $e) {
            return false;
        }

        return true;
    }
}
