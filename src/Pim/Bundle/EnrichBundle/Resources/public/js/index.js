require({
    baseUrl: 'bundles',
    shim: {
        'oro/routes': {
            deps: ['routing'],
            init: function(routing) {
                return routing;
            }
        }
    },
    map: {
        '*': {
            'routing': 'oro/routes'
        },
        'oro/routes': {
            'routing': 'routing'
        }
    },
    paths: {
        'oro/routes': '../js/routes'
    }
});

require(['pim/app'], function (app) {
    app.bootstrap({
        debug: false
    });
});
