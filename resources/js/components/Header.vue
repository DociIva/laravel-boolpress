<template>
    <header>
        <a href="">BoolPress</a>

        <nav>
            <ul>
                <li>
                    <router-link :to="{name: 'home'}">Home</router-link>
                </li>
                <li>
                    <router-link :to="{name: 'about'}">About</router-link>
                </li>
                <li>
                    <router-link :to="{name: 'blog'}"> Blog </router-link>
                </li>
            </ul>
        </nav>
    </header>

</template>

<script>
export default {
    name: 'Header'
}
</script>

<style lang="scss" scoped>
   header {
       background: rgb(128, 150, 240);
    }
    .active {
        color: lawngreen;
    }

</style>