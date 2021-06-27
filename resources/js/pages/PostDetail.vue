<template>
    <div class="container">
        <div v-if="post">
           <h1>{{ post.title }}</h1>
            <div class="post-info">
               <span>{{post.category.name}}</span>

               <span v-for="tag in post.tags" :key="`tag-${tag.id}`" class="tag">
                   {{tag.name}}
               </span>
            </div>  
            <div>
                {{post.content}}
            </div>
        </div>
        
        
        <div v-else>
           LOADIN......
        </div>
    </div>
</template>

<script>
export default {
    name: 'PostDetail',
    data() {
        return {
            post: null
        }
    },
    created() {
       this.getPostDetails();
    },
    methods: {
        getPostDetails() {
            //console.log('Api CALL HERE ');
            axios.get(`http://127.0.0.1:8000/api/posts/${this.$route.params.slug}`)
            .then(res=> {
                console.log(res.data);
                this.post = res.data;
            })
            .catch(err=> {
                console.log(err);
            });
        }
    }
}
</script>

<style lang="scss" scoped>
.tag {
    display: inline-block;
    margin: 5px;
    padding: 5px;
    font-size: 12px;
    background-color: lightcoral;
    border-radius: 20px;
}

</style>