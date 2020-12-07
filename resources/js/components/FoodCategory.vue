<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Example Component
                        <div>
                            <b-button
                                variant="info"
                                @click="modalShow = !modalShow"
                                class="float-right"
                                >Create Category</b-button
                            >
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="foodcategories">
                            <div class="container">
                                <div class="row">
                                    <div
                                        class="col-md-4 "
                                        v-for="food_category in food_categories"
                                        :key="food_category.id"
                                    >
                                        {{ food_category.category_name }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <b-modal v-model="modalShow">
                                <b-form
                                    @submit.prevent="onSubmit()"
                                    @reset="onReset()"
                                    v-if="show"
                                >
                                    <b-form-group
                                        id="input-group-1"
                                        label="Quantity:"
                                        label-for="input-1"
                                        description="Category Name."
                                    >
                                        <b-form-input
                                            id="input-1"
                                            v-model="form.category_name"
                                            type="text"
                                            required
                                            placeholder="Enter Category Name"
                                        ></b-form-input>
                                    </b-form-group>

                                    <b-button
                                        type="submit"
                                        variant="primary"
                                        class="float-right"
                                        >Submit</b-button
                                    >
                                    <b-button
                                        type="reset"
                                        variant="primary"
                                        class="float-right"
                                        >Reset</b-button
                                    >
                                </b-form>
                            </b-modal>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <food :food_categories="food_categories" />
    </div>
</template>

<script>
//import Food from "./Food.vue";
export default {
    data() {
        return {
            food_categories: {},
            modalShow: false,
            show: true,
            form: {
                category_name: ""
            }
        };
    },
    methods: {
        fetchCategories() {
            axios
                .get("api/food_categories")
                .then(response => (this.food_categories = response.data));
        },
        onSubmit() {
            // evt.preventDefault();
            //alert("hahah");
            axios
                .post("api/food_categories", {
                    category_name: this.form.category_name
                })
                .then((this.modalShow = false))
                .catch(() => {});
            this.modalShow = false;
        },
        onReset(evt) {
            evt.preventDefault();

            this.form.category_name = "";
            //this.form.checked = [];
            // Trick to reset/clear native browser form validation state
            this.show = false;
            this.$nextTick(() => {
                this.show = true;
            });
        }
    },
    created() {
        this.fetchCategories();
        console.log("Component mounted.");
    }
};
</script>
