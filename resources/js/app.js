import './bootstrap';
import { createApp } from 'vue';
import OfferList from './components/OfferList.vue';

const app = createApp({});
app.component('offer-list', OfferList);
app.mount('#app');
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.clickable-row').forEach(function(row) {
        row.addEventListener('click', function() {
            window.location = this.dataset.href;
        });
    });
});
