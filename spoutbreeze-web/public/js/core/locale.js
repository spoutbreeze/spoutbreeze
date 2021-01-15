/**
 * Created by RIADVICE SUARL
 * Copyright 2020 | RIADVICE SUARL ( c )
 * All rights reserved. You may not use, distribute or modify
 * this code under its source or binary form without the express
 * authorization of RIADVICE SUARL. Contact : devops@riadvice.tn
 */

var Locale = function () {
    var loadLocale = function () {
        var defaultLocale = 'en-GB';

        $.ajax({
            url: '/locale/json/' + (Locale.currentLocale || defaultLocale) + '.json',
            type: 'GET',
            dataType: 'json',
            async: false,
            success: function (result) {
                Locale.map = result;
                Locale.initialized = true;
            },
            error: function (jqXHR, textStatus, errorThrown) {
                throw 'Regenerate your locale-files.';
            }
        });
    };

    return {
        //main function to initiate the module
        init: function () {
            loadLocale();
            Locale.initLanguageMenu();
        },

        initLanguageMenu: function () {
            $('#language ul li a').click(function (event) {
                if ($(this).data('locale') == Locale.currentLocale) {
                    // Do not continue if the current locale is the same as the selected one
                    return;
                }
                for (var i = 1; i <= 9; i++) {
                    $('.sk-cube-grid').append('<div class="sk-cube sk-cube' + i + '"></div>');
                }
                event.preventDefault();
                var locale = $(this).data('locale');

                $.ajax({
                    url: locale,
                    type: 'PUT',
                    dataType: 'json',
                    async: true,
                    success: function (result) {
                        Locale.currentLocale = locale;
                        Locale.switchLocale(locale);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        throw 'Regenerate your locale-files.';
                    }
                });
            });
        },

        // used to sel locale from session
        setLocale: function (locale) {
            Locale.currentLocale = locale;
        },

        switchLocale: function (locale) {
            loadLocale();
            Locale.translaterStrings();
            $('.sk-cube-grid').empty();
        },

        translaterStrings: function () {
            // Set the current language in the menu
            $('#current-language').contents().filter(function () {
                return this.nodeType == 3 && $.trim(this.textContent).length > 0;
            }).replaceWith('&nbsp;' + Locale.lst('locales', Locale.currentLocale));

            // Replace all strings
            $(":attr('^data-i18n')").each(function () {
                    var tag = $(this);
                    $.each(tag.data(), function (name, value) {
                        // We process only data starting with lang
                        if (name.match(/^i18n(?!args)/i)) {
                            var params = value.split('.');
                            var translation = Locale[params[0]](params[1], params[2]);
                            if (tag.data('i18nArgs') !== undefined) {
                                translation = translation.replace(/{(\d)}/g, function (match, number) {
                                    return tag.data('i18nArgs')[number];
                                });
                            }
                            if (name.toLowerCase().match(/html$/)) {
                                var contents = tag.contents();
                                if (contents.length == 1) {
                                    tag.html(translation);
                                }
                                else {
                                    tag.contents().filter(function () {
                                        return this.nodeType == 3 && $.trim(this.textContent).length > 0;
                                    }).replaceWith(translation);
                                }
                            }
                            else {
                                var attrName = name.split("i18n").pop();
                                // Handles the case of tooltips
                                if (tag.attr(attrName.toLowerCase()) == '' && tag.attr('data-original-' + attrName.toLowerCase()) != '') {
                                    tag.attr('data-original-' + attrName, translation);
                                    return;
                                }
                                else if (attrName.toLowerCase() !== attrName) {
                                    attrName = attrName.replace(/[A-Z]/g, function (match, position) {
                                        return position == 0 ? match.toLowerCase() : "-" + match.toLowerCase()
                                    });
                                }
                                tag.attr(attrName, translation);
                            }
                        }
                    });
                }
            );
        },

        // get an item from the locale
        get: function (type, module, key) {
            // initialize if needed
            if (!Locale.initialized) Locale.init();

            // validate
            if (typeof Locale.map[type][module][key] == 'undefined') return '{$' + type + module + key + '}';

            return Locale.map[type][module][key];
        },

        // get an error
        err: function (module, key) {
            return Locale.get('error', module, key);
        },

        // get a label
        lbl: function (module, key) {
            return Locale.get('label', module, key);
        },

        // get localization
        loc: function (module, key) {
            return Locale.get('locale', module, key);
        },

        // get a message
        msg: function (module, key) {
            return Locale.get('message', module, key);
        },

        // get a list item
        lst: function (module, key) {
            return Locale.get('list', module, key);
        }
    }
}
();
