<template>
    <div class="coursesContainer">
        <div class="heading">
            <h2 class="title">Courses</h2>
            <addCourseForm />
        </div>
        <courseView />
        <router-view key="$route.name" />
    </div>
</template>

<script>
import addCourseForm from "./addCourseForm.vue";
import courseView from "./courseView.vue";
export default {
    components: {
        addCourseForm,
        courseView,
    },
};
</script>

<style scoped>
.coursesContainer {
    margin: auto;
}

.heading {
    background: #e6e6e6;
    padding: 10px;
}

.title {
    text-align: center;
}
</style>
