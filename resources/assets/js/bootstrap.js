window._ = require('lodash');

window.$ = window.jQuery = require('jquery');
require('foundation-sites');

window.Vue = require('vue');

Vue.http.interceptors.push((request, next) => {
    request.headers.set('X-CSRF-TOKEN', Laravel.csrfToken);

    next();
});
