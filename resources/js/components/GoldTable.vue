<template>
    <div>
        <div class="d-flex flex-wrap align-items-center gap-2">
            <select v-model="selectedServer" class="form-select w-auto">
                <option value="">All Servers</option>
                <option v-for="server in servers" :key="server.id" :value="server.id">
                    {{ server.name }}
                </option>
            </select>

            <select v-model="selectedFaction" class="form-select w-auto">
                <option value="">All Factions</option>
                <option v-for="faction in factions" :key="faction.id" :value="faction.id">
                    {{ faction.faction_name }}
                </option>
            </select>
        </div>

        <table class="table table-hover mt-3">
            <thead>
            <tr>
                <th>Server</th>
                <th>Faction</th>
                <th>Seller</th>
                <th>Price/1000</th>
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
    props: {
        golds: Array,
        servers: Array,
        factions: Array,
    },
    data() {
        return {
            selectedServer: '',
            selectedFaction: '',
        };
    },
    computed: {
        filteredGolds() {
            return this.golds.filter((gold) => {
                const serverMatch =
                    !this.selectedServer || gold.server.id == this.selectedServer;
                const factionMatch =
                    !this.selectedFaction || gold.faction.id == this.selectedFaction;
                return serverMatch && factionMatch;
            });
        },
    },
};
</script>
