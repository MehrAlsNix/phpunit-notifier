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

namespace MehrAlsNix\PhpUnit\Notifier\Tests;

use MehrAlsNix\PhpUnit\Notifier\Listener;
use PHPUnit_Framework_TestCase as TestCase;

/**
 * Class ListenerBaseTest
 * @package MehrAlsNix\PhpUnit\Notifier\Tests
 */
class ListenerTest extends TestCase
{
    /**
     * @dataProvider getExceptionAsserted
     */
    public function testNotifyIsCalledBy($method)
    {
        $listener = new Listener();
        $this->assertTrue(
            $listener->{$method}(
                $this->getMockObjectGenerator()->getMock('\PHPUnit_Framework_Test'),
                new \Exception('test'),
                time()
            )
        );
    }

    public function testNotifyIsCalledByFailure()
    {
        $listener = new Listener();
        $this->assertTrue(
            $listener->addFailure(
                $this->getMockObjectGenerator()->getMock('\PHPUnit_Framework_Test'),
                new \PHPUnit_Framework_AssertionFailedError('test'),
                time()
            )
        );
    }

    /**
     * @return array
     */
    public function getExceptionAsserted()
    {
        return [
            ['addError'],
            ['addRiskyTest'],
            ['addIncompleteTest'],
            ['addSkippedTest']
        ];
    }
}
