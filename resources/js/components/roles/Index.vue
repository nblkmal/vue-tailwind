<template>
    <div class="grid grid-cols-4">
        <div>
            <div class="w-48 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                <button aria-current="true" type="button" class="py-2 px-4 w-full text-left text-white bg-blue-700 rounded-t-lg border-b border-gray-200 cursor-pointer focus:outline-none dark:bg-gray-800 dark:border-gray-600">
                    Roles
                </button>
                <button type="button" class="py-2 px-4 w-full text-left border-b border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
                    Permissions
                </button>
            </div>
        </div>
        <div class="col-span-3 text-2xl text-gray-700">
            Roles Index
            
            <button @click.prevent="toggleAddModal()" class="float-right text-xs bg-cyan-900 text-white rounded-md px-7 py-3 uppercase transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-cyan-500 duration-300">+ role</button>
            <!-- <div class="my-5" v-for="(employee, key) in employees" :key="employee.id">
                <div class="text-sm">{{ key }} - {{ employee.first_name }}, {{ employee.last_name }}</div>
            </div> -->
            <div class="mt-5 flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden shadow-md sm:rounded-lg">
                            <table class="min-w-full">
                                <thead class="bg-gray-50 dark:bg-gray-700">
                                    <tr>
                                        <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                            No.
                                        </th>
                                        <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-center text-gray-700 uppercase dark:text-gray-400">
                                            Role
                                        </th>
                                        <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-center text-gray-700 uppercase dark:text-gray-400">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody v-if="roles.length == 0">
                                    <tr class="w-full text-center text-sm bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        No data
                                    </tr>
                                </tbody>
                                <tbody v-else>
                                    <tr v-for="(role, key) in roles" :key="role.id" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ key+1 }}.
                                        </td>
                                        <td class="capitalize text-center py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ role.name }}
                                        </td>
                                        <td class="text-xs py-1.5 mx-5 font-medium text-center whitespace-nowrap">
                                            
                                            <button class="mx-2 text-xs text-red-700 border border-red-700 hover:bg-red-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg px-3 py-1.5 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" @click.prevent="toggleDeleteModal(role)">Delete</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <AddModal v-if="isAddVisibility" @toggle-modal="toggleAddModal()"/>
            <DeleteModal :role.sync="toDelete" v-if="isDeleteVisibility" @toggle-modal="toggleDeleteModal(toDelete)"/>
        </div>
    </div>
    
</template>

<script>
import AddModal from "../modal/role/AddModal"
import DeleteModal from "../modal/role/DeleteModal"

export default {
    components: {
        AddModal,
        DeleteModal,
    },
    data() {
        return {
            roles: [],
            isAddVisibility: false,
            isDeleteVisibility: false,
            toDelete: null,
        }
    },
    created() {
        this.getRoles();
    },
    methods: {
        toggleAddModal()
        {
            this.isAddVisibility = !this.isAddVisibility
            this.getRoles()
        },
        toggleDeleteModal(role)
        {
            this.toDelete = role
            this.isDeleteVisibility = !this.isDeleteVisibility
            this.getRoles();
        },
        getRoles() {
            axios.get("/api/roles/index")
            .then(res => {
                this.roles = res.data.data;
                console.log(res.data.data);
            })
            .catch(error => {
                console.log(error);
            })
        },
        deleteRole(role) {
            let isExecuted = confirm("Are you sure to execute this action?");

            axios.post("/api/role/delete/"+role)
            .then(res => {
                console.log(isExecuted);
                this.getRoles();
            })
            .catch(error => {
                console.log(error);
            })
        }
    }
}
</script>
