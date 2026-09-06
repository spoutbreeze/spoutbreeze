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
            $('.language-switch').on('click', function (event) {
                var locale = $(this).data('locale');
                var href = $(this).attr('href');

                if (locale === Locale.currentLocale) {
                    event.preventDefault();
                    return;
                }

                // Update the session locale via AJAX, then navigate.
                // If AJAX fails, still navigate to the real href.
                event.preventDefault();
                $.ajax({
                    url: '/set-locale/' + locale,
                    type: 'PUT',
                    dataType: 'json',
                    async: true,
                    success: function (result) {
                        window.location.href = result.redirect || href;
                    },
                    error: function () {
                        window.location.href = href;
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
            Locale.translateStrings();
            $('.sk-cube-grid').empty();
        },

        translateStrings: function () {
            // Set the current language in the menu
            $('.current-language-label').text(Locale.lst('locales', Locale.currentLocale));

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
                                } else {
                                    tag.contents().filter(function () {
                                        return this.nodeType == 3 && $.trim(this.textContent).length > 0;
                                    }).replaceWith(translation);
                                }
                            } else {
                                var attrName = name.split("i18n").pop();
                                // Handles the case of tooltips
                                if (tag.attr(attrName.toLowerCase()) == '' && tag.attr('data-original-' + attrName.toLowerCase()) != '') {
                                    tag.attr('data-original-' + attrName, translation);
                                    return;
                                } else if (attrName.toLowerCase() !== attrName) {
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
        get: function (type, path, key) {
            // initialize if needed
            if (!Locale.initialized) Locale.init();

            // support nested keys such as features.routing.title
            var fullPath = key ? (path + '.' + key) : path;
            var keys = fullPath.split('.');
            var value = Locale.map[type];

            for (var i = 0; i < keys.length; i++) {
                if (value && typeof value === 'object' && keys[i] in value) {
                    value = value[keys[i]];
                } else {
                    return '{$' + type + '.' + fullPath + '}';
                }
            }

            return value;
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
