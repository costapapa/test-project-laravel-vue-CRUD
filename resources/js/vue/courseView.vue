<template>
    <div class="courseView">
        <h1>Course List</h1>
        <table>
            <thead>
                <tr>
                    <th>Course Name</th>
                    <th>Description</th>
                    <th>Instructor</th>
                    <th>Duration</th>
                    <th>Start Date</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="course in courseList" :key="course.id">
                    <td>{{ course.course_name }}</td>
                    <td>{{ course.description }}</td>
                    <td>{{ course.instructor }}</td>
                    <td>{{ course.duration }}</td>
                    <td>{{ course.start_date }}</td>
                    <td>
                        <button @click="removeCourse(course)">🗑️</button>
                        <router-link
                            :to="{
                                name: 'course.edit',
                                params: { id: course.id },
                            }"
                            >✏️</router-link
                        >
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            courseList: [],
        };
    },
    created() {
        this.getCourses();
    },
    methods: {
        getCourses() {
            axios
                .get("api/courses")
                .then((response) => {
                    this.courseList = response.data;
                })
                .catch((error) => {
                    console.error(error);
                });
        },
        removeCourse(course) {
            if (
                window.confirm("Are you sure you want to delete this course?")
            ) {
                axios
                    .delete("api/course/" + course.id)
                    .then((response) => {
                        if (response.status === 204) {
                            // Remove the course from the local courseList
                            const index = this.courseList.findIndex(
                                (c) => c.id === course.id
                            );
                            if (index !== -1) {
                                this.courseList.splice(index, 1);
                            }
                        }
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            }
        },
    },
};
</script>
