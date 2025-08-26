<template>
    <div>
        <!-- Фильтры -->
        <div class="d-flex gap-2 mb-3">
            <select v-model="selectedServer" class="form-select w-auto">
                <option value="">Все серверы</option>
                <option v-for="server in serverList" :key="server.id" :value="server.id">
                    {{ server.name }}
                </option>
            </select>

            <select v-model="selectedFaction" class="form-select w-auto">
                <option value="">Все фракции</option>
                <option v-for="faction in factionList" :key="faction.id" :value="faction.id">
                    {{ faction.faction_name }}
                </option>
            </select>
        </div>

        <!-- Таблица -->
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Сервер</th>
                <th>Фракция</th>
                <th>Продавец</th>
                <th>Цена / 1000</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="gold in filteredGolds" :key="gold.id">
                <td>{{ gold.server.name }}</td>
                <td>{{ gold.faction.faction_name }}</td>
                <td>{{ gold.seller.name }}</td>
                <td>{{ gold.price }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    name: 'GoldTable',
    props: {
        golds: String,
        servers: String,
        factions: String,

    },
    data() {
        return {
            selectedServer: '',
            selectedFaction: '',
        };
    },
    created() {
        const urlParams = new URLSearchParams(window.location.search);
        this.selectedServer = urlParams.get('server') || '';
        this.selectedFaction = urlParams.get('faction') || '';
    },
    watch: {
        selectedServer(newVal) {
            this.updateQueryParam('server', newVal);
        },
        selectedFaction(newVal) {
            this.updateQueryParam('faction', newVal);
        }
    },
    methods: {
        updateQueryParam(key, value) {
            const url = new URL(window.location);
            if (value) {
                url.searchParams.set(key, value);
            } else {
                url.searchParams.delete(key);
            }
            url.searchParams.delete('page');

            window.history.replaceState({}, '', url);
        }
    },
    computed: {
        parsedGolds() {
            const parsed = JSON.parse(this.golds);
            return Array.isArray(parsed.data) ? parsed.data : [];
        },
        serverList() {
            return JSON.parse(this.servers);
        },
        factionList() {
            return JSON.parse(this.factions);
        },
        filteredGolds() {
            return this.parsedGolds.filter((gold) => {
                const matchServer = !this.selectedServer || gold.server.id == this.selectedServer;
                const matchFaction = !this.selectedFaction || gold.faction.id == this.selectedFaction;
                return matchServer && matchFaction;
            });
        },
    },
};
</script>
