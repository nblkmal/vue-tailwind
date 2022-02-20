<template>
    <div class="text-2xl text-gray-700">
        Employee Edit 
        <form @submit.prevent="uploadImageEmployee">
            <div class="mb-6">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="user_avatar">Upload file</label>
                <input @change="handleImage" class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="user_avatar" type="file">
                <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">A profile picture is useful to confirm your are logged into your account</div>

            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update employee</button>

            </div>
        </form>

        <form @submit.prevent="editEmployee">
            <div class="mb-6">
                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">First Name</label>
                <input v-model="form.first_name" type="text" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>
            <div class="mb-6">
                <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Last Name</label>
                <input v-model="form.last_name" type="text" id="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>
            <div class="mb-6">
                <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Address</label>
                <input v-model="form.address" type="text" id="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Small Heath, Birmingham" required>
            </div>
            <!-- <div class="mb-6">
                <label for="dateHired" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Date Hired</label>
                <input v-model="form.date_hired" id="dateHired" datepicker datepicker-buttons datepicker-format="Y-m-d" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
            </div> -->
            <div class="mb-6">
                <label for="dateHired" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Date Hired</label>
                <datepicker :format="format_date" v-model="form.date_hired"></datepicker>
            </div>
            <div class="mb-6">
                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Select country</label>
                <select @change="getStates()" v-model="form.country_id" name="country" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option v-for="country in countries" :key="country.id" :value="country.id">{{ country.name }}</option>
                </select>
            </div>
            <div class="mb-6">
                <label for="cities" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Select state</label>
                <select @change="getCities()" v-model="form.state_id" name="state" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <!-- <option :value="form.state_id">{{ form.state.name }}</option> -->
                    <option v-for="state in states" :key="state.id" :value="state.id">{{ state.name }}</option>
                </select>
            </div>
            <div class="mb-6">
                <label for="states" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Select city</label>
                <select v-model="form.city_id" name="city" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <!-- <option :value="form.city_id">{{ form.city.name }}</option> -->
                    <option v-for="city in cities" :key="city.id" :value="city.id">{{ city.name }}</option>
                </select>
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update employee</button>
        </form>
    </div>
</template>

<script>
import Datepicker from 'vuejs-datepicker';
import moment from 'moment';

export default {
    components: {
        Datepicker
    },
    data() {
        return {
            cities: [],
            countries: [],
            states: [],
            form: {
                first_name: '',
                last_name: '',
                date_hired: null,
                address: '',
                country_id: '',
                state_id: '',
                city_id: '',
            },
            profile_picture: ''
        };
    },
    // untuk get data terus macam dropdown data
    created() {
        this.getEmployee();
        this.getCountries();
    },
    methods: {
        handleImage(file) {
            this.profile_picture = file.target.files[0];
        },
        uploadImageEmployee() {
            const formData = new FormData
            formData.set('profile_picture', this.profile_picture);
            axios.post("/api/employee/upload-image/"+ this.$route.params.id, formData)
            .then(res => {
                this.$router.push({name: 'EmployeeIndex'});
            });
        },
        getEmployee() {
            axios.get("/api/employee/show/"+ this.$route.params.id)
            .then(res => {
                console.log(res.data.data)
                this.form = res.data.data;
            })
            .catch(error => {
                    console.log(console.error);
                });
        },
        editEmployee() {
            console.log('edit');
            axios.post("/api/employee/update/"+ this.$route.params.id, {
                'first_name': this.form.first_name,
                'last_name': this.form.last_name,
                'date_hired': this.format_date(this.form.date_hired),
                'address': this.form.address,
                'country_id': this.form.country_id,
                'state_id': this.form.state_id,
                'city_id': this.form.city_id,
            })
            .then(res => {
                this.$router.push({name: 'EmployeeIndex'});
            });
        },
        getCountries() {
            axios.get("/api/countries/index")
            .then(res => {
                this.countries = res.data.data;
            })
            .catch(error => {
                    console.log(console.error);
                });
        },
        getStates() {
            axios.get("/api/states/index/" + this.form.country_id)
            .then(res => {
                if((res.data.data).length === 0)
                {
                    this.states = [{name: 'No state'}];
                } else {
                    this.states = res.data.data;
                }

            })
            .catch(error => {
                    console.log(console.error);
                });
        },
        getCities() {
            axios.get("/api/cities/index/" + this.form.state_id)
            .then(res => {
                this.cities = res.data.data;
            })
            .catch(error => {
                    console.log(console.error);
                });
        },
        format_date(value)
        {
            if (value) {
                return moment(String(value)).format('YYYYMMDD')
            }
        }
    }
}
</script>
