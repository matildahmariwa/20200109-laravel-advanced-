<template>
    <div>
    <h1>Create Here</h1>
    <form @submit.prevent="createTask()">
        <div>
            <label for=""> title</label>
            <input type="text" name="title" v-model="blog.title">
        </div>

        <div>
            <label for="">Body</label>
            <textarea name="body" id="" cols="30" rows="10" v-model="blog.body"></textarea>
        </div>
        <div>
            <label for="">Category</label>
            <input name="category"  cols="30" rows="10" v-model="blog.category" >
        </div>
        <button type="submit">Submit Blog</button>
    </form>
    </div>
</template>

<script>
    import axios from 'axios'
    export default {
        data() {
            return {
                list: [],
                blog: {
                    title: '',
                    body: '',
                    category: ''
                }
            };
        },


        methods: {
            fetchBlogList() {
                axios.get('/blog').then((res) => {
                    this.list = res.data;
                });
                console.log(this.list)
            },

            createTask() {
                axios.post('http://blog.appp/add', this.blog)
                    .then((res) => {
                        this.blog.body = '';
                        this.blog.title = '';
                        this.blog.category = '';
                        this.edit = false;
                        this.fetchBlogList();

                    })
                    .catch((err) => console.error(err));
            }

        }
    }
</script>



<style scoped>

</style>
