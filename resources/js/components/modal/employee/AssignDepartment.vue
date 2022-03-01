<template>
    <div>
        <!-- Main modal -->
        <div id="authentication-modal" aria-hidden="true" class="flex h-screen bg-gray-200/50 overflow-y-auto overflow-x-hidden fixed right-0 left-0 top-4 z-50 justify-center items-center md:h-full md:inset-0">
            <div class="relative px-4 w-full max-w-md h-full md:h-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <div class="flex justify-end p-2">
                        <button @click.prevent="closeModal" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="authentication-modal">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                        </button>
                    </div>
                    <form class="px-6 pb-4 space-y-6 lg:px-8 sm:pb-6 xl:pb-8" @submit.prevent="assignDepartment">
                        <h3 class="text-xl font-medium text-gray-900 dark:text-white">Assign to department</h3>
                        <div>
                            <label for="departments" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Select department to assign to</label>
                            <select v-model="form.department_id" id="departments" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option v-for="department in departments" :key="department.id" :value="department.id">{{ department.name }}</option>
                            </select>
                        </div>
                        <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Assign</button>
                    </form>
                    <form class="px-6 pb-4 space-y-6 lg:px-8 sm:pb-6 xl:pb-8" @submit.prevent="assignRole">
                        <h3 class="text-xl font-medium text-gray-900 dark:text-white">Choose roles</h3>
                        <!-- <div>
                            <label for="departments" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Select role</label>
                            <select v-model="form.role" id="departments" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option v-for="role in roles" :key="role.id" :value="role.name">{{ role.name }}</option>
                            </select>
                        </div> -->
                        <div>
                            <label for="departments" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Select role</label>
                            <vueSelect multiple v-model="form.role" :value="form.role" :options="roles" :reduce="roles => roles.name" label="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></vueSelect>
                        </div>
                        <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Assign</button>
                    </form>
                </div>
            </div>
        </div> 
    </div>
</template>

<script>
import vueSelect from 'vue-select';

export default {
    components: {
        vueSelect,
    },
    data() {
        return {
            departments: [],
            roles: [],
            form: {
                department_id: this.employee.department_id,
                role: this.employee.roles,
            },
            computed: {
                options:() => roles,
            }
        };
    },
    props: [
        'employee'
    ],
    created() {
        this.getDepartments();
        this.getRoles();
        console.log(this.employee.department_id)
    },
    methods: {
        closeModal() {
            this.$emit('toggle-modal')
        },
        getRoles() {
            axios.get(this.route('roles:index'))
            .then(res => {
                this.roles = res.data.data
            })
            .catch(error => {
                console.log(error);
            })
        },
        getDepartments() {
            axios.get(this.route('department:index'))
            .then(res => {
                this.departments = res.data.data
            })
            .catch(error => {
                console.log(error);
            })
        },
        assignDepartment() {
            axios.post(this.route('employee:assignDepartment', {employee: this.employee.id}),
            {
                'department_id': this.form.department_id,
            })
            .then(res => {
                this.closeModal()
            })
        },
        assignRole() {
            axios.post(this.route('employee:assignRole', {employee: this.employee.id}),
            {
                'role': this.form.role,
            })
            .then(res => {
                this.closeModal()
            })
        },
    }
}
</script>
