<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Test Component</div>

                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div
                                    class="col-4"
                                    v-for="user in users"
                                    :key="user.id"
                                >
                                    {{ user.id }} {{ user.name }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            users: []
        };
    },
    methods: {
        loadUsers() {
            axios
                .get("api/user")
                .then(response => (this.users = response.data));
        }
    },
    created() {
        // axios.get("api/user").then(response => (this.users = data.data));
        this.loadUsers();
        console.log("Component mounted.");
    }
};
</script>
