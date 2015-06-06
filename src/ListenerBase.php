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
use PHPUnit_Framework_AssertionFailedError as AssertionFailedError;
use PHPUnit_Framework_BaseTestListener as BaseTestListener;
use PHPUnit_Framework_Test as Test;

/**
 * Notification Listener.
 */
abstract class ListenerBase extends BaseTestListener
{
    /**
     * An error occurred.
     *
     * @param Test $test
     * @param Exception $e
     * @param float $time
     */
    public function addError(Test $test, Exception $e, $time)
    {
        $this->notify('Error', $e->getMessage());
    }

    /**
     * A failure occurred.
     *
     * @param Test $test
     * @param AssertionFailedError $e
     * @param float $time
     */
    public function addFailure(Test $test, AssertionFailedError $e, $time)
    {
        $this->notify('Failure', $e->getMessage());
    }

    /**
     * Incomplete test.
     *
     * @param Test $test
     * @param Exception $e
     * @param float $time
     */
    public function addIncompleteTest(Test $test, Exception $e, $time)
    {
        $this->notify('Incomplete Test', $e->getMessage());
    }

    /**
     * Risky test.
     *
     * @param Test $test
     * @param Exception $e
     * @param float $time
     * @since Method available since Release 4.0.0
     */
    public function addRiskyTest(Test $test, Exception $e, $time)
    {
        $this->notify('Risky Test', $e->getMessage());
    }

    /**
     * Skipped test.
     *
     * @param Test $test
     * @param Exception $e
     * @param float $time
     * @since Method available since Release 3.0.0
     */
    public function addSkippedTest(Test $test, Exception $e, $time)
    {
        $this->notify('Skipped Test', $e->getMessage());
    }

    /**
     * @param string $title
     * @param string $message
     * @return mixed
     */
    abstract public function notify($title, $message);
}

