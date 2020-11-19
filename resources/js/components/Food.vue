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
                                        class="col-md-4 "
                                        v-for="food_item in food_items"
                                        :key="food_item.id"
                                    >
                                        <div>
                                            <b-card
                                                :title="food_item.food_name"
                                                img-src="https://picsum.photos/600/300/?image=25"
                                                img-alt="Image"
                                                img-top
                                                tag="article"
                                                style="max-width: 20rem;"
                                                class="mb-2"
                                                h-100
                                            >
                                                <b-card-text>
                                                    {{
                                                        food_item.description
                                                    }}</b-card-text
                                                >

                                                <b-button
                                                    href="#"
                                                    variant="info"
                                                    >Order</b-button
                                                >
                                                <b-button
                                                    right
                                                    href="#"
                                                    variant="primary"
                                                    @click="
                                                        modalShow = !modalShow
                                                    "
                                                    >View</b-button
                                                >
                                            </b-card>
                                        </div>
                                        <!--  {{ food_item.food_name }}  -->
                                    </div>
                                </div>
                                <!-- MODAL -->
                                <div>
                                    <b-modal v-model="modalShow">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-6"></div>
                                            </div>
                                        </div>
                                    </b-modal>
                                </div>
                                <!-- End of Modal -->
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
            food_items: {
                props: ["title"]
            },
            modalShow: false
            // foods:{!! json_encode($food->food_name) !!}
        };
    },
    methods: {
        loadFood() {
            axios
                .get("api/food_items")

                .then(response => (this.food_items = response.data));
        }
    },
    created() {
        this.loadFood();
        console.log("Component mounted.");
    }
};
</script>
