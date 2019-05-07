require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue'
import axios from 'axios';
//Vue.component('widget', require('./components/widget.vue').default);

var widget = new Vue({
    el: '#widget',
    data() {
        return {
            phoneNumber: '',
            user_id: userId
        }
    },
    methods: {
        sendNumber() {

            let self = this;

            axios.post('/home/sendNumber', {phone: self.phoneNumber, user_id: this.user_id})
                .then(function (response) {
                    console.log(response);
                })
                .catch(function (error) {
                    console.log(error);
                });
        }
    }

});