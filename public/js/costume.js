/**
 * Created with JetBrains PhpStorm.
 * User: Icot-P
 * Date: 8/6/15
 * Time: 12:11 PM
 * To change this template use File | Settings | File Templates.
 */
function escapeHtml(text) {
    var map = {
        '&': '&amp;',
        '<': '&lt;',
        '>': '&gt;',
        '"': '&quot;',
        "'": '&#039;'
    };

    return text.replace(/[&<>"']/g, function(m) { return map[m]; });
}