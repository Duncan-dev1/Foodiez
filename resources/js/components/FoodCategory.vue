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
                                @click="newModal"
                                class="float-right"
                                >Create Category</b-button
                            >
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="foodcategories">
                            <div class="container">
                                <table class="table table-hover">
                                    <tbody>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                        </tr>

                                        <tr
                                            v-for="food_category in food_categories"
                                            :key="food_category.id"
                                        >
                                            <td>{{ food_category.id }}</td>
                                            <td>
                                                {{
                                                    food_category.category_name
                                                }}
                                            </td>
                                            <td>
                                                <a
                                                    href="#"
                                                    @click="
                                                        editModal(food_category)
                                                    "
                                                >
                                                    <i
                                                        class="fa fa-edit mr-2 blue"
                                                    ></i>
                                                </a>
                                                <a
                                                    href="#"
                                                    @click="
                                                        deleteCategory(
                                                            food_category.id
                                                        )
                                                    "
                                                >
                                                    <i
                                                        class="fa fa-trash red"
                                                    ></i>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div>
                            <b-modal v-model="modalShow">
                                <b-form
                                    @submit.prevent="
                                        editMode
                                            ? updateCategory()
                                            : createCategory()
                                    "
                                    @reset="onReset()"
                                    v-if="show"
                                >
                                    <b-form-group
                                        id="input-group-1"
                                        label="Category Name:"
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
                                        v-show="!editMode"
                                        variant="success"
                                        class="float-right"
                                        >Submit</b-button
                                    >
                                    <b-button
                                        type="submit"
                                        v-show="editMode"
                                        variant="primary"
                                        class="float-right"
                                        >Update</b-button
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
import Food from "./Food.vue";
export default {
    components: {
        Food
    },
    data() {
        return {
            food_categories: [],
            modalShow: false,
            show: true,
            editMode: false,
            form: {
                id: "",
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
        createCategory() {
            axios
                .post("api/food_categories", {
                    id: this.form.id,
                    category_name: this.form.category_name
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
            this.modalShow = true;
            this.editMode = true;
            this.form = id;
        },
        updateCategory() {
            this.$swal({
                title: "Are you sure you want to update?",
                width: 400,
                showCancelButton: true,
                confirmButtonText: "Yessir, update it!"
            }).then(result => {
                if (result.value) {
                    axios
                        .put("api/food_categories/" + this.form.id, {
                            id: this.form.id,
                            category_name: this.form.category_name
                        })
                        .then(() => {
                            this.$swal(
                                "Updated!",
                                "User info has been Updated.",
                                "success"
                            );
                            Fire.$emit("afterCreate");
                            this.form = "";
                        })
                        .catch(() => {
                            this.$swal(
                                "Failed!",
                                "There was something wrong.",
                                "warning"
                            );
                        });
                }
            });
            this.modalShow = false;
        },
        deleteCategory(id) {
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
                        .delete("api/food_categories/" + id)
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
            this.form.category_name = "";
            this.show = false;
        }
    },
    created() {
        this.fetchCategories();
        Fire.$on("afterCreate", () => {
            this.fetchCategories();
        });
    }
};
</script>
