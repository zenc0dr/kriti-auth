<template>
    <div class="kriti-mp">
        <router-view />
    </div>
</template>

<script>

export default {
    name: "KritiApp"
}
</script>

<style lang="scss">
html, body {
    min-height: 100vh;
    margin: 0;
    background: #111827;
}

.kriti-mp {
    color: #fff;
    background: #111827;
    height: 100%;
}
</style>
