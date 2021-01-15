/**
 * Created by RIADVICE SUARL
 * Copyright 2020 | RIADVICE SUARL ( c )
 * All rights reserved. You may not use, distribute or modify
 * this code under its source or binary form without the express
 * authorization of RIADVICE SUARL. Contact : devops@riadvice.tn
 */

let Plugins = function () {

    let initNoty = function () {
        $.noty.defaults.theme = 'defaultTheme';
        $.noty.defaults.timeout = 3000;
        $.noty.defaults.layout = 'topCenter';
    };

    let initPopover = function () {
        $("[data-toggle=popover]").popover();
    };

    return {
        //main function to initiate the module
        init: function () {
            initNoty();
            initPopover();
        }
    }
}();
