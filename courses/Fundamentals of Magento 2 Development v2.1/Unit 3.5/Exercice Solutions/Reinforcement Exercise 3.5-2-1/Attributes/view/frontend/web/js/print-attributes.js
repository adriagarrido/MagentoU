/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
/*jshint browser:true jquery:true*/
define([
    "jquery"
], function($){
    "use strict";

    return function(config, element) {
        var numOfAttributes = $(element).find('tr').length;
        console.log("Number of attributes: " + numOfAttributes);
    }
});