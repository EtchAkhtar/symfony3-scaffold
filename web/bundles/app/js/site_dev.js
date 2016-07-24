/*
 * Author: Etch Akhtar
 * Version: 1.0
 * Created Date:
 * Copyright (c) Etch Akhtar
 *
 * This file contains JavaScript functions used for development
 */


$(document).ready(function() {

    $(document).ajaxComplete(function(event, XMLHttpRequest){
        if (XMLHttpRequest.getResponseHeader('x-debug-token')) {
            $('.sf-toolbarreset').remove();
            $.get(window.location.protocol+'//'+window.location.hostname+':'+window.location.port+'/app_dev.php/_wdt/'+XMLHttpRequest.getResponseHeader('x-debug-token'),
            	function(data){
            		$('body').append(data);
        		});
        }
    });
});
