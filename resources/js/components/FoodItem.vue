<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Food Component</div>

                    <div class="card-body">
                        <div class="foods">
                            <div class="container">
                                <div class="row">
                                    <div
                                        class="col-md-10 col-sm-6"
                                        v-for="food_item in food_items.data"
                                        :key="food_item.id"
                                    >
                                        <div>
                                            <b-card
                                                title="Card Title"
                                                img-src="https://picsum.photos/600/300/?image=25"
                                                img-alt="Image"
                                                img-top
                                                tag="article"
                                                style="max-width: 20rem;"
                                                class="mb-2"
                                            >
                                                <b-card-text>
                                                    quick example to build on
                                                    the card title and make up
                                                    the bulk of the card's
                                                    content.
                                                </b-card-text>

                                                <b-button
                                                    href="#"
                                                    variant="primary"
                                                    >Go somewhere</b-button
                                                >
                                            </b-card>
                                        </div>
                                        <!--  {{ food_item.name }} -->
                                    </div>
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
            food_items: []
            // foods:{!! json_encode($food->food_name) !!}
        };
    },
    methods: {
        loadFood() {
            axios
                .get("./api/food_items")

                .then(response => (this.food_items = response.data));
        }
    },
    created() {
        this.loadFood();
        console.log("Component mounted.");
    }
};
</script>
