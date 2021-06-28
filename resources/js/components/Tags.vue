<template>
    <div class="tags">
        <span v-for="tag in post.tags" :key="`tag-${tag.id}`" class="tag">
            {{tag.name}}
        </span>
    </div>
</template>

<script>
export default {
    name: 'Tags',
    props : {
        tags: Array,
    }
}
</script>


<style lang="scss" scoped>
.tags {
    display: inline-block;
}
.tag {
    display: inline-block;
    margin: 5px;
    padding: 5px;
    font-size: 12px;
    background-color: #8096f0;
    border-radius: 20px;
}

</style>