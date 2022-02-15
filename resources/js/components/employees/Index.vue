<template>
    <div class="text-2xl text-gray-700">
        Employee Index
        <router-link to="/employees-create" class="float-right text-sm bg-cyan-900 text-white rounded-md px-7 py-3 uppercase transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-cyan-500 duration-300 ">+ employee</router-link>
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
                                        First Name
                                    </th>
                                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                        Last Name
                                    </th>
                                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                        Address
                                    </th>
                                    <th scope="col" class="relative py-3 px-6">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Product 1 -->
                                <tr v-for="(employee, key) in employees" :key="employee.id" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ key }}
                                    </td>
                                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ employee.first_name }}
                                    </td>
                                    <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                        {{ employee.last_name }}
                                    </td>
                                    <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                                        <router-link :to="{
                                            name: 'EmployeeEdit',
                                            params: { id: employee.id }
                                            }" class="text-blue-600 dark:text-blue-500 hover:underline">
                                            Edit
                                        </router-link>
                                    </td>
                                </tr>
                                
                            </tbody>
                        </table>
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
            employees: [],
        }
    },
    created() {
        this.getEmployees();
    },
    methods: {
        getEmployees() {
            axios.get("/api/employee/index")
            .then(res => {
                this.employees = res.data.data;
                console.log(res);
            })
            .catch(error => {
                console.log(error);
            })
        }
    }
}
</script>
