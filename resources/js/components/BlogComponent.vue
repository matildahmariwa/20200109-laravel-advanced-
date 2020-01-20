<template>
    <div class='row'>
        <h1>Create Here</h1>
        <form @submit.prevent="createBlog()">
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

        <ul class="list-group">
            <li v-if='list.length === 0'>There are no blogs yet!</li>
            <li class="list-group-item" v-for="(blog, index) in list">
               <h1>{{ blog.title }}</h1>
                {{ blog.body }}
            </li>

        </ul>
    </div>
</template>
<script>
    import axios from 'axios'
    export default {
        data() {
            return {
                list: [],
                blog: {
                    id: '',
                    body: '',
                    title:''
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
            createBlog() {
                axios.post('http://blog.appp/api/add', this.blog)
                    .then((res) => {
                        this.blog.body = '';
                        this.blog.title = '';
                        this.blog.category = '';
                        this.edit = false;
                        this.fetchBlogList();
                    })
                    .catch((err) => console.error(err));
            },


        }
    }
</script>
