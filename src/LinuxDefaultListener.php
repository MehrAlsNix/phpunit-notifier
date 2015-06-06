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

class LinuxDefaultListener extends NotificationListenerBase
{
    /**
     * @param string $title
     * @param string $message
     * @return null
     */
    public function notify($title, $message)
    {
        $this->execute("notify-send -t 2000 '{$title}' '$message'");
    }

    /**
     * @return bool
     */
    public function isAvailable()
    {
        return $this->execute('which notify-send');
    }
}
