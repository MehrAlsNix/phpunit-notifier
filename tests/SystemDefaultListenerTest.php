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

use MehrAlsNix\Assumptions\AssumptionViolatedException;
use MehrAlsNix\PhpUnit\Notifier\LinuxDefaultListener;
use MehrAlsNix\PhpUnit\Notifier\WindowsDefaultListener;
use PHPUnit_Framework_AssertionFailedError as AssertionFailedError;
use PHPUnit_Framework_TestCase as TestCase;

/**
 * Class ListenerBaseTest
 * @package MehrAlsNix\PhpUnit\Notifier\Tests
 */
class SystemDefaultListenerTest extends TestCase
{
    private $listener;

    protected function setUp()
    {
        try {
            assumeOperatingSystem('linux');
            $this->listener = new LinuxDefaultListener();
        } catch (AssumptionViolatedException $ave) {
            assumeOperatingSystem('win');
            $this->listener = new WindowsDefaultListener();
        }

        if (!$this->listener->isAvailable()) {
            $this->markTestSkipped('No message command available.');
        }
    }

    /**
     * @test
     */
    public function notification()
    {
        $mockTest = $this->getMockObjectGenerator()
            ->getMock('PHPUnit_Framework_Test');
        $this->assertNull($this->listener->addRiskyTest($mockTest, new \Exception('Risky Test'), time()));
    }
}
