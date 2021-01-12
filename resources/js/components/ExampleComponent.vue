<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div
                                    v-for="example in examples"
                                    :key="example.index"
                                >
                                    <ul>
                                        <li>{{ example }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!--  <div class="row">
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
                                            @click="editModal(food_item)"
                                            >Edit</b-button
                                        >
                                        <b-button
                                            @click="deleteFood(food_item.id)"
                                            href="#"
                                            variant="primary"
                                            >delete</b-button
                                        >
                                    </b-card>
                                </div>
                                 {{ food_item.food_name }}  -->
                        <!--       </div>
                        </div>   -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { bus } from "../app";
//bus.$on('testStuff')
export default {
    // inject: ['mysharedData'],
    data() {
        return {
            examples: []
        };
    },
    methods: {},
    created() {
        bus.$on("foodFetched", data => {
            this.examples = data;
        });
    }
    // created() {}
};
</script>
