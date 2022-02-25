<template>
    <div class="text-2xl text-gray-700">
        Department Index
        <div class="mt-5 grid grid-cols-4 gap-4">
            <div v-for="department in departments" :key="department.id" class="max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img v-if="department.image" class="rounded-t-lg" :src="'../storage/department/'+ department.image" alt="" />
                    <img v-else class="rounded-t-lg" src="https://happygokl.com/wp-content/uploads/Tamarind-square-4.jpg" alt="" />
                </a>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ department.name }}
                        </h5>
                    </a>
                    <p class="mb-3 text-sm text-gray-700 dark:text-gray-400">
                        {{ department.description }}
                    </p>
                    <div v-if="department.employees.length != 0">
                        <span v-for="employee in department.employees" :key="employee.id" class="my-2 bg-gray-100 text-gray-800 text-xs font-normal mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">
                            {{ employee.full_name }}
                        </span>
                    </div>
                    
                    <button @click.prevent="toggleEditModal(department)" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Edit<i class="ml-2 fas fa-pen"></i>
                    </button>

                    <button @click.prevent="toggleDeleteModal(department)" class="bg-red-700 text-white p-2 rounded-lg text-sm">Delete</button>

                </div>
            </div>
            <div class="flex items-center bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                <div class="py-5 m-auto text-center" type="button" @click.prevent="toggleAddModal()">
                    <i class="fas fa-plus hover:bg-gray-200 hover:text-gray-900 rounded-lg p-1.5"></i>
                    <div class="text-xs">Add new department</div>
                </div>
            </div>
        </div>
        <EditModal :department.sync="toEdit" v-if="isEditVisibility" @toggle-modal="toggleEditModal()"/>
        <AddModal v-if="isAddVisibility" @toggle-modal="toggleAddModal()"/>
        <DeleteModal :department.sync="toDelete" v-if="isVisibility" @toggle-modal="toggleDeleteModal(toDelete)"/>

        
    </div>
</template>

<script>
import DeleteModal from "../modal/department/DeleteModal"
import AddModal from "../modal/department/AddModal"
import EditModal from "../modal/department/EditModal"

export default {
    components: {
        DeleteModal,
        AddModal,
        EditModal,
    },
    data()
    {
        return {
            departments: [],
            isVisibility: false,
            isAddVisibility: false,
            isEditVisibility: false,
            toDelete: null,
            toEdit: null,
        }
    },
    created()
    {
        this.getDepartments();
    },
    methods: {
        toggleEditModal(department)
        {
            console.log(department)
            this.toEdit = department
            this.isEditVisibility = !this.isEditVisibility
            this.getDepartments()
        },
        toggleAddModal()
        {
            this.isAddVisibility = !this.isAddVisibility
            this.getDepartments()
        },
        toggleDeleteModal(department)
        {
            this.toDelete = department
            this.isVisibility = !this.isVisibility
            this.getDepartments();
        },
        getDepartments()
        {
            axios.get(this.route('department:index'))
            .then((res) => {
                this.departments = res.data.data
                console.log(this.departments)
            })
            .catch((err) => {
                console.log(err)
            });
        }
    }
}
</script>