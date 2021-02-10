<template>
    <div>
        <blog-component loggedin="true" title="My second blog11111" body="Hello to my second blog111111"></blog-component>
        <blog-component loggedin="true" title="My second blog2222" body="Hello to my second blog222222"></blog-component>
    </div>
</template>

<script>
import BlogComponent from "./BlogComponent";

export default {
    components: {
        BlogComponent
    },
}
</script>
