import './bootstrap';
import { createApp } from 'vue';
import GoldTable from "./components/GoldTable.vue";

const app = createApp({});
app.component('gold-table', GoldTable);
app.mount('#app');


document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.clickable-row').forEach(function(row) {
        row.addEventListener('click', function() {
            window.location = this.dataset.href;
        });
    });
});
