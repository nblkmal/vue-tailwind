<template>
    <div class="text-2xl text-gray-700">
        Employee Index
        <router-link to="/employees-create" class="float-right text-xs bg-cyan-900 text-white rounded-md px-7 py-3 uppercase transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-cyan-500 duration-300 ">+ employee</router-link>
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
                                        Name
                                    </th>
                                    <th scope="col" class="text-center py-3 px-6 text-xs font-medium tracking-wider text-gray-700 uppercase dark:text-gray-400">
                                        Address
                                    </th>
                                    <th scope="col" class="text-center py-3 px-6 text-xs font-medium tracking-wider text-gray-700 uppercase dark:text-gray-400">
                                        Country
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
                                        {{ key+1 }}.
                                    </td>
                                    <td class="flex items-center justify-between py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <img class="mr-2 w-12 h-12 rounded-full shadow-lg" :src="'../storage/employee/'+ employee.profile_picture" alt="Bonnie image"/>
                                        {{ employee.full_name }}
                                    </td>
                                    <td class="text-center py-4 px-6 text-sm text-gray-500 dark:text-gray-400">
                                        {{ employee.full_address }}
                                    </td>
                                    <td class="text-center py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                        <div v-if="employee.country" class="inline">
                                            <img :src="'https://flagcdn.com/16x12/'+ employee.country.country_code +'.png'" alt="" srcset="" style="display: inline !important; vertical-align: none !important;">
                                            {{ employee.country.name }}
                                        </div>
                                    </td>
                                    <!-- <td class="text-center py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                        <div v-if="employee.state">
                                            {{ employee.state.name }}
                                        </div>
                                    </td>
                                    <td class="text-center py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                        <div v-if="employee.city">
                                            {{ employee.city.name }}
                                        </div>
                                    </td> -->
                                    <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                                        <router-link :to="{
                                            name: 'EmployeeEdit',
                                            params: { id: employee.id }
                                            }" class="text-blue-600 dark:text-blue-500 hover:underline">
                                            Edit
                                        </router-link>
                                        <button class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" v-on:click="deleteEmployee(employee.id)">Delete</button>
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
                console.log(res.data.data);
            })
            .catch(error => {
                console.log(error);
            })
        },
        deleteEmployee(employee) {
            let isExecuted = confirm("Are you sure to execute this action?");

            axios.post("/api/employee/delete/"+employee)
            .then(res => {
                console.log(isExecuted);
                this.getEmployees();
            })
            .catch(error => {
                console.log(error);
            })
        }
    }
}
</script>
