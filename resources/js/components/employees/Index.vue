<template>
    <div class="text-2xl text-gray-700">
        Employee Index
        <router-link to="/employees-create" class="bg-cyan-900 text-white rounded-md px-7 py-3 uppercase transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-cyan-500 duration-300 ">+ employee</router-link>
        <div class="my-5" v-for="(employee, key) in employees" :key="employee.id">
            <div class="text-sm">{{ key }} - {{ employee.first_name }}, {{ employee.last_name }}</div>
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
