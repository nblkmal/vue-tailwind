<template>
    <div class="text-2xl text-gray-700">
        Department Index
        <!-- <router-link to="/employees-create" class="float-right text-xs bg-cyan-900 text-white rounded-md px-7 py-3 uppercase transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-cyan-500 duration-300 ">+ employee</router-link> -->
        <div class="mt-5 grid grid-cols-4 gap-4">
            <div v-for="department in departments" :key="department.id" class="max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img class="rounded-t-lg" src="https://www.cyberjayacity.com/wp-content/uploads/2018/07/tamarind-square-cyberjaya-1280x720.jpg" alt="" />
                </a>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ department.name }}
                        </h5>
                    </a>
                    <p class="mb-3 text-sm text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
                    <a href="#" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Edit<i class="ml-2 fas fa-pen"></i>
                    </a>

                    <button @click.prevent="toggleDeleteModal(department)" class="bg-red-700 text-white p-2 rounded text-sm">Delete</button>

                    
                    
                </div>
            </div>
            <div class="flex items-center bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                <div class="py-5 m-auto text-center">
                    <i class="fas fa-plus"></i>
                    <div class="text-xs">Add new department</div>
                </div>
            </div>
        </div>
        <DeleteModal :department.sync="toDelete" v-if="isVisibility" @toggle-modal="toggleDeleteModal(toDelete)"/>
        
        
        
    </div>
</template>

<script>
import DeleteModal from "../modal/department/DeleteModal"
import AddModal from "../modal/department/AddModal"

export default {
    props: {
        title: {
            type: String,
        }
    },
    components: {
        DeleteModal,
    },
    data()
    {
        return {
            departments: [],
            isVisibility: false,
            toDelete: null,
        }
    },
    created()
    {
        this.getDepartments();
    },
    methods: {
        toggleDeleteModal(department)
        {
            this.toDelete = department
            this.isVisibility = !this.isVisibility
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