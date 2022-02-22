<template>
    <!-- Main modal -->
    <div id="authentication-modal" aria-hidden="true" class="flex h-screen bg-gray-200/50 overflow-y-auto overflow-x-hidden fixed right-0 left-0 top-4 z-50 justify-center items-center md:h-full md:inset-0">
        <div class="relative px-4 my-5 mx-auto max-w-md w-full h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="flex justify-end p-2">
                    <button @click.prevent="closeModal" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="authentication-modal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                    </button>
                </div>
                
                <form class="px-6 pb-4 space-y-6 lg:px-8 sm:pb-6 xl:pb-8" @submit.prevent="uploadImageDepartment">
                    <h3 class="text-xl font-medium text-gray-900 dark:text-white">Edit {{ department.name }} department</h3>
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Department's Image</label>
                        <input @change="handleImage" class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="user_avatar" type="file">
                    </div>
                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Upload</button>
                </form>
                    
                <form class="px-6 pb-4 space-y-6 lg:px-8 sm:pb-6 xl:pb-8" @submit.prevent="updateDepartment">
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Department's Name</label>
                        <input type="text" v-model="form.name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" :placeholder="department.name" required>
                    </div>
                    <div>
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Department's Description</label>
                        <textarea type="text" v-model="form.description" id="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" :placeholder="department.description" required></textarea>
                    </div>
                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
                    
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            form: {
                name: this.department.name,
                description: this.department.description,
                image: this.department.image,
            }
        }
    },
    props: [
        'department'
    ],
    created() {
        console.log('department data')
        console.log(this.department)
    },
    methods: {
        handleImage(file) {
            this.image = file.target.files[0];
        },
        uploadImageDepartment() {
            const formData = new FormData
            formData.set('image', this.image);
            axios.post(this.route('department:upload_image', {department: this.department.id}), formData)
            .then(res => {
                this.closeModal()
            });
        },
        closeModal() {
            this.$emit('toggle-modal')
        },
        updateDepartment() {
            axios.post(this.route('department:update', {department: this.department.id}), 
                {
                    'name': this.form.name,
                    'description': this.form.description
                }
            )
            .then(res => {
                console.log(res)
                this.closeModal()
            });
        }
    }
}
</script>
