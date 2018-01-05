// noinspection JSAnnotator
Vue.component('my-products', {
    template: '#my-products-template',
    data: function() {
        return {items:[]}
    },
    created: function() {
        $.getJSON('/products.json', function(data) {
            this.items = data;
        }.bind(this));
    }
});

new Vue({
    el: '#app'
})