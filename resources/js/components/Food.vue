<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        Food Component
                        <div>
                            <b-button
                                variant="info"
                                @click="modalShow = !modalShow"
                                class="float-right"
                                >Add Food</b-button
                            >
                        </div>
                    </div>

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
                                        <b-form
                                            @submit.prevent="onSubmit()"
                                            @reset="onReset"
                                            v-if="show"
                                        >
                                            <b-form-group
                                                id="input-group-1"
                                                label="Dish Name:"
                                                label-for="input-1"
                                                description="We'll never share your email with anyone else."
                                            >
                                                <b-form-input
                                                    id="input-1"
                                                    v-model="form.food_name"
                                                    type="text"
                                                    required
                                                    placeholder="Enter dish name"
                                                ></b-form-input>
                                            </b-form-group>
                                            <!--
                                            <b-form-group
                                                id="input-group-1"
                                                label="Dish Category:"
                                                label-for="input-2"
                                                description="Enter Dish category."
                                            >
                                                <b-form-input
                                                    id="input-1"
                                                    v-model="form.category_name"
                                                    type="text"
                                                    required
                                                    placeholder="Enter dish category name"
                                                ></b-form-input>
                                            </b-form-group>    -->
                                            <!--test  -->
                                            <b-form-group>
                                                <b-form-select
                                                    v-model="form.category_id"
                                                    class="mb-3"
                                                >
                                                    <b-form-select-option
                                                        value="null"
                                                        >Please select an
                                                        option</b-form-select-option
                                                    >
                                                    <b-form-select-option
                                                        v-for="food_category in food_categories"
                                                        :key="food_category.id"
                                                        :value="
                                                            food_category.id
                                                        "
                                                        >{{
                                                            food_category.category_name
                                                        }}
                                                    </b-form-select-option>
                                                    <!--  <b-form-select-option
                                                        value="b"
                                                        >Meals
                                                    </b-form-select-option>-->
                                                </b-form-select>
                                            </b-form-group>

                                            <!--test -->
                                            <b-form-group
                                                id="input-group-1"
                                                label="description:"
                                                label-for="input-1"
                                                description="brief description."
                                            >
                                                <b-form-input
                                                    id="input-1"
                                                    v-model="form.description"
                                                    type="text"
                                                    required
                                                    placeholder="Write a brief description"
                                                ></b-form-input>
                                            </b-form-group>
                                            <b-form-group
                                                id="input-group-1"
                                                label="Price:"
                                                label-for="input-1"
                                                description="Price."
                                            >
                                                <b-form-input
                                                    id="input-1"
                                                    v-model="form.price"
                                                    type="number"
                                                    required
                                                    placeholder="Enter Price"
                                                ></b-form-input>
                                            </b-form-group>
                                            <b-form-group
                                                id="input-group-1"
                                                label="Quantity:"
                                                label-for="input-1"
                                                description="Quantity."
                                            >
                                                <b-form-input
                                                    id="input-1"
                                                    v-model="form.quantity"
                                                    type="number"
                                                    required
                                                    placeholder="Enter Quantity"
                                                ></b-form-input>
                                            </b-form-group>

                                            <b-button
                                                type="submit"
                                                variant="primary"
                                                class="float-right"
                                                >Submit</b-button
                                            >
                                        </b-form>
                                    </b-modal>
                                </div>
                                <!-- End of Modal -->

                                <!-- new modal -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
//import FoodCategory from "./FoodCategory.vue";
export default {
    props: ["food_categories"],
    data() {
        return {
            food_items: {
                // props: ["title"]
            },
            modalShow: false,
            show: true,

            form: {
                id: "",
                food_name: "",
                category_id: null,
                category_name: "",
                description: "",
                price: null,
                quantity: null
                //checked: []
            }
        };
    },
    methods: {
        /*   createFood() {
            this.form.post("api/food_items");
        },  */
        loadFood() {
            axios
                .get("api/food_items")

                .then(response => (this.food_items = response.data));
        },
        onSubmit() {
            // evt.preventDefault();
            //alert("hahah");
            axios.post("api/food_items", {
                food_name: this.form.food_name,
                category_id: this.form.category_id,
                description: this.form.description,
                price: this.form.price,
                quantity: this.form.quantity
            });
            this.modalShow = false;
        },
        /*createFood(evt) {
            evt.preventDefault();
            alert("awesome");
            console.log("awesome shit");
            // alert(JSON.stringify(this.form));
            //this.form.post("api/food_items");
            // axios.post("api/food_items");
        },*/
        onReset(evt) {
            evt.preventDefault();
            // Reset our form values
            this.form.food_name = "";
            this.form.category_id = "";
            this.form.description = "";
            this.form.price = "";
            this.form.quantity = "";
            //this.form.checked = [];
            // Trick to reset/clear native browser form validation state
            this.show = false;
            this.$nextTick(() => {
                this.show = true;
            });
        }
    },
    created() {
        this.loadFood();
        console.log("Component mounted.");
    }
};
</script>
