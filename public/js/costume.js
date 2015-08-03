/**
 * Created with JetBrains PhpStorm.
 * User: Jayson Ramos
 * Date: 7/30/15
 * Time: 1:35 PM
 * To change this template use File | Settings | File Templates.
 */
$.noConflict();
!function($){
    $(function(){
         $("li").click(function(){
             $(this).toggleClass('active','item');
         });
    });
}(jQuery);