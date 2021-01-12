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
                                @click="newModal()"
                                class="float-right"
                                >Add Food</b-button
                            >
                            <b-button
                                variant="success"
                                class="float-right"
                                @click="fetchFoods()"
                                >Test</b-button
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
                                                    @click="
                                                        editModal(food_item)
                                                    "
                                                    >Edit</b-button
                                                >
                                                <b-button
                                                    @click="
                                                        deleteFood(food_item.id)
                                                    "
                                                    href="#"
                                                    variant="primary"
                                                    >delete</b-button
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
                                            @submit.prevent="
                                                editMode
                                                    ? updateFood()
                                                    : createFood()
                                            "
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
                                            <b-form-group
                                                id="input-group-1"
                                                label="Dish Category:"
                                                label-for="input-1"
                                            >
                                                <b-form-select
                                                    v-model="form.category_id"
                                                    :options="foods"
                                                    class="mb-3"
                                                    placeholder="Enter dish name"
                                                >
                                                    <template #first>
                                                        <b-form-select-option
                                                            :value="null"
                                                            disabled
                                                        >
                                                            Please select a
                                                            suitable category
                                                        </b-form-select-option>
                                                    </template>
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
                                            <b-form-group
                                                id="input-group-1"
                                                label="Units :"
                                                label-for="input-1"
                                            >
                                                <b-form-select
                                                    v-model="form.units"
                                                    :options="options"
                                                ></b-form-select>
                                            </b-form-group>
                                            <b-button
                                                type="submit"
                                                v-show="!editMode"
                                                variant="primary"
                                                class="float-right"
                                                >Submit</b-button
                                            >
                                            <b-button
                                                @click="updateFood"
                                                type="submit"
                                                v-show="editMode"
                                                variant="primary"
                                                class="float-right"
                                                >Update</b-button
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
import { bus } from "../app";

export default {
    //provide: { mySharedData: this.mySharedData },
    props: ["food_categories"],
    data() {
        return {
            //mySharedData:{},
            food_items: [],
            cat: "mashakura",
            chakula: ["hlell", "chapo", "mandazi"],
            modalShow: false,
            show: true,
            editMode: false,
            form: {
                id: "",
                food_name: "",
                category_id: null,
                category_name: "",
                description: "",
                price: null,
                quantity: null,
                units: null
                //checked: []
            },
            units: null,
            options: [
                { value: null, text: "Please select an appropriate unit" },
                { value: "pieces", text: "pieces" },
                { value: "servings", text: "servings" },
                { value: "kgs", text: "Kgs" },
                {
                    label: "Weighted Units",
                    options: [
                        { value: "grams", text: "Grams" },
                        { value: "Kilograms", text: "Kilograms" }
                    ]
                }
            ]
        };
    },
    methods: {
        loadFood() {
            axios
                .get("api/food_items")

                .then(response => (this.food_items = response.data));
            // .then(response => (this.mySharedData.food_items = response.data));
        },
        createFood() {
            axios
                .post("api/food_items", {
                    id: this.form.id,
                    food_name: this.form.food_name,
                    category_id: this.form.category_id,

                    description: this.form.description,
                    price: this.form.price,
                    quantity: this.form.quantity,
                    units: this.form.units
                })
                .then(() => {
                    Toast.fire({
                        type: "success",
                        title: "Category created successfully"
                    });
                    this.modalShow = false;
                    Fire.$emit("afterCreate");
                })
                .catch(() => {});
        },
        newModal() {
            this.editMode = false;
            this.modalShow = true;
        },
        editModal(id) {
            this.editMode = true;
            this.modalShow = true;
            this.form = id;
        },
        updateFood() {
            Swal.fire({
                title: "Are you sure you want to update?",

                showCancelButton: true,
                confirmButtonColor: "green",
                cancelButtonColor: "gray",
                confirmButtonText: "Yes, update it!"
            }).then(result => {
                if (result.value) {
                    axios
                        .put("api/food_items/" + this.form.id, {
                            id: this.form.id,
                            food_name: this.form.food_name,
                            category_id: this.form.category_id,

                            description: this.form.description,
                            price: this.form.price,
                            quantity: this.form.quantity,
                            units: this.form.units
                        })
                        .then(() => {
                            Toast.fire({
                                type: "success",
                                title: "Food item  updated"
                            });

                            this.form = "";
                            Fire.$emit("afterCreate");
                        })
                        .catch(() => {
                            Swal.fire(
                                "Failed!",
                                "There was something wrong.",
                                "warning"
                            );
                        });
                }
            });
            this.modalShow = false;
        },
        deleteFood(id) {
            alert("delete");
            this.$swal({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                width: 400,

                showCancelButton: true,
                // confirmButtonColor: "#5bc0de",
                // cancelButtonColor: "#d33",
                confirmButtonText: "Yessir, delete it!"
            }).then(result => {
                if (result.isConfirmed) {
                    axios
                        .delete("api/food_items/" + id)
                        .then(() => {
                            this.$swal(
                                "Deleted!",
                                "Your file has been deleted.",
                                "success"
                            );
                            Fire.$emit("afterCreate");
                        })
                        .catch(() => {
                            Swal.fire(
                                "Failed!",
                                "There was something wronge.",
                                "warning"
                            );
                        });
                }
            });
        },
        onReset(evt) {
            evt.preventDefault();
            // Reset our form values
            this.form.id = null;
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
        },
        fetchFoods() {}
    },

    created() {
        this.loadFood();
        Fire.$on("afterCreate", () => {
            this.loadFood();
        });

        bus.$emit("foodFetched", this.food_items);
        // this.fetchFoods();

        // bus.$emit("testStuff", this.food_items);
    },
    computed: {
        foods() {
            return this.food_categories.map(x => ({
                value: x.id,
                text: x.category_name
            }));
        }
    }
};
</script>
