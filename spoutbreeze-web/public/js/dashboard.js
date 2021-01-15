require.config({
    shim: {
        'bootstrap': ['jquery'],
        'sparkline': ['jquery'],
        'tablesorter': ['jquery'],
        'vector-map': ['jquery'],
        'vector-map-de': ['vector-map', 'jquery'],
        'vector-map-world': ['vector-map', 'jquery'],
        'core': ['bootstrap', 'jquery'],
    },
    paths: {
        'core': '/js/core',
        'jquery': '/js/vendors/jquery-3.2.1.min',
        'bootstrap': '/js/vendors/bootstrap.bundle.min',
        'sparkline': '/js/vendors/jquery.sparkline.min',
        'selectize': '/js/vendors/selectize.min',
        'tablesorter': '/js/vendors/jquery.tablesorter.min',
        'vector-map': '/js/vendors/jquery-jvectormap-2.0.3.min',
        'vector-map-de': '/js/vendors/jquery-jvectormap-de-merc',
        'vector-map-world': '/js/vendors/jquery-jvectormap-world-mill',
        'circle-progress': '/js/vendors/circle-progress.min',
    }
});
window.tabler = {
    colors: {
        'blue': '#467FCF',
        'blue-darkest': '#0E1929',
        'blue-darker': '#1C3353',
        'blue-dark': '#3866A6',
        'blue-light': '#7EA5DD',
        'blue-lighter': '#C8D9F1',
        'blue-lightest': '#EDF2FA',
        'azure': '#45AAF2',
        'azure-darkest': '#0E2230',
        'azure-darker': '#1C4461',
        'azure-dark': '#3788C2',
        'azure-light': '#7DC4F6',
        'azure-lighter': '#C7E6FB',
        'azure-lightest': '#ECF7FE',
        'indigo': '#6574CD',
        'indigo-darkest': '#141729',
        'indigo-darker': '#282E52',
        'indigo-dark': '#515DA4',
        'indigo-light': '#939EDC',
        'indigo-lighter': '#D1D5F0',
        'indigo-lightest': '#F0F1FA',
        'purple': '#A55EEA',
        'purple-darkest': '#21132F',
        'purple-darker': '#42265E',
        'purple-dark': '#844BBB',
        'purple-light': '#C08EF0',
        'purple-lighter': '#E4CFF9',
        'purple-lightest': '#F6EFFD',
        'pink': '#F66D9B',
        'pink-darkest': '#31161F',
        'pink-darker': '#622C3E',
        'pink-dark': '#C5577C',
        'pink-light': '#F999B9',
        'pink-lighter': '#FCD3E1',
        'pink-lightest': '#FEF0F5',
        'red': '#E74C3C',
        'red-darkest': '#2E0F0C',
        'red-darker': '#5C1E18',
        'red-dark': '#B93D30',
        'red-light': '#EE8277',
        'red-lighter': '#F8C9C5',
        'red-lightest': '#FDEDEC',
        'orange': '#FD9644',
        'orange-darkest': '#331E0E',
        'orange-darker': '#653C1B',
        'orange-dark': '#CA7836',
        'orange-light': '#FEB67C',
        'orange-lighter': '#FEE0C7',
        'orange-lightest': '#FFF5EC',
        'yellow': '#F1C40F',
        'yellow-darkest': '#302703',
        'yellow-darker': '#604E06',
        'yellow-dark': '#C19D0C',
        'yellow-light': '#F5D657',
        'yellow-lighter': '#FBEDB7',
        'yellow-lightest': '#FEF9E7',
        'lime': '#7BD235',
        'lime-darkest': '#192A0B',
        'lime-darker': '#315415',
        'lime-dark': '#62A82A',
        'lime-light': '#A3E072',
        'lime-lighter': '#D7F2C2',
        'lime-lightest': '#F2FBEB',
        'green': '#5EBA00',
        'green-darkest': '#132500',
        'green-darker': '#264A00',
        'green-dark': '#4B9500',
        'green-light': '#8ECF4D',
        'green-lighter': '#CFEAB3',
        'green-lightest': '#EFF8E6',
        'teal': '#2BCBBA',
        'teal-darkest': '#092925',
        'teal-darker': '#11514A',
        'teal-dark': '#22A295',
        'teal-light': '#6BDBCF',
        'teal-lighter': '#BFEFEA',
        'teal-lightest': '#EAFAF8',
        'cyan': '#17A2B8',
        'cyan-darkest': '#052025',
        'cyan-darker': '#09414A',
        'cyan-dark': '#128293',
        'cyan-light': '#5DBECD',
        'cyan-lighter': '#B9E3EA',
        'cyan-lightest': '#E8F6F8',
        'gray': '#868E96',
        'gray-darkest': '#1B1C1E',
        'gray-darker': '#36393C',
        'gray-dark': '#6B7278',
        'gray-light': '#AAB0B6',
        'gray-lighter': '#DBDDE0',
        'gray-lightest': '#F3F4F5',
        'gray-dark': '#343A40',
        'gray-dark-darkest': '#0A0C0D',
        'gray-dark-darker': '#15171A',
        'gray-dark-dark': '#2A2E33',
        'gray-dark-light': '#717579',
        'gray-dark-lighter': '#C2C4C6',
        'gray-dark-lightest': '#EBEBEC'
    }
};
require(['core']);
